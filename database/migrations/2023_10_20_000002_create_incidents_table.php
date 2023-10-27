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
    {/*
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->foreign('state')->references('status')->on('statues');	
            $table->string('title');
            $table->string('text');
            $table->integer('minutes');
            $table->integer('');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
