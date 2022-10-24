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




}
