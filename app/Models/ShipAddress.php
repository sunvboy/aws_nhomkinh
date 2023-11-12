<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipAddress extends Model
{
    protected $fillable = [
        'title', 'cityid', 'districtid', 'publish', 'userid_created', 'created_at', 'userid_updated', 'updated_at'
    ];
    use HasFactory;
    public function city_name()
    {
        return $this->hasOne(VNCity::class, 'id', 'cityid');
    }
    public function district_name()
    {
        return $this->hasOne(VNDistrict::class, 'id', 'districtid');
    }
}
