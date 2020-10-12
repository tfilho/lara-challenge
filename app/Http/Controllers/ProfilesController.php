<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Profile;
use Illuminate\Http\Request;

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
        //dd(Profile::latest()->get());
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

    public function store(Request $request)
    {

        //dd($request);
        $this->validateProfile();



        $profile = new Profile(request(['first_name','last_name','birthday','gender_id']));
        //$profiles->user_id = 1; //auth()->id() or  //auth()->user()-profiles()->create($profiles); TODO CHECK THIS
        //dd($profiles);
        $profile->save();

        //$profiles->tags()->attach(request('tags')); TODO CHECK THIS TOO
        /*request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Profile::create($this->validateProfile());*/

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

    public function update(Profile $profile)
    {

        $profile->update($this->validateProfile());

        return redirect('/profiles');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('/profiles');
    }

    public function validateProfile()
    {
        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender_id' => 'required|exists:genders,id'
        ]);
    }
}
