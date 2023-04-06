<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    //
    public function StoreMission(Request $request){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Name.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);

        Mission::create([
            'Image' => $fileName,
            'Name' => $request->Name,
            'Description' => $request->Description
        ]);

        // return redirect('/view-mission');
        return response()->json(["success"=>200]);
    }

    public function ViewMission(){
        $missions=Mission::all();
        return view('Mission.ViewMission', compact('missions'));
    }

    public function CreateMission(){
        return view('Mission.CreateMission');
    }

    public function UpdateMission(Request $request, $id){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Name.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);

        Mission::findOrFail($id)->update([
            'Image' => $fileName,
            'Name' => $request->Name,
            'Description' => $request->Description
        ]);

        return redirect('/view-mission');
    }

    public function EditMission($id){
        $missions=Mission::findOrFail($id);
        return view('Mission.UpdateMission', compact('missions'));
    }

    public function DeleteMission($id){
        $missions=Mission::findOrFail($id);
        $missions->delete();
        Storage::delete('/public/image'.$missions->Image);
        #return redirect('/view-mission');
        return response()->json(["success"=>200]);
    }
}
