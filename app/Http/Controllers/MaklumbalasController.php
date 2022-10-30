<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maklumbalas;

class MaklumbalasController extends Controller
{

    public function senarai(Request $request) {    
        $user = $request->user();
        if ($user->hasRole('sekretariat')) {
            $maklums = Maklumbalas::all();    
        } else {
            $maklums = Maklumbalas::where('user_id', $user->id)->get();
        }
        
        return view('maklum.senarai', compact('maklums'));
    }

    public function satu(Request $request) {   
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        return view('maklum.satu', compact('maklum'));
    }    

    public function cipta(Request $request) {  
        $user = $request->user(); 
        $id = (int)$request->route('id'); 
        $maklum = New Maklumbalas;
        $maklum->keterangan = $request->keterangan;
        $maklum->kategori = $request->kategori;
        $maklum->subjek = $request->subjek;
        $maklum->status = 'SEMAK';
        $maklum->user_id = $user->id;
        $maklum->save();
        return back();
    }  

    public function kemaskini(Request $request) {   
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        $maklum->keterangan = $request->keterangan;
        $maklum->kategori = $request->kategori;
        $maklum->subjek = $request->subjek;
        if($request->action=="dalamproses") {
            $maklum->status = "DALAM PROSES";
        } else {
            $maklum->status = "SELESAI";
        }
        $maklum->save();
        return back();
    }      




}
