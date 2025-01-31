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
        Schema::create('stockcode', function (Blueprint $table) {
            $table->id();
            $table->string('stock_code');
            $table->string('mnemonic')->nullable();
            $table->string('part_number')->nullable();
            $table->string('pn_global')->nullable();
            $table->string('item_name');
            $table->string('stock_type_district');
            $table->string('class');
            $table->string('home_wh');
            $table->string('uoi');
            $table->decimal('issuing_price', 15, 2);
            $table->string('price_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockcode');
    }
};
