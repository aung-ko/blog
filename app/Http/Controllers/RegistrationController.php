<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        $request->persist();

        //session('message', 'Here is a message');
        session()->flash('message', 'Registration success');

        return redirect()->home();
        // $user = User::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'password' => bcrypt(request('password'))
        // ]);
        
        // auth()->login($user);

        // Mail::to($user)->send(new Welcome($user));

        // return redirect()->home();
        
        // validate the request
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed'
        // ]);
        // create and save the user
        // sign them in
        // send mail
        // redirect to home
        // return redirect('/');
    }
}
