<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructureController extends Controller
{
    public function create(){
        return view('Structure.CreateStructure');
    }

    public function view(){
        $structures = Structure::all();
        return view('Structure.ViewStructure', compact('structures'));
    }

    public function store(Request $request){

        // $request->validate([
        //     'Name' => 'required|string',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|numeric|gt:5',
        //     'Author' => 'required|string|min:5',
        //     'BookImg' => 'required|mimes:png,jpg',
        // ]);

        $extension = $request->file('profile_photo')->getClientOriginalExtension();
        $file_name = $request->profile_region.'-'.$request->profile_name.'.'.$extension;
        $request->file('profile_photo')->storeAs('/public/image/structure', $file_name);

        Structure::create([
            'profile_photo' => $file_name,
            'profile_name' => $request->profile_name,
            'profile_division' => $request->profile_division,
            'profile_sub_division' => $request->profile_sub_division,
            'profile_position' => $request->profile_position,
            'profile_region' => $request->profile_region
            ]);
        return redirect(route('view'));
    }

    public function edit($id){
        $structure = Structure::findOrFail($id);
        return view('Structure.UpdateStructure', compact('structure'));
    }

    public function update(Request $request, $id){
        $image = $request->file('profile_photo');
        $structure = Structure::findOrFail($id);

        if($image){
            Storage::delete('public/image/structure'.$structure->profile_photo);
            $file_name = $request->profile_region.'-'.$request->profile_name.'.'.$image->getClientOriginalName();
            $image->storeAs('/public/image/structure', $file_name);
            $structure->update([
                'profile_photo' => $file_name
            ]);
        }

        Structure::findOrFail($id)->update([
            'profile_name' => $request->profile_name,
            'profile_division' => $request->profile_division,
            'profile_sub_division' => $request->profile_sub_division,
            'profile_position' => $request->profile_position,
            'profile_region' => $request->profile_region
        ]);
        return redirect(route('view'));
    }

    public function delete($id){
        $structure = Structure::findOrFail($id);
        $structure->delete();
        Storage::delete('public/image/structure'.$structure->profile_photo);
        return redirect()->back();
    }

    public function filterRegion($region) {
        $structures = Structure::where('profile_region', $region)->paginate(10);
        return view('Structure.ViewStructure', compact('structures'));
    }
}
