<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $config = [
            "placeholder" => "Select multiple options...",
            "allowClear" => true,
        ];
        return view('home', compact(['config']));
    }
    public function approval()
    {
        return view('auth/approval');
    }
}
