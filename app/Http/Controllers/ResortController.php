<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Resort;
use Illuminate\Support\Facades\File;

class ResortController extends Controller
{

    public function index()
    {
        $resort = Resort::latest()->paginate(5);
        return view('resort.view_resort', ['resorts' => $resort]);


    }

    public function create()
    {
        return view('resort.create_resort');
    }



    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'description' => ['nullable', 'max:255'],
            'image' => ['required', 'file'],
        ]);

        $resort = new Resort();
        $resort->name = $request->name;
        $resort->location = $request->location;
        $resort->price = $request->price;
        $resort->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/resorts', $filename);
            $resort->image = $filename;
        }
        $resort->save();


        return redirect('view-resort')->with('message', 'Resort added Successfully');
    }


    public function destroy($id)
    {
        $resort = Resort::find($id);
        $resort->delete();
        return redirect('/view-resort')->with('message', 'Resort Destroyed Successfully');
    }


    public function show($id)
    {
        $resort = Resort::find($id);
        return view('resort.edit_resort', ['resorts' => $resort]);
    }


    public function update(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'description' => ['nullable', 'max:255'],
            'image' => ['nullable', 'file'],
        ]);

        $resort = Resort::find($req->id);
        $resort->name = $req->name;
        $resort->location = $req->location;
        $resort->price = $req->price;
        $resort->description = $req->description;

        if ($req->hasFile('image')) {

            $destination = 'uploads/resorts' . $resort->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/resorts', $filename);
            $resort->image = $filename;
        }
        $resort->save();


        return redirect('view-resort')->with('message', 'Resort Update Successfully');
    }
}
