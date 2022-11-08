<?php

namespace App\Repository\Motorcycle;

use App\Models\Motorcycle;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ResponseTrait;

class MotorcycleRepository implements MotorcycleRepositoryInterface{
    use ResponseTrait;

    public function getAll(){
        $motorcycles = Motorcycle::all();
        return $this->responseSuccess('Success Fetch Motorcycle Data', 200, $motorcycles);
    }

    public function checkStock($id){
        $motorcycle = Motorcycle::find($id);
        
        if(!$motorcycle) {
            return $this->responseError('Motorcycle Not Found', 400);
        }
        return $this->responseSuccess('Success Fetch Motorcycle Data', 200, [
            'name' => $motorcycle->name,
            'stock' => $motorcycle->stock
        ]);
    }

    public function transactions($id){
        $Motorcycle = Motorcycle::with(['transactions' => function($query) {
            $query->where('type', 'motorcycle');
        }])->find($id);

        if(!$Motorcycle) {
            return $this->responseError('Motorcycle Not Found', 400);
        }

        return $this->responseSuccess('Success Fetch Motorcycle Data', 200, $Motorcycle);
    }
}