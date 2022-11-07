<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Transaction;

class Car extends Model
{
    use HasFactory;

    public function vehicleable(){
        return $this->morphTo();
    }

    public function transactions(){
        return $this->morphMany(Transaction::class, 'unitable');
    }
}
