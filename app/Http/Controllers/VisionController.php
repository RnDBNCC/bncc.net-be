<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function store_vision(Request $request){
        Vision::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('admin/vision/view');
        // return response()->json(["success"=>200]);
    }

    public function view_vision(){
        $visions=Vision::all();
        return view('vision.view_vision', compact('visions'));
    }

    public function create_vision(){
        return view('vision.create_vision');
    }

    public function update_vision(Request $request, $id){
        Vision::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/vision/view');
        // return response()->json(["success"=>200]);
    }

    public function edit_vision($id){
        $visions=Vision::findOrFail($id);
        return view('vision.update_vision', compact('visions'));
    }

    public function delete_vision($id){
        $visions=Vision::findOrFail($id);
        $visions->delete();
        return redirect('/admin/vision/view');
        // return response()->json(["success"=>200]);
    }
}
