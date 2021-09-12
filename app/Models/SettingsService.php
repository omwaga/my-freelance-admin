<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsService extends Model
{
    protected $fillable = [
        'name'
    ];

    use HasFactory;
}
