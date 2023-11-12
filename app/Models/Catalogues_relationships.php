<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogues_relationships extends Model
{
    use HasFactory;
    public function products_versions()
    {
        return $this->hasMany(Products_version::class, 'productid', 'id');
    }
    public function commentsArticle()
    {
        return $this->hasMany(Comment::class, 'module_id', 'id')->where('module', '=', 'articles')->where('parentid', 0);
    }
    public function tagsArticle()
    {
        return $this->hasMany(Tags_relationship::class, 'module_id', 'id')->where('tags_relationships.module', '=', 'articles')->join('tags', 'tags.id', '=', 'tags_relationships.tag_id');
    }
    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'moduleid')
            ->where(['products.publish' => 0])
            ->select('products.id', 'products.title',  'products.slug', 'products.description', 'products.image', 'products.price', 'products.price_sale', 'products.price_contact')
            ->orderBy('products.order', 'asc')
            ->orderBy('products.id', 'desc')->with('getTags')->limit(9);
    }
}
