<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitIdToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreignId('quantity_unit_id')->nullable()->constrained('units')->after('quantity');
            $table->foreignId('weight_unit_id')->nullable()->constrained('units')->after('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'weight_unit_id')) {
                $table->dropForeign(['weight_unit_id']);
                $table->dropColumn('weight_unit_id');
            }
            if (Schema::hasColumn('items', 'quantity_unit_id')) {
                $table->dropForeign(['quantity_unit_id']);
                $table->dropColumn('quantity_unit_id');
            }
        });
    }
}
