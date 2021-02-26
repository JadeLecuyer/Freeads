<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
    
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nickname' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^0[1-9][0-9]{8}$/',
        ]);

        if(Auth::user()->admin) {
            $validated = $request->validate([
                'admin' => 'required|boolean',
            ]);
        }

        $user->update($request->all());

        return redirect()->route('users.index')
        ->with('success','User profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userAds = Ad::where('user_id', $user->id)->get();
        foreach($userAds as $ad) {
            unlink(public_path($ad->picture));
            $ad->delete();
        }

        $user->delete();
    
        if(Auth::user()->id !== $user->id) {
            return redirect()->route('users.index')
                            ->with('success','User deleted successfully');
        } else {
            return redirect()->route('home');
        }
    }
}
