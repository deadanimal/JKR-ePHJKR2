<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq;

class HebahanController extends Controller
{

    public function senarai(Request $request) {    
        $hebahans = Faq::all();
        return view('hebahan.senarai', compact('hebahans'));
    }




}
