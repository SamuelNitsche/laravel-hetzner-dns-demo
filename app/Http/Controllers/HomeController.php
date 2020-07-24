<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SamuelNitsche\LaravelHetznerDns\HetznerApi;

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
    public function index(HetznerApi $api)
    {
        $records = $api->getAllRecords();

        return view('home', [
            'records' => $records,
        ]);
    }
}
