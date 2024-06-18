<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status=$this->faker->randomElement(['B','P','V']);
        return [
            //
            'customer_id' => Customer::factory(),
            'amount'=>$this->faker->numberBetween(100,2000000),
            'status'=>$status,
            'billed_at' => $this->faker->dateTimeThisDecade(),
            'paid_at'=> $status=='P'?$this->faker->dateTimeThisDecade():NULL
        ];
    }
}
