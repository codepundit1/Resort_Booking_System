<?php

namespace App\Http\Controllers;

use App\Mail\UserAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
        // make random password for user
        $valid = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $password = Str::random(8);
        $valid['password'] = bcrypt($password);

        $user = User::create($valid);

        if($user)
        try {
            Mail::to($user->email)->send(new UserAccount($user, $password));
        }
        catch (\Exception $exception) {
            echo $exception-> getMessage();
        }

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
