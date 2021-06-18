<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        User::create($attributes);

        return redirect('/');
    }
}
