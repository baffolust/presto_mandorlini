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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->float('price', 8, 2);
            
            $table->unsignedBigInteger('category_id')->nullable();
            //Relation 1-N con categories
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('user_id')->nullable();
            //Relation 1-N con users
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
