<?php

namespace App\Repository\Car;

interface CarRepositoryInterface
{
    public function getAll();
    public function checkStock($id);
    public function transactions($id);
}