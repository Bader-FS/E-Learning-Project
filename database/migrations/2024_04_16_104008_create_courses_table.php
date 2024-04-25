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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id')->constrained();
            $table->foreignId('prof_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->mediumText('short_description');
            $table->longText('description');
            $table->string('price');
            $table->string('selling_price');
            $table->string('image');
            $table->string('duration');
            $table->string('language');
            $table->tinyInteger('certified')->default(0);
            $table->tinyInteger('trend')->default(0);
            $table->string('map_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
