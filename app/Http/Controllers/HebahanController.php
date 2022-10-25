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

    public function cipta(Request $request) {  
        $user = $request->user();  
        $faq = New Hebahan;
        $faq->tajuk = $request->tajuk;
        $faq->isi = $request->isi;
        $faq->user_id = $user->id;
        $faq->save();

        return back();
    }       




}
