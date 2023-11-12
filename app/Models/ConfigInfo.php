<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'data', 'created_at', 'updated_at'
    ];
}
