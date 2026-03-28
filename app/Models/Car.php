<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function brand(){

        return $this->belongsTo(Brand::class);
    }

    public function parts(){

        return $this->hasMany(Parts::class);
    }
    
    public function images(){

    return $this->hasMany(CarImage::class);

    }

    protected $fillable = ['brand_id','name','year','model','price','description'];
}


