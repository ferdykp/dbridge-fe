<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('overhaul', function (Blueprint $table) {
            $table->id();
            $table->string('dstrct_ori')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('authsd_date')->nullable();
            $table->string('wo_desc')->nullable();
            $table->date('acuan_plan_service')->nullable();
            $table->string('componen_desc')->nullable();
            $table->string('egi')->nullable();
            $table->string('egi_eng')->nullable();
            $table->string('equip_no')->nullable();
            $table->string('plant_process')->nullable();
            $table->string('plant_activity')->nullable();
            $table->string('wr_no')->nullable();
            $table->string('wr_item')->nullable();
            $table->integer('qty_req')->nullable();
            $table->string('stock_code')->nullable();
            $table->string('mnemonic')->nullable();
            $table->string('part_number')->nullable();
            $table->string('pn_global')->nullable();
            $table->string('item_name')->nullable();
            $table->string('stock_type_district')->nullable();
            $table->string('class')->nullable();
            $table->string('home_wh')->nullable();
            $table->string('uoi')->nullable();
            $table->string('issuing_price')->nullable();
            $table->string('price_code')->nullable();
            $table->string('notes')->nullable();
            $table->date('eta')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overhaul');
    }
};
