<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function store_history(Request $request){
        History::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('admin/history/view');
        // return response()->json(["success"=>200]);
    }

    public function view_history(){
        $histories=History::all();
        return view('history.view_history', compact('histories'));
    }

    public function create_history(){
        return view('history.create_history');
    }

    public function update_history(Request $request, $id){
        History::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/admin/history/view');
        // return response()->json(["success"=>200]);
    }

    public function edit_history($id){
        $histories=History::findOrFail($id);
        return view('history.update_history', compact('histories'));
    }

    public function delete_history($id){
        $histories=History::findOrFail($id);
        $histories->delete();
        return redirect('/admin/history/view');
        // return response()->json(["success"=>200]);
    }
}
