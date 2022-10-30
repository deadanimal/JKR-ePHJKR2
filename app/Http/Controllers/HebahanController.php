<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hebahan;

class HebahanController extends Controller
{

    public function senarai(Request $request) {    
        $hebahans = Hebahan::all();
        return view('hebahan.senarai', compact('hebahans'));
    }

    public function satu(Request $request) {   
        $id = (int)$request->route('id'); 
        $hebahan = Hebahan::find($id);
        return view('hebahan.satu', compact('hebahan'));
    }        

    public function cipta(Request $request) {  
        $user = $request->user();  
        $hebahan = New Hebahan;
        $hebahan->tajuk = $request->tajuk;
        $hebahan->isi = $request->isi;
        $hebahan->user_id = $user->id;
        $hebahan->save();
        return back();
    }    
    
    public function kemaskini(Request $request) {  
        $id = (int)$request->route('id'); 
        $hebahan = Hebahan::find($id); 
        $hebahan->tajuk = $request->tajuk;
        $hebahan->isi = $request->isi;
        $hebahan->save();
        return back();
    }   
    
    public function buang(Request $request) {  
        $id = (int)$request->route('id'); 
        $hebahan = Hebahan::find($id); 
        $hebahan->delete();
        return back();
    }     




}
