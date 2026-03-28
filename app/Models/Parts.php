<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    public function car(){

        return $this->belongsTo(Car::class);
    }
    
    protected $fillable = ['car_id','name','price','description','stock'];
}
