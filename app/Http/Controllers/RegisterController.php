<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'username'  => ['required','max:255','min:3'], 
            'name'      => ['required','min:2'],
            'email'     => ['required','email','max:255'],
            'password'  => ['required','max:255','min:7'],
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/');
    }
}
