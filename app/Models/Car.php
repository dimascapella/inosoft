<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Transaction;

class Car extends Model
{
    protected $connection = 'mongodb';
    use HasFactory;

    public function transactions(){
        return $this->hasMany(Transaction::class, 'vehicle_id');
    }
}
