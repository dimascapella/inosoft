<?php

namespace App\Repository\Car;

use App\Models\Car;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ResponseTrait;

class CarRepository implements CarRepositoryInterface{
    use ResponseTrait;

    public function getAll(){
        $cars = Car::all();
        return $this->responseSuccess('Success Fetch Car Data', 200, $cars);
    }

    public function checkStock($id){
        $car = Car::find($id);
        
        if(!$car) {
            return $this->responseError('Car Not Found', 400);
        }
        return $this->responseSuccess('Success Fetch Car Data', 200, [
            'name' => $car->name,
            'stock' => $car->stock
        ]);
    }

    public function transactions($id){
        $car = Car::with(['transactions' => function($query) {
            $query->where('type', 'car');
        }])->find($id);

        if(!$car) {
            return $this->responseError('Car Not Found', 400);
        }

        return $this->responseSuccess('Success Fetch Car Data', 200, $car);
    }
}