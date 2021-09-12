<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsDiscipline extends Model
{
    protected $fillable = [
        'disciplines'
    ];

    use HasFactory;
}
