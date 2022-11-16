<?php

namespace App\Http\Controllers;

use App\Mail\LupaKatalaluan;
use App\Mail\PengesahanAkaun;
use App\Models\Hebahan;
use App\Models\Kriteria;
use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;
use App\Models\PenukaranPeranan;
use App\Models\ProjekRoleUser;
use App\Models\Role;
use OwenIt\Auditing\Models\Audit;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $pengguna->negeri = $request->negeri;
        $pengguna->daerah = $request->daerah;
        $pengguna->telNo = $request->telNo;
        $pengguna->faxNo = $request->faxNo;
        $pengguna->nama_cawangan = $request->nama_cawangan;
        $pengguna->nama_syarikat = $request->nama_syarikat;
        $pengguna->alamat_syarikat = $request->alamat_syarikat;
        $pengguna->password = Hash::make($request->password);


        $pengguna->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/profil');
    }

    public function tukar_peranan(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $lantikans = Role::all();
        $lantikans = ProjekRoleUser::where('projek_id', $id)->get();

        // dd($lantikans);
        return view('profil.tukar_peranan', compact('lantikans','pengguna'));
    }

    public function tukar_peranan2(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $peranans = PenukaranPeranan::all();
        $projeks = ProjekRoleUser::with(['projek','user'])->where('user_id', $id)->get();
        foreach ($projeks as $key => $p) {
            $peranan = Role::find($p->role_id)->name;
            $p['nama_peranan'] = $peranan;
        }

        // dd($projeks);
        return view('profil.tukar_peranan2', compact('pengguna','projeks','peranans','p'));
    }

    public function simpan_tukar_peranan2(Request $request) {  
        $lantikan = new PenukaranPeranan(); 
        $lantikan->projek_id = $request->projek_id;
        $lantikan->role_id_baru = $request->role_id_baru;
        $lantikan->user_id = $request->user_id;
        $lantikan->sah = false;
        $lantikan->dokumen = $request->file('dokumen')->store('jkr-ephjkr/uploads');

        $lantikan->role_id_lama = $request->role_id_lama;

        // $id = (int)$request->route('id'); 
        // $lantikan = ProjekRoleUser::find($id);
        // $lantikan->role_id = $request->name;
        // $lantikan->user_id->status_tukar_peranan = true;

        $lantikan->save();
        alert()->success('Peranan telah dikemaskini', 'Berjaya');
        return redirect('/profil');
    }

    // public function simpan_tukar_peranan(Request $request) {  
    //     $id = (int)$request->route('id'); 
    //     $lantikan = ProjekRoleUser::find($id);
    //     $lantikan->role_id = $request->name;
    //     // $lantikan->user_id->status_tukar_peranan = true;

    //     $lantikan->save();
    //     alert()->success('Peranan telah dikemaskini', 'Berjaya');
    //     return redirect('/profil');
    // }

    // public function simpan2_tukar_peranan(Request $request) {  
    //     $id = (int)$request->route('id'); 
    //     $lantikan = ProjekRoleUser::find($id);
    //     $lantikan->role_id = $request->name;

    //     $lantikan->save();
    //     alert()->success('Peranan telah dikemaskini', 'Berjaya');
    //     return redirect('/profil');
    // }
    // public function simpan3_tukar_peranan(Request $request) {  
    //     $id = (int)$request->route('id'); 
    //     $lantikan = ProjekRoleUser::find($id);
    //     $lantikan->role_id = $request->name;

    //     $lantikan->save();
    //     alert()->success('Peranan telah dikemaskini', 'Berjaya');
    //     return redirect('/profil');
    // }

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
        $pengguna->icPengguna = $request->icPengguna;
        $pengguna->negeri = $request->negeri;
        $pengguna->daerah = $request->daerah;
        $pengguna->alamat_syarikat = $request->alamat_syarikat;
        $pengguna->nama_syarikat = $request->nama_syarikat;
        $pengguna->nama_cawangan = $request->nama_cawangan;
        $pengguna->faxNo = $request->faxNo;
        $pengguna->telNo = $request->telNo;
        $pengguna->password = Hash::make($request->password);


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

    public function papar_pengguna(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);  
        return view('senaraiPengguna.papar', compact('pengguna'));
    }

    public function simpan_kemaskini_pengguna(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->icPengguna = $request->icPengguna;
        $pengguna->negeri = $request->negeri;
        $pengguna->daerah = $request->daerah;
        $pengguna->alamat_syarikat = $request->alamat_syarikat;
        $pengguna->nama_syarikat = $request->nama_syarikat;
        $pengguna->nama_cawangan = $request->nama_cawangan;
        $pengguna->faxNo = $request->faxNo;
        $pengguna->telNo = $request->telNo;

        $pengguna->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function senarai_tukar_peranan(Request $request) {   
        $id = (int)$request->route('id'); 
        $peranan = PenukaranPeranan::all();
        return view('senaraiPengguna.senarai_tukar_peranan', compact('peranan'));
    }

    public function senarai_pengesahan_akaun(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::where('sah','0')->get();
        return view('senaraiPengguna.pengesahan_akaun_baru', compact('pengguna'));
    }

    public function simpan_sah_akaun(Request $request) {  
        $id = (int)$request->route('id'); 
        $penggunaa = User::find($id);
        $penggunaa->sah = $request->sah;
        $penggunaa->save();
        alert()->success('Akaun telah disahkan', 'Berjaya');

        Mail::to($penggunaa->email)->send(new PengesahanAkaun());
        return redirect('/senaraiPengguna');
    }

    public function senarai_sembunyi(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::where('aktif','1')->get();
        return view('senaraiPengguna.sembunyi', compact('pengguna'));
    }

    public function simpan_tukar_status(Request $request) {  
        $id = (int)$request->route('id'); 
        $penggunaa = User::find($id);
        $penggunaa->aktif = $request->aktif;

        $penggunaa->save();
        alert()->success('Status Peranan telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function simpan2_tukar_status(Request $request) {  
        $id = (int)$request->route('id'); 
        $penggunaa = User::find($id);
        $penggunaa->aktif = $request->aktif;

        $penggunaa->save();
        alert()->success('Status Peranan telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function simpan3_tukar_status(Request $request) {  
        $id = (int)$request->route('id'); 
        $penggunaa = User::find($id);
        $penggunaa->aktif = $request->aktif;

        $penggunaa->save();
        alert()->success('Status Peranan telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function simpan4_tukar_status(Request $request) {  
        $id = (int)$request->route('id'); 
        $penggunaa = User::find($id);
        $penggunaa->aktif = $request->aktif;

        $penggunaa->save();
        alert()->success('Status Peranan telah disimpan', 'Berjaya');
        return redirect('/senaraiPengguna');
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
        $peranan = Role::where('aktif','0')->get();
        $projek = Projek::all();
        $audits = Audit::all();
        $kriteria = Kriteria::all();

        return view('selenggara.senarai', compact('peranan','projek', 'audits', 'kriteria'));
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

    public function selenggara_aktif(Request $request) {  
        $id = (int)$request->route('id'); 
        $peranan = Role::find($id);
        $peranan->aktif = $request->aktif;
        $peranan->save();
        alert()->success('Peranan telah dipadam', 'Berjaya');

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
        
        // $projek->delete();

        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/selenggara');
    }
    //selenggarakriteria
    public function cipta_kriteria(Request $request) {
        $kriteria = New Kriteria();
        $kriteria->borang = $request->borang;
        $kriteria->kategori = $request->kategori;
        $kriteria->kod = $request->kod;
        $kriteria->bukti = $request->bukti;
        $kriteria->nama = $request->nama;
        $kriteria->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_kriteria(Request $request) {   
        $id = (int)$request->route('id'); 
        $kriteria = Kriteria::find($id);
        return view('selenggara/phjkr_bangunan', compact('kriteria'));
    }

    public function simpankemaskini_kriteria(Request $request) {
        $id = (int)$request->route('id');
        $kriteria = Kriteria::find($id);
        $kriteria->kod = $request->kod;
        $kriteria->kategori = $request->kategori;
        $kriteria->nama = $request->nama;
        $kriteria->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
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

    public function tunjuk_lupa(){
        return view('auth.lupa');
    }

    public function cipta_lupa(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->first();
        $user->password = Hash::make('ePHJKR');
        $user->save();

        // Mail::to('haris.zahari@pipeline-network.com')->send(new LupaKatalaluan);
        Mail::to($user->email)->send(new LupaKatalaluan);

        return redirect('/login');
    }



// public function audit()
// {
//     $audits = Audit::all();

//     return view('/selenggara');

// }


}
