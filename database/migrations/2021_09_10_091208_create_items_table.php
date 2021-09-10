<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->index();
            $table->string('name_1')->nullable()->index();
            $table->string('name_2')->nullable()->index();
            $table->string('name_3')->nullable()->index();
            $table->boolean('active')->default(true);
            $table->string('color')->nullable();
            $table->float('quantity')->default(0.0);
            $table->float('weight')->default(0.0);
            $table->text('picture_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
