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
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->double('width', 16, 5);
            $table->double('height', 16, 5);
            $table->double('structure_value', 16, 5);
            $table->integer('quantity');
            $table->double('total', 16, 5);
            $table->unsignedBigInteger('quote_id');

            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_items');
    }
};
