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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('family'); // Фамилия
            $table->string('name'); // Имя
            $table->string('parentname'); // Отчество
            $table->date('dr')->nullable(); // Дата рождения
            $table->string('image')->nullable(); // Изображение
            $table->timestamps(); // Метки времени
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
