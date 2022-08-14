<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Resort;
use Illuminate\Support\Facades\Storage;

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

        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['nullable', 'max:255'],
            'image' => ['required','image','max:2048'],
        ]);


        if($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('ResortImages', 'public');

        if(Resort::create($valid));
            return redirect(route('resort.view'))->with('message', 'Resort added Successfully');

        return back()->with('error', 'Somethings Went Wrong');

    }


    public function show($id)
    {
        $resort = Resort::findOrFail($id);
        return view('resort.edit_resort', ['resorts' => $resort]);
    }


    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required','numeric','gt:0'],
            'description' => ['nullable', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $resort = Resort::findOrFail($id);

        if($request->hasFile('image'))
            {
                if (Storage::disk('public')->exists($resort->getRawOriginal('image')))
                    Storage::disk('public')->delete($resort->getRawOriginal('image'));

                $valid['image'] = $request->file('image')->store('ResortImages', 'public');
            }

        if($resort->update($valid))
            return redirect(route('resort.view'))->with('message', 'Resort updated Successfully');

        return back()->with('error', 'Somethings Went Wrong');

    }


    public function destroy($id)
    {
        $resort = Resort::findOrFail($id);

        if (Storage::disk('public')->exists($resort->getRawOriginal('image')))
            Storage::disk('public')->delete($resort->getRawOriginal('image'));

        $resort->delete();

        return redirect(route('resort.view'))->with('message', 'Resort Destroyed Successfully');
    }

}
