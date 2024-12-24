<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect();
        $users = $users->concat(User::factory(32)->create());
        $users = $users->concat(User::factory(16)->inactive()->create());

        Order::factory(rand(1, 100))->recycle($users)->create();
    }
}
