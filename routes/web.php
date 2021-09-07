<?php

use Illuminate\Support\Facades\Route;

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

        if(!in_array($lang, array_filter($list_in_lang_folder, function($item){ return !(strpos($item, '.') !== false); }))){
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

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
