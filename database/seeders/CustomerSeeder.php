<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\models\Customer;
use Illuminate\Database\Seeder;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::factory()
            ->count(25)
            ->hasInvoices(10)
            ->create();
        Customer::factory()
            ->count(5)
            ->hasInvoices(5)
            ->create();
        Customer::factory()
            ->count(100)
            ->hasInvoices(3)
            ->create();
        Customer::factory()
            ->count(10)
            ->create();
    }
}
