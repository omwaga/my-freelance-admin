<?php

namespace Database\Seeders;

use App\Models\Assigned_order;
use App\Models\Blocked_writer;
use App\Models\Favourite_writer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payed_order;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        User::factory()->count(200)
            ->has(Order::factory()->count(random_int(1, 20)))
            ->has(Assigned_order::factory()->count(random_int(1,5)))
            ->has(Blocked_writer::factory()->count(random_int(0, 2)))
            ->has(Favourite_writer::factory()->count(random_int(0, 5)))
            ->has(Payed_order::factory()->count(random_int(2, 6)))
            ->has(Notification::factory()->count(random_int(5, 20)))
            ->has(Review::factory()->count(random_int(1, 2)))
            ->has(Assigned_order::factory()->count(random_int(1, 3)))
            ->create();
    }
}
