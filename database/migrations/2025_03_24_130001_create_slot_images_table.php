<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('slot_images', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('image_path'); // Path to image file (could be just filename or full URL depending on storage)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_images');
    }
};
