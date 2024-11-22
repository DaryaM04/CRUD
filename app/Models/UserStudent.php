<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStudent extends Model
{
    use HasFactory;

    // Имя таблицы в базе данных
    protected $table = 'students';

    // Защита от массового заполнения (можно использовать [])
    protected $guarded = [];
}
