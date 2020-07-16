<?php

namespace App\Http\Controllers;

use App\HetznerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $records = $records->groupBy(function ($key, $value) {
            return $key->getType();
        });

        return view('home', [
            'records' => $records,
        ]);
    }
}
