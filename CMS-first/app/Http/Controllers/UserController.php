<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.profile', ['user'=>$user]);
    }

    public function update(User $user)
    {
        $input = \request()->validate([
           'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255' ],
            'avatar' => ['file'],
        ]);

        if(\request('avatar')){
            $input['avatar'] = \request('avatar')->store('images');
        }

        $user->update($input);

        \session()->flash('profileEditMessage', 'User has been updated');
        return back();

    }
}
