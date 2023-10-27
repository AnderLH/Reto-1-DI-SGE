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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->unsignedBigInteger('departament_id');
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('statuses');
            $table->unsignedBigInteger('priority');
            $table->foreign('priority')->references('id')->on('priorities');	
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories');		
            $table->integer('minutes');
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
