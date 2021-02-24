<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AdController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = AD::latest()->paginate(5);
    
        return view('ads.index',compact('ads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'category' => Rule::in(['Accomodation', 'Fashion', 'Furniture', 'Jobs', 'Leisure', 'Motors', 'Multimedia', 'Pets', 'Services']),
            'description' => 'required',
            'picture' => 'required|image|max:300',
            'price' => 'required|min:0',
            'location' => 'required',
            'user_id' => 'required',
        ]);

        Ad::create($request->all());
     
        return redirect()->route('ads.index')
                        ->with('success','Ad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit',compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'category' => Rule::in(['Accomodation', 'Fashion', 'Furniture', 'Jobs', 'Leisure', 'Motors', 'Multimedia', 'Pets', 'Services']),
            'description' => 'required',
            'picture' => 'required|image|max:300',
            'price' => 'required|min:0',
            'location' => 'required',
            'user_id' => 'required',
        ]);

        $ad->update($request->all());
     
        return redirect()->route('ads.index')
                        ->with('success','Ad created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
    
        return redirect()->route('ads.index')
                        ->with('success','Ad deleted successfully');
    }

}
