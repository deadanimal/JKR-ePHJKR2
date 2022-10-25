<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq;

class MaklumbalasController extends Controller
{

    public function senarai(Request $request) {    
        $maklums = Faq::all();
        return view('maklum.senarai', compact('maklums'));
    }




}
