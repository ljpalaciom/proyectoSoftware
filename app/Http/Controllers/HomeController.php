<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\ApiServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user()
    {
        $data = [];
        $data["covid"] = ApiServiceProvider::getCovid19Data();
        $data["watches"] = ApiServiceProvider::getWatches();

        return view('home.user')->with('data', $data);
    }

    public function trainer()
    {
        return view('home.trainer');
    }

    public function admin()
    {
        return view('home.admin');
    }
}
