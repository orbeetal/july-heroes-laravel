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
        Schema::create('graffitis', function (Blueprint $table) {
            $table->id();
            $table->string('title_bn');
            $table->string('title_en')->nullable();
            $table->longText('image')->nullable();
            $table->text('details_bn')->nullable();
            $table->text('details_en')->nullable();
            $table->text('plots_bn')->nullable();
            $table->text('plots_en')->nullable();
            $table->string('location_bn')->nullable();
            $table->string('location_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graffitis');
    }
};
