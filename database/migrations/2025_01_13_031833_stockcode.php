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
            $table->id(); // ID untuk primary key
            $table->string('stock_code')->unique();
            $table->string('price_code')->nullable();
            $table->string('item_name');
            $table->string('class')->nullable();
            $table->string('current_class')->nullable();
            $table->string('mnemonic_current')->nullable();
            $table->string('pn_current')->nullable();
            $table->string('pn_global')->nullable();
            $table->string('wh')->nullable();
            $table->string('uoi')->nullable();
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
