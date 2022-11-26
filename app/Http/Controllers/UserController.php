<?php

namespace App\Http\Controllers;

use App\Mail\LupaKatalaluan;
use App\Mail\PengesahanAkaun;
use App\Models\GpssKriteria;
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
use App\Models\Permission;
use App\Models\ProjekRoleUser;
use App\Models\Role;
use App\Models\StatusProjek;
use OwenIt\Auditing\Models\Audit;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\View\Components\Alert;
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
        return view('profil.tukar_peranan2', compact('pengguna','projeks','peranans'));
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

    public function tolak_tukar_peranan2(Request $request) {  
        $id = (int)$request->route('id'); 
        $p = PenukaranPeranan::find($id); 
        $p->delete();

        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/senaraiPengguna/senarai_tukar_peranan');
    }

    public function sah_tukar_peranan2(Request $request) {  
        $id = (int)$request->route('id'); 
        $p = PenukaranPeranan::find($id); 
        $p->sah = $request->sah;

        $role_baru = $p->role_id_baru;
        $role = ProjekRoleUser::where('projek_id', $p->projek_id)->where('user_id', $p->user_id)->first();
        $role->role_id = $role_baru;
        $role->save();

        $p->save();

        alert()->success('Penukaran Peranan telah disahkan', 'Berjaya');
        return redirect('/senaraiPengguna/senarai_tukar_peranan');
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
        $pengguna = User::with(['cubacuba'])->where('aktif','1')->get();

        // foreach ($pengguna as $key => $p) {
        //     // dd($p->peranan->role_id);
        //     $test = $p->peranan;
        //     $id_peranan = $test['role_id'];
        //     // dd($id_peranan);
        //     $peranan = Role::where('id', $id_peranan)->first();
        //     $p['peranan'] = $peranan->name;
        // }

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
        
        $admin = Role::where('name', $request->nama)->first();
        $pengguna->save();

        $pengguna->attachRole($admin);


        // $pengguna->email = $request->email;

        
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
        $peranan = PenukaranPeranan::where('sah','0')->get();
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

        $admin = Role::where('name', $request->nama)->first();
        $penggunaa->save();
        $penggunaa->attachRole($admin);
        alert()->success('Akaun telah disahkan', 'Berjaya');

        Mail::to($penggunaa->email)->send(new PengesahanAkaun());
        return redirect('/senaraiPengguna');
    }

    public function tolak_sah_akaun(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id); 
        $pengguna->delete();

        alert()->success('Permohonan Akaun Anda Ditolak', 'Berjaya');
        return redirect('/senaraiPengguna');
    }

    public function senarai_sembunyi(Request $request) {   
        $id = (int)$request->route('id'); 
        $pengguna = User::where('aktif','0')->get();
        return view('senaraiPengguna.sembunyi', compact('pengguna'));
    }

    public function gugur_pengguna(Request $request) {  
        $id = (int)$request->route('id'); 
        $pengguna = User::find($id); 
        $pengguna->delete();

        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/senaraiPengguna/sembunyi');
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
    // public function about(Request $request) {    
    //     return view('about.about');
    // } 
    public function about1(Request $request) {    
        return view('about.about1');
    }
    public function about2(Request $request) {    
        return view('about.about2');
    }
    public function about3(Request $request) {    
        return view('about.about3');
    }
    public function about4(Request $request) {    
        return view('about.about4');
    } 
    public function about5(Request $request) {    
        return view('about.about5');
    }
    public function about6(Request $request) {    
        return view('about.about6');
    }
    public function about7(Request $request) {    
        return view('about.about7');
    }
    public function about8(Request $request) {    
        return view('about.about8');
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
        $projek = StatusProjek::all();
        $audits = Audit::all();
        $kriteria = Kriteria::all();
        $Gpsskriteria = GpssKriteria::all();

        return view('selenggara.senarai', compact('peranan','projek', 'audits', 'kriteria', 'Gpsskriteria'));
    }
    //selenggara peranan

    public function cipta_peranan(Request $request) {
        $peranan = New Role;
        $peranan->name = $request->name;
        $peranan->display_name = $request->display_name;
        $peranan->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_peranan(Request $request) {   
        $id = (int)$request->route('id'); 
        $peranan = Role::find($id);
        $kebenaran = Permission::all();
        return view('selenggara.kemaskini_peranan', compact('peranan', 'kebenaran'));
    }

    public function simpankemaskini_peranan(Request $request) {
        // dd($request->all());
        $id = (int)$request->route('id');
        $peranan = Role::find($id);
        $peranan->name = $request->name;
        $peranan->display_name = $request->display_name;
        $peranan->save();

        $kebenaran = Permission::all();


        if ($request->kebenaran) {
            $peranan->syncPermissions($request->kebenaran);
        } else {
            $peranan->detachPermissions($kebenaran);
        }
        
        

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
        $projek = New StatusProjek();
        $projek->status = $request->status;
        $projek->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_status(Request $request) {   
        $id = (int)$request->route('id'); 
        $projek = StatusProjek::find($id);
        return view('selenggara.kemaskini_status_projek', compact('projek'));
    }

    public function simpankemaskini_status(Request $request) {
        $id = (int)$request->route('id');
        $projek = StatusProjek::find($id);
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
        $kriteria->borang_seq = $request->borang_seq;
        $kriteria->kategori = $request->kategori;
        $kriteria->kategori_seq = $request->kategori_seq;
        $kriteria->kod = $request->kod;
        $kriteria->maksimum = $request->maksimum;
        $kriteria->bukti = $request->bukti;
        $kriteria->nama = $request->nama;
        $kriteria->fasa = $request->fasa;
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
        $kriteria->borang = $request->borang;
        $kriteria->borang_seq = $request->borang_seq;
        $kriteria->kategori = $request->kategori;
        $kriteria->kategori_seq = $request->kategori_seq;
        $kriteria->kod = $request->kod;
        $kriteria->maksimum = $request->maksimum;
        $kriteria->bukti = $request->bukti;
        $kriteria->nama = $request->nama;
        $kriteria->fasa = $request->fasa;
        $kriteria->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function buang_kriteria(Request $request) {  
        $id = (int)$request->route('id'); 
        $kriteria = Kriteria::find($id); 
        $kriteria->delete();
        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return redirect('/selenggara');
    }

    //selenggaraGpsskriteria
    public function cipta_gpss_kriteria(Request $request) {
        $gpss_kriteria = New GpssKriteria();
        $gpss_kriteria->borang = $request->borang;
        $gpss_kriteria->elemen = $request->elemen;
        $gpss_kriteria->element_seq = $request->elemen_seq;
        $gpss_kriteria->maksimum = $request->maksimum;
        $gpss_kriteria->komponen = $request->komponen;
        $gpss_kriteria->maksimum = $request->maksimum;
        $gpss_kriteria->produk = $request->produk;
        $gpss_kriteria->fasa = $request->fasa;
        $gpss_kriteria->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function kemaskini_gpss_kriteria(Request $request) {   
        $id = (int)$request->route('id'); 
        $gpss_kriteria = GpssKriteria::find($id);
        return view('selenggara.gpss_bangunan', compact('gpss_kriteria'));
    }

    public function simpankemaskini_gpss_kriteria(Request $request) {
        $id = (int)$request->route('id');
        $gpss_kriteria = GpssKriteria::find($id);
        $gpss_kriteria->borang = $request->borang;
        $gpss_kriteria->elemen = $request->elemen;
        $gpss_kriteria->element_seq = $request->elemen_seq;
        $gpss_kriteria->maksimum = $request->maksimum;
        $gpss_kriteria->komponen = $request->komponen;
        $gpss_kriteria->maksimum = $request->maksimum;
        $gpss_kriteria->produk = $request->produk;
        $gpss_kriteria->fasa = $request->fasa;
        $gpss_kriteria->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/selenggara');
    }

    public function buang_gpssKriteria(Request $request) {  
        $id = (int)$request->route('id'); 
        $gpss_kriteria = GpssKriteria::find($id); 
        $gpss_kriteria->delete();
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

    // public function custom_login(Request $request) {

    //     $user = User::where([
    //         ['icPengguna', '=', $request->icPengguna],
    //         ['password', '=', $request->password]
    //     ])->first();

    //     if (Auth::attempt($this->only('icPengguna', 'password'))) {
    //         return redirect('/dashboard');
    //     } else {
    //         dd('not ok');
    //     }
    // }

    public function tunjuk_lupa(){
        return view('auth.lupa');
    }

    public function cipta_lupa(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->first();
        // dd($user);
        if ($user == null || $email == null) {
            alert()->error('Email Tidak Sah', 'Gagal');
            return redirect('/login'); 
        }
        $user->password = Hash::make('ePHJKR');
        $user->save();
        // Mail::to('haris.zahari@pipeline-network.com')->send(new LupaKatalaluan);
        Mail::to($user->email)->send(new LupaKatalaluan);
        alert()->success('Sila Login Kembali', 'Berjaya');
        return redirect('/login');
    }



// public function audit()
// {
//     $audits = Audit::all();

//     return view('/selenggara');

// }


}
