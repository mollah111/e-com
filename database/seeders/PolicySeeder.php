<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policy = [
            [
               'privacy_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
               'terms_conditions' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
               'refund_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
               'payment_policy' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
               'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
               'return_process' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iure earum',
            ]
        ];

        Policy::insert($policy);
    }
}
