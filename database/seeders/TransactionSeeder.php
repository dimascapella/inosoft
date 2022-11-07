<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        Transaction::factory(20)->create([
            'unitable_type' => Car::class
        ]);

        Transaction::factory(20)->create([
            'unitable_type' => Motorcycle::class
        ]);
    }
}
