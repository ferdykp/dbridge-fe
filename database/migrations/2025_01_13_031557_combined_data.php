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
        Schema::create('combined_data', function (Blueprint $table) {
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
            $table->foreignId('stock_code_id')->constrained('stockcode');  // Menghubungkan ke tabel stockcode
            $table->string('stock_code');
            $table->string('price_code');
            $table->string('item_name');
            $table->string('class');
            $table->string('current_class');
            $table->string('mnemonic_current');
            $table->string('pn_current');
            $table->string('pn_global');
            $table->string('wh');
            $table->string('uoi');
            $table->string('notes')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combined_data');
    }
};
