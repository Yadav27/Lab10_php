<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wells', function (Blueprint $table) {
            $table-›id();
            $table-›string('well_name')-›unique();
            $table-›string('field_location');
            $table-›integer ('depth_meters');
            $table-›decimal('production_bpd', 10, 2) -›nullable();
            $table-›date('commissioned_date');
            $table-›timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wells');
    }
}
