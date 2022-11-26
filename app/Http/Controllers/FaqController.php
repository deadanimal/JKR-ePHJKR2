<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq;

class FaqController extends Controller
{

    public function senarai(Request $request) {    
        $faqs = Faq::all();
        return view('faq.senarai', compact('faqs'));
    }

    public function pengguna_luar(Request $request) {    
        $faqs = Faq::all();
        return view('faq.pengguna_luar', compact('faqs'));
    }

    public function satu(Request $request) {   
        $id = (int)$request->route('id'); 
        $faq = Faq::find($id);
        return view('faq.satu', compact('faq'));
    }        

    public function cipta(Request $request) {  
        $user = $request->user();  
        $faq = New Faq;
        $faq->soalan = $request->soalan;
        $faq->jawapan = $request->jawapan;
        $faq->user_id = $user->id;
        $faq->save();

        alert('maklumat telah diisi','berjaya');

        return back();
    }  
    public function kemaskini(Request $request) {  
        $id = (int)$request->route('id'); 
        $faq = Faq::find($id); 
        $faq->soalan = $request->soalan;
        $faq->jawapan = $request->jawapan;
        $faq->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return back();
    }  

    public function buang(Request $request) {  
        $id = (int)$request->route('id'); 
        $faq = Faq::find($id); 
        $faq->delete();
        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return back();
    } 




}
