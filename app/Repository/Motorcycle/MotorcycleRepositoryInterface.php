<?php

namespace App\Repository\Motorcycle;

interface MotorcycleRepositoryInterface
{
    public function getAll();
    public function checkStock($id);
    public function transactions($id);
}