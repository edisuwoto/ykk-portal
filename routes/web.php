<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Livewire Routes
use App\Http\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::name('lang')->prefix('lang')->group(function(){
    Route::get('change/{lang?}', function($lang){
        $list_in_lang_folder = scandir(base_path().'/resources/lang/');

        if(!in_array($lang, array_filter($list_in_lang_folder, function($item){ return !(strpos($item, '.') !== false) && strlen($item) <= 2; }))){
            abort(404);
        }

        if (auth()->check()) {
            auth()->user()->update(['locale' => $lang]);
        }

        session(['locale' => $lang]);

        session()->flash('success', __('Change language success'));

        return redirect()->route('dashboard');
    })->name('.change');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('settings')->prefix('settings')->group(function(){
        Route::get('user-management', Livewire\Settings\UserManagement::class)->name('.user-management');
    });
});

require __DIR__.'/auth.php';
