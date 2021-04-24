<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRvsaUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rvsa_units', function (Blueprint $table) {
            $table->longText('address')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('rvsa_unit_id')->nullable();
            $table->tinyInteger('level')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rvsa_units', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('picture');
            $table->dropConstrainedForeignId('district_id');
            $table->dropConstrainedForeignId('province_id');
            $table->dropConstrainedForeignId('rvsa_unit_id');
            $table->dropColumn('level');
        });
    }
}
