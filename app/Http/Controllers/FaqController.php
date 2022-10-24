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

    public function cipta(Request $request) {  
        $user = $request->user();  
        $faq = New Faq;
        $faq->soalan = $request->soalan;
        $faq->jawapan = $request->jawapan;
        $faq->user_id = $user->id;
        $faq->save();

        return back();
    }    




}
