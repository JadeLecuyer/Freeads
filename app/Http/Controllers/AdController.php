<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Ad::class, 'ad');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->admin) {
            if(!empty(request()) && request()->ads === 'myads') {
                $ads = Ad::join('users', 'users.id', '=', 'ads.user_id')->select('ads.*', 'users.login')->where('user_id', $user->id)->latest()->paginate(10);
            } else {
                $ads = Ad::join('users', 'users.id', '=', 'ads.user_id')->select('ads.*', 'users.login')->latest()->paginate(10);
            }

        } elseif (!$user->admin) {
            $ads = Ad::where('user_id', $user->id)->latest()->paginate(10);
        }

        return view('ads.index',compact('ads'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create', ['categories' => Ad::CATEGORY_VALUES]);
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
            'category' => Rule::in(Ad::CATEGORY_VALUES),
            'description' => 'required',
            'picture' => 'required|image|max:300',
            'price' => 'required|min:0',
            'location' => 'required',
        ]);

        // generates name for picture and moves it to public/img/ads
        $imgName = time().'.'.$request->picture->extension();
        $request->picture->move(public_path('img/ads'), $imgName);

        // path to image from public folder to store in DB (to use with asset() helper for display)
        $imgPath = 'img/ads/' . $imgName;

        Ad::create(array_merge($request->all(), ['user_id' => Auth::user()->id, 'picture' => $imgPath]));
     
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
        $seller = User::findorfail($ad->user_id);
        return view('viewad',array_merge(compact('ad'), ['seller' => $seller]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit',array_merge(compact('ad'), ['categories' => Ad::CATEGORY_VALUES]));
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
            'category' => Rule::in(Ad::CATEGORY_VALUES),
            'description' => 'required',
            'picture' => 'image|max:300',
            'price' => 'required|min:0',
            'location' => 'required',
        ]);

        if($request->files->count() !== 0) {
            //if a new picture was uploaded
            //delete old one
            unlink(public_path($ad->picture));

            // generates name for picture and moves it to public/img/ads
            $imgName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('img/ads'), $imgName);
            
            // path to image from public folder to store in DB (to use with asset() helper for display)
            $imgPath = 'img/ads/' . $imgName;

            $ad->update(array_merge($request->all(), ['picture' => $imgPath]));
        } else {
            // if no new picture was uploaded
            $ad->update($request->all());
        }
     
        return redirect()->route('ads.index')
                        ->with('success','Ad updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        unlink(public_path($ad->picture));
        $ad->delete();
    
        return redirect()->route('ads.index')
                        ->with('success','Ad deleted successfully');
    }

}
