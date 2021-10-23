<?php

namespace App\Http\Controllers;

use App\BusinessInformation;
use App\Http\Requests\UserProfileRequest;
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
    public function index(Request $request)
    {
        $user = $request->user();

        return view('home', compact('user'));
    }

    public function userInfoSave(UserProfileRequest $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $business = $user->business_information ?: new BusinessInformation();

        $data = $request->validated();
        $data['profile']['company_logo'] = $request->hasFile('profile.company_logo')
            ? $profile->uploadFile('company_logo', $request->file('profile.company_logo'))
            : $profile->company_logo;

        $business->fill($data['business_information'])->save();
        $user->business_information_id = $business->id;

        $user->fill($data)->save();
        $profile->fill($data['profile'])->save();

        return back()->with('message', 'Form has been successfully saved!');
    }
}
