<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);

    }

    public function show(User $user)
    {
        return view('users.profile', [
            'user'=>$user,
            'roles' => Role::all()
        ]);
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

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('deleteUser', 'The user has been deleted!');
        return back();
    }

    public function attach(User $user)
    {
            $user->roles()->attach(\request('role'));
            return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(\request('role'));
        return back();
    }
}
