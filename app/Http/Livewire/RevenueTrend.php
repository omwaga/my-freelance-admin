<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RevenueTrend extends Component
{
    public $thisYear, $thisWeek, $thisMonth, $lastYear, $secondLastYear, $thirdLastYear, $fourthLastYear, $fifthLastYear,
        $one, $two, $three, $four, $five, $six;

    public function mount()
    {
        $this->thisYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year)->sum("amount");
        $this->thisMonth = DB::table('payed_orders')->whereMonth('payment_time', '=', now()->month)->sum('amount');
        $this->thisWeek = DB::table('payed_orders')->whereBetween('payment_time', [Carbon::now()->startOfWeek('1'), Carbon::now()->endOfWeek('7')])->sum('amount');
        $this->lastYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year - 1)->sum('amount');
        $this->secondLastYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year - 2)->sum('amount');
        $this->thirdLastYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year - 3)->sum('amount');
        $this->fourthLastYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year - 4)->sum('amount');
        $this->fifthLastYear = DB::table('payed_orders')->whereYear('payment_time', '=', now()->year - 5)->sum('amount');

        $this->one = now()->year;
        $this->two = now()->year - 1;
        $this->three = now()->year - 2;
        $this->four = now()->year - 3;
        $this->five = now()->year - 4;
        $this->six = now()->year - 5;
    }

    public function render()
    {
        return view('livewire.revenue-trend');
    }
}
