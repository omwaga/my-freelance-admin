<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersTrend extends Component
{
    public $thisYear, $thisWeek, $thisMonth, $lastYear, $secondLastYear, $thirdLastYear, $fourthLastYear, $fifthLastYear,
        $one, $two, $three, $four, $five, $six;

    public function mount()
    {
        $this->thisYear = DB::table('orders')->whereYear('order_date', '=', now()->year)->count();
        $this->thisMonth = DB::table('orders')->whereMonth('order_date', '=', now()->month)->count();
        $this->thisWeek = DB::table('orders')->whereBetween('order_date', [Carbon::now()->startOfWeek('1'), Carbon::now()->endOfWeek('7')])->count();
        $this->lastYear = DB::table('orders')->whereYear('order_date', '=', now()->year - 1)->count();
        $this->secondLastYear = DB::table('orders')->whereYear('order_date', '=', now()->year - 2)->count();
        $this->thirdLastYear = DB::table('orders')->whereYear('order_date', '=', now()->year - 3)->count();
        $this->fourthLastYear = DB::table('orders')->whereYear('order_date', '=', now()->year - 4)->count();
        $this->fifthLastYear = DB::table('orders')->whereYear('order_date', '=', now()->year - 5)->count();

        $this->one = now()->year;
        $this->two = now()->year - 1;
        $this->three = now()->year - 2;
        $this->four = now()->year - 3;
        $this->five = now()->year - 4;
        $this->six = now()->year - 5;
    }

    public function render()
    {
        return view('livewire.orders-trend');
    }
}
