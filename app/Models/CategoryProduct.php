<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'image_json', 'parentid', 'image', 'meta_title', 'meta_description', 'userid_created', 'created_at', 'publish', 'alanguage', 'ishome', 'isaside', 'isfooter', 'highlight', 'icon', 'banner'

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function children()
    {
        return $this->hasMany(CategoryProduct::class, 'parentid');
    }
    public function countProduct()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid', 'id')->where('module', '=', 'products');
    }
    public function posts()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid')
            ->where('catalogues_relationships.module', '=', 'products')
            ->with('getProduct');
    }

    public function brands_relationships()
    {
        return $this->hasMany(Brands_relationships::class, 'category_product_id')->select('category_product_id', 'brand_id')->groupBy('brand_id')->with('brands');
    }
    public function attributes_relationships()
    {
        return $this->hasMany(Attributes_relationships::class, 'category_product_id')->select('category_product_id', 'attribute_id')->groupBy('attribute_id')->with('attributes');
    }
}
