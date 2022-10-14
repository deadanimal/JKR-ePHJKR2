<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;

class ProjekController extends Controller
{

    public function senarai_projek(Request $request) {
        $projeks = Projek::all();
        return view('projek.senarai', compact('projeks'));
    }

    public function borang_projek(Request $request) {
        return view('projek.borang');
    }

    public function cipta_projek(Request $request) {
        
        $projek = New Projek;
        $projek->save();

        return back();
    }

    public function satu_projek(Request $request) {
        $id = (int)$request->route('id');
        $projek = Projek::find($id);
        
        return view('projek.satu', compact('projek'));            
    }




}
