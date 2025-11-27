<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kucings', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name');
            $table->string('breed');
            $table->string('fur_color');
            $table->integer('age');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kucings');
    }
};
