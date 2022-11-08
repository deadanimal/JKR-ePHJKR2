<?php

namespace App\Http\Controllers;

use App\Models\Hebahan;
use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;
use App\Models\ProjekRoleUser;
use App\Models\Role;
use OwenIt\Auditing\Models\Audit;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function home(Request $request) {  
        $hebahans=Hebahan::all();  

        return view('home',compact('hebahans'));
    }

    public function dashboard(Request $request) {    
        return view('dashboard');
    }    

    public function laporan(Request $request) {    
        return view('laporan');
    }  
    
    public function profil(Request $request) { 
        $pengguna = Auth::user();  
        return view('profil.paparan_profil',compact('pengguna'));
    }
    
    public function kemaskini_profil(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        return view('profil.kemaskini', compact('pengguna'));
    }

    public function simpan_kemaskini(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;

        $pengguna->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/profil');
    }

    public function tukar_peranan(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $peranan = Role::all();
        // $projek = ProjekRoleUser::with(['projek'])->where('user_id', $id)->get();
        $projek = ProjekRoleUser::where('user_id', $id)->get();
        // $projek = ProjekRoleUser::all();

        // dd($projek);
        return view('profil.tukar_peranan', compact('pengguna','projek','peranan'));
    }

    public function simpan_tukar_peranan(Request $request) {  
        $id = (int)$request->route('id'); 
        $perananProjek = ProjekRoleUser::where('user_id', $id)->first();
        if ($perananProjek == null) {
            $perananProjek = new ProjekRoleUser();
        }
        
        $perananProjek->projek_id = $request->projek_id;
        $perananProjek->role_id = $request->role_id;

        $perananProjek->save();
        alert()->success('Peranan telah dikemaskini', 'Berjaya');
        return redirect('/profil');
    }

    public function senaraiPengguna(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::where('aktif','0')->get();
        // dd($pengguna);
        return view('senaraiPengguna.senarai', compact('pengguna'));
    }

    public function cipta(Request $request) {    
        return view('senaraiPengguna.tambah');
    }

    public function cipta_pengguna(Request $request) {  
        $pengguna = new User(); 
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        // $pengguna->email = $request->email;

        $pengguna->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function kemaskini_pengguna(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);  
        return view('senaraiPengguna.kemaskini', compact('pengguna'));
    }

    public function simpan_kemaskini_pengguna(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;

        $pengguna->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function senarai_tukar_peranan(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::all();
        return view('senaraiPengguna.senarai_tukar_peranan', compact('pengguna'));
    }

    public function senarai_sembunyi(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::where('aktif','1')->get();
        return view('senaraiPengguna.sembunyi', compact('pengguna'));
    }

    public function tukar_status(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::all();
        return view('senaraiPengguna.sembunyi', compact('pengguna'));
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
        $peranan = Role::all();
        $projek = Projek::all();
        $audits = Audit::all();

        return view('selenggara.senarai', compact('peranan','projek', 'audits'));
    }
    //selenggara peranan

    public function cipta_peranan(Request $request) {
        $peranan = New Role;
        $peranan->name = $request->name;
        $peranan->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_peranan(Request $request) {   
        $id = (int)$request->route('id'); 
        $peranan = Role::find($id);
        return view('selenggara.kemaskini_peranan', compact('peranan'));
    }

    public function simpankemaskini_peranan(Request $request) {
        $id = (int)$request->route('id');
        $peranan = Role::find($id);
        $peranan->name = $request->name;
        $peranan->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function buang(Request $request) {  
        $id = (int)$request->route('id'); 
        $peranan = Role::find($id); 
        $peranan->delete();

        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/selenggara');
    }
    //selenggara status projek
    public function cipta_statusprojek(Request $request) {
        $projek = New Projek();
        $projek->status = $request->status;
        $projek->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_status(Request $request) {   
        $id = (int)$request->route('id'); 
        $projek = Projek::find($id);
        return view('selenggara.kemaskini_status_projek', compact('projek'));
    }

    public function simpankemaskini_status(Request $request) {
        $id = (int)$request->route('id');
        $projek = Projek::find($id);
        $projek->status = $request->status;
        $projek->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function buang_status(Request $request) {  
        $id = (int)$request->route('id'); 
        $projek = Projek::find($id); 
        $projek->delete();

        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/selenggara');
    }

    public function loginjkr()
    {
        return view('loginjkr');
    }

    public function daftarjkr()
    {
        return view('daftarjkr');
    }

    public function custom_login(Request $request) {

        $user = User::where([
            ['icPengguna', '=', $request->icPengguna],
            ['password', '=', $request->password]
        ])->first();

        if (Auth::attempt($this->only('icPengguna', 'password'))) {
            return redirect('/dashboard');
        } else {
            dd('not ok');
        }
    }


// public function audit()
// {
//     $audits = Audit::all();

//     return view('/selenggara');

// }


}
