<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;

class UserController extends Controller
{

    public function home(Request $request) {    
        return view('home');
    }

    public function about(Request $request) {    
        return view('about');
    }  

    public function contact(Request $request) {    
        return view('contact');
    }      

    public function privasi(Request $request) {    
        return view('privasi');
    } 
    
    public function keselamatan(Request $request) {    
        return view('keselamatan');
    }      




}
