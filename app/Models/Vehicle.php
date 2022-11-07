<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Car;
use App\Models\Motorcycle;

class Vehicle extends Model
{
    use HasFactory;

    public function cars(){
        return $this->morphMany(Car::class, 'vehicleable');
    }

    public function motorcycles(){
        return $this->morphMany(Motorcycle::class, 'vehicleable'); 
    }
}
