<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UsersPage extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response|Application|Factory|View
     */
    public function index()
    {
        $users = DB::table('users')->paginate(15);

        return view('users', ['users' => $users]);
    }
}
