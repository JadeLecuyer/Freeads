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
        $ads = Ad::search()->category()->maxPrice()->minPrice();
        
        switch(request()->sorting) {
            case 'price_asc' :
                $ads = $ads->orderBy('price');
                break;
            case 'price_desc' :
                $ads = $ads->orderByDesc('price');
                break;
            case 'alphabet_asc' :
                $ads = $ads->orderBy('title');
                break;
            case 'alphabet_desc' :
                $ads = $ads->orderByDesc('title');
                break;
            default :
                $ads = $ads->latest();
        }
        
        $ads = $ads->paginate(6);

        return view('index',array_merge(compact('ads'), ['categories' => Ad::CATEGORY_VALUES]))
        ->with('i', (request()->input('page', 1) - 1) * 6);
    }
}
