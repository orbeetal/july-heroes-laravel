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
        Schema::create('murderers', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
            $table->string('name_en')->nullable();
            $table->integer('age')->nullable();

            $table->text('image')->nullable();

            $table->text('biography_bn')->nullable();
            $table->text('biography_en')->nullable();

            $table->text('address_bn')->nullable();
            $table->text('address_en')->nullable();

            $table->text('incident_details_bn')->nullable();
            $table->text('incident_details_en')->nullable();

            $table->string('occupation_bn')->nullable();
            $table->string('occupation_en')->nullable();

            $table->string('organization_bn')->nullable();
            $table->string('organization_en')->nullable();

            $table->string('designation_bn')->nullable();
            $table->string('designation_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murderers');
    }
};
