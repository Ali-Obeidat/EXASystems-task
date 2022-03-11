<?php

namespace Database\Seeders;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::factory(10)
        ->has(Order::factory()->count(3))
        ->has(Merchant::factory()->count(1)
        ->has(Product::factory(10)->count(3)
        ->hasAttached(Order::all(),
        ['quantity'=>5])))
        
        ->create();

        // OrderItem::factory()
        // ->count(20)
        // ->hasAttached($user)
        // ->create();
        // Merchant::factory(10)
        // ->has(Product::factory()->count(3))->create();
        //  User::factory(10)
        //     ->has(Order::factory()->count(3))

        //     ->create();
    }
}
