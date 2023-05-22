<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    //
    public function store_mission(Request $request){
        $extension = $request->file('image')->getClientOriginalExtension();
        $file_name = $request->name.'.'.$extension;
        $request->file('image')->storeAs('/public/image/mission', $file_name);

        Mission::create([
            'image' => $file_name,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/mission/view');
        // return redirect()->route('admin.view_mission');
        // return view('mission.view_mission');
        // return response()->json(["success"=>200]);
    }

    public function view_mission(){
        $missions=Mission::all();
        return view('mission.view_mission', compact('missions'));
    }

    public function create_mission(){
        return view('mission.create_mission');
    }

    public function update_mission(Request $request, $id){
        $image = $request->file('image');
        $mission = Mission::findOrFail($id);

        if($image){
            Storage::delete('public/image/mission'.$mission->image);
            $file_name = $request->name.'.'.$image->getClientOriginalName();
            $image->storeAs('/public/image/mission', $file_name);
            $mission->update([
                'image' => $file_name
            ]);
        }

        Mission::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/mission/view');
    }

    public function edit_mission($id){
        $missions=Mission::findOrFail($id);
        return view('mission.update_mission', compact('missions'));
    }

    public function delete_mission($id){
        $missions=Mission::findOrFail($id);
        $missions->delete();
        Storage::delete('/public/image'.$missions->image);
        return redirect('/admin/mission/view');
        // return response()->json(["success"=>200]);
    }
}
