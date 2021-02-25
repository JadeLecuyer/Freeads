<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::latest()->paginate(6);

        return view('index',compact('ads'))
        ->with('i', (request()->input('page', 1) - 1) * 6);
    }
}
