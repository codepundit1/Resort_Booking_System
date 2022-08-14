<?php

namespace App\Http\Controllers;

use App\Mail\UserAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('user.view_user', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create_user');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,$user->id,id'],
        ]);

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($password);
        $users->save();
        // try {
        //     Mail::to($users->email)->send(new UserAccount($users));
        // }
        // catch (\Exception $exception) {
        // }

        return redirect(route('user.view'))->with('message', 'User Added Successfully');
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect(route('user.view'))->with('message', 'User Deleted Successfully');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.edit_user', ['users' => $users]);
    }
}
