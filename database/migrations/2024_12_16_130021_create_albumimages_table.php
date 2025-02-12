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
        Schema::create('albumimages', function (Blueprint $table) {
            $table->id('albumimage_id');
            $table->foreignId('species_id')->constrained('species', 'species_id')->onDelete('no action')->onUpdate('no action');
            $table->foreignId('lure_id')->constrained('lures', 'lure_id')->onDelete('no action')->onUpdate('no action');
            $table->foreignId('location_id')->constrained('locations', 'location_id')->onDelete('no action')->onUpdate('no action');
            $table->string('image_file');
            $table->integer('size');
            $table->dateTime('catchtime');
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumimages');
    }
};
