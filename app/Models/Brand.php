<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'banner', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'order', 'alanguage', 'lft', 'rgt', 'level', 'parentid'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function brands_relationships()
    {
        return $this->hasMany(Brands_relationships::class, 'brandid', 'id')->where('module', '=', 'products');
    }
}
