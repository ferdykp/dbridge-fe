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

        Schema::create('wr', function (Blueprint $table) {
            $table->id();
            $table->string('dstrc_ori');
            $table->date('creation_date');
            $table->date('authsd_date');
            $table->string('wo_desc');
            $table->date('acuan_plan_service');
            $table->string('componen_desc');
            $table->string('egi');
            $table->string('egi_eng');
            $table->string('equip_no');
            $table->string('plant_process');
            $table->string('plant_activity');
            $table->string('wr_no');
            $table->string('wr_item');
            $table->integer('qty_req');
            $table->string('stock_code');
            $table->string('mnemonic');
            $table->string('part_number');
            $table->string('pn_global');
            $table->string('item_name');
            $table->string('stock_type_district');
            $table->string('class');
            $table->string('home_wh');
            $table->string('uoi');
            $table->string('issuing_price');
            $table->string('price_code');
            $table->string('notes');
            $table->date('eta');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wr');
    }
};
