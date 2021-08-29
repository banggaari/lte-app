<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;

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
        $satuanKerjas = Satker::All();
        $heads = [
            'Name',
            'Description',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('home', compact('heads','satuanKerjas'));
    }
    public function approval()
    {
        return view('auth/approval');
    }

}
