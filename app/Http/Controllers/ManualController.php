<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Manual;

class ManualController extends Controller
{

    public function senarai(Request $request) {    
        $manuals = Manual::all();
        return view('manual.senarai', compact('manuals'));
    }

    public function satu(Request $request) {   
        $id = (int)$request->route('id'); 
        $manual = Manual::find($id);
        return view('manual.satu', compact('manual'));
    }    

    public function cipta(Request $request) {    
        $manual = New Manual;
        $manual->nama = $request->nama;
        $manual->dokumen = $request->file('dokumen')->store('jkr-ephjkr/uploads');
        $manual->save();
        return back();
    }    

    public function kemaskini(Request $request) {    
        $id = (int)$request->route('id'); 
        $manual = Manual::find($id);
        $manual->nama = $request->nama;
        $manual->dokumen = $request->file('dokumen')->store('jkr-ephjkr/uploads');
        $manual->save();
        return back();
    }   
    
    public function buang(Request $request) {    
        $id = (int)$request->route('id'); 
        $manual = Manual::find($id);
        $manual->delete();
        return back();
    }          




}
