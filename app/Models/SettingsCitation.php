<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsCitation extends Model
{

    protected $fillable = [
        'style'
    ];

    use HasFactory;
}
