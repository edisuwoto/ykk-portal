<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('parent_id');
            $table->string('link')->nullable();
            $table->enum('link_type', ['url', 'route'])->comment('Link Type : url, routes');
            $table->string('icon', 100)->nullable()->comment('Icon using Font Awesome icons');
            $table->integer('sort')->default(0);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('menu_permission', function(Blueprint $table){
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_permission');
        Schema::dropIfExists('menus');
    }
}
