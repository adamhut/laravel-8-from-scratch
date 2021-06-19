<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return  view('register.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            // 'username'  => ['required','max:255','min:3',Rule::unique('users','username')], 
            'username'  => ['required','max:255','min:3','unique:users,username'], 
            'name'      => ['required','min:2'],
            'email'     => ['required','email','max:255', 'unique:users,email'],
            'password'  => ['required','max:255','min:7'],
        ]);

        //move to Mutators
        // $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        // session()->flash('success','Your account has been created');

        return redirect('/')->flash('success', 'Your account has been created');
    }
}
