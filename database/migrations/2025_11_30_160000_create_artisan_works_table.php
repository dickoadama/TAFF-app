<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisan_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artisan_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('category')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('client_name')->nullable();
            $table->timestamps();

            // Clé étrangère
            $table->foreign('artisan_id')->references('id')->on('artisans')->onDelete('cascade');
            
            // Index
            $table->index('artisan_id');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artisan_works');
    }
};