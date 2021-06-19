<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email'=> ['required','email'],
            'password' => ['required'],
        ]);

        // attempt to authenticate and log in the user
        // based on th eprovided credentials

        if(auth()->attempt($attributes)){

            // to prevent session fixation
            session()->regenerate();
            
            return redirect('/')->flash('success','login successfully');
        }


        // auth failed
        ValidationException::withMessages(['email' => 'Your provided credentials could not be verified']);
        // return back()
        //     ->withInput()
        //     ->withErrors(['email'=>'Your provided credentials could not be verified']);

    }


    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success','Goodbye');
    }




}
