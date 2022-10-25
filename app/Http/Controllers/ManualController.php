<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq;

class ManualController extends Controller
{

    public function senarai(Request $request) {    
        $manuals = Faq::all();
        return view('manual.senarai', compact('manuals'));
    }




}
