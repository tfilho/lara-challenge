<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Http\Requests\StoreProfile;
use App\Http\Requests\UpdateProfile;
use App\Profile;

class ProfilesController extends Controller
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

    public function index()
    {
        return view('profiles.index',[
            'profiles' => Profile::latest()->get()
        ]);
    }

    public function create()
    {
        return view('profiles.create',[
            'profiles' => Profile::all(), 'genders' => Gender::all()
        ]);
    }

    public function store(StoreProfile $request)
    {
        /*$profile = new Profile(request(['first_name','last_name','birthday','gender_id']));
        $profile->save();*///TODO remove this comment

        //Is the code bellow cleaner than above? Yeah!
        Profile::create($request->validated());

        return redirect(route('profiles.index'));
    }

    public function show(Profile $profile)
    {
        return view('profiles.show',['profiles' => $profile]);
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', [
            'profile' => $profile, 'genders' => Gender::all()
        ]);
    }

    public function update(Profile $profile, UpdateProfile $request)
    {
        $profile->update($request->validated());

        return redirect('/profiles');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('/profiles');
    }
}
