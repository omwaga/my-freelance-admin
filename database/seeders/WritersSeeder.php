<?php

namespace Database\Seeders;

use App\Models\Assigned_order;
use App\Models\Declined_bid;
use App\Models\FundWithdrawalRequest;
use App\Models\Grammar_test;
use App\Models\Grammar_test_score;
use App\Models\Sample_essay;
use App\Models\Unconfirmed_bid;
use App\Models\Writer;
use Exception;
use Illuminate\Database\Seeder;

class WritersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Writer::factory()->count(500)
            ->has(Grammar_test_score::factory()->count(1))
            ->has(Declined_bid::factory()->count(random_int(1, 3)))
            ->has(Unconfirmed_bid::factory()->count(random_int(1, 4)))
            ->has(FundWithdrawalRequest::factory()->count(random_int(1,3)))
            ->create();
    }
}
