<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Resort;
use Illuminate\Support\Facades\File;

class ResortController extends Controller
{

    public function view()
    {
        $data = Resort::paginate(4);
        return view('resort.view_resort', ['users'=>$data]);

    }

    public function create()
    {
        return view('resort.create_resort');
    }



    public function store(Request $request)
    {

        $data = new Resort();
        $data->name = $request->name;
        $data->location = $request->location;
        $data->price = $request->price;
        $data->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/resorts', $filename);
            $data->image = $filename;
        }
        $data->save();


        return redirect('view-resort')->with('status', 'Resort Added Successfully');
    }


    public function delete($id)
    {
        $data = Resort::find($id);
        $data -> delete();
        return redirect('/view-resort')->with('status', 'User Deleted Successfully');
    }


    public function showData($id)
    {
        $data = Resort::find($id);
        return view('resort.edit_resort', ['users'=>$data]);
    }


    public function update(Request $req)
    {
        $data = Resort::find($req->id);
        $data->name = $req->name;
        $data->location = $req->location;
        $data->price = $req->price;
        $data->description = $req->description;

        if($req->hasFile('image')){

            $destination = 'uploads/resorts' . $data->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/resorts', $filename);
            $data->image = $filename;
        }
        $data->save();


        return redirect('view-resort')->with('status', 'Resort Added Successfully');
    }





    public function homepage()
    {
        $resort = Resort::all();
        return view('resort', ['resorts'=>$resort]);
    }

}
