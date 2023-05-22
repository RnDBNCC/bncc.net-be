<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    public function store_culture(Request $request){
        $extension = $request->file('image')->getClientOriginalExtension();
        $file_name = $request->name.'.'.$extension;
        $request->file('image')->storeAs('/public/image/culture', $file_name);

        Culture::create([
            'image' => $file_name,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/culture/view');
    }

    public function view_culture(){
        $cultures=Culture::all();
        return view('culture.view_culture', compact('cultures'));
    }

    public function create_culture(){
        return view('culture.create_culture');
    }

    public function update_culture(Request $request, $id){
        $image = $request->file('image');
        $culture = Culture::findOrFail($id);

        if($image){
            Storage::delete('public/image/culture'.$culture->image);
            $file_name = $request->name.'.'.$image->getClientOriginalName();
            $image->storeAs('/public/image/culture', $file_name);
            $culture->update([
                'image' => $file_name
            ]);
        }

        Culture::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/culture/view');
    }

    public function edit_culture($id){
        $cultures=Culture::findOrFail($id);
        return view('culture.update_culture', compact('cultures'));
    }

    public function delete_culture($id){
        $cultures=Culture::findOrFail($id);
        $cultures->delete();
        Storage::delete('/public/image'.$cultures->image);
        return redirect('/admin/culture/view');
        // return response()->json(["success"=>200]);
    }
}
