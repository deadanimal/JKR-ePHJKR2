<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\User;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;

class UserController extends Controller
{

    public function home(Request $request) {    
        return view('home');
    }

    public function dashboard(Request $request) {    
        return view('dashboard');
    }    

    public function laporan(Request $request) {    
        return view('laporan');
    }  
    
    public function profil(Request $request) {    
        return view('profil');
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

    public function login_page(Request $request) {

    }

    public function login_sso(Request $request) {

    }

    public function selenggara(Request $request) {
        return view('selenggara.senarai');
    }

    public function loginjkr()
    {
        return view('loginjkr');
    }

    public function daftarjkr()
    {
        return view('daftarjkr');
    }




}
