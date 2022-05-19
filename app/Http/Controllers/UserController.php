<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        $data = User::paginate(2);
        return view('user.view_user', ['users'=>$data]);
    }

    public function create()
    {
        return view('user.create_user');
    }

    public function store(Request $request)
    {
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
        return redirect('/view-user')->with('status', 'User Added Successfully');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data -> delete();
        return redirect('/view-user')->with('status', 'User Deleted Successfully');
    }

    public function showData($id)
    {
        $data = User::find($id);
        return view('user.edit_user', ['users'=>$data]);
    }

    public function update(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->save();
        return redirect('/view-user')->with('status', 'User updated Successfully');
    }

}
