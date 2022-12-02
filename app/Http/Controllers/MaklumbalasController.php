<?php

namespace App\Http\Controllers;

use App\Mail\Maklumbalas as MailMaklumbalas;
use App\Mail\MaklumbalasPenggunaluar;
use Illuminate\Http\Request;

use App\Models\Maklumbalas;
use App\Models\MbMesej;
use Illuminate\Support\Facades\Mail;

use Error;

class MaklumbalasController extends Controller
{

    public function senarai(Request $request) {    
        // $maklums = Maklumbalas::all();
        $user = $request->user();
        if ($user->hasRole('sekretariat|pentadbir')) {
            $maklums = Maklumbalas::all();    
        } else {
            $maklums = Maklumbalas::where('user_id', $user->id)->get();
        }
        
        return view('maklum.senarai', compact('maklums'));
    }

    public function satu(Request $request) {   
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        $maklum2 = MbMesej::find($id);
    
        return view('maklum.satu', compact('maklum'));
    }    

    public function cipta(Request $request) {  
        $user = $request->user(); 
        $id = (int)$request->route('id'); 
        $maklum = New Maklumbalas;
        $maklum->keterangan = $request->keterangan;
        $maklum->kategori = $request->kategori;
        $maklum->subjek = $request->subjek;
        $maklum->status = 'SEMAK';
        $maklum->user_id = $user->id;
        $maklum->save();

        Mail::to('maisarah.musa@pipeline-network.com')->send(new MailMaklumbalas);
        // Mail::to('haris.zahari@pipeline-network.com')->send(new MailMaklumbalas);



        
        $maklum2 = New MbMesej;
        $maklum2->maklumbalas_id = $maklum->id;
        $maklum2->user_id = $maklum->user_id;
        $maklum2->save();



        alert()->success('Maklumat Telah Disimpan', 'Berjaya');
        return back();
    }  

    // public function kemaskini(Request $request) {   
    //     $id = (int)$request->route('id'); 
    //     $maklum = Maklumbalas::find($id);
    //     $maklum->keterangan = $request->keterangan;
    //     $maklum->kategori = $request->kategori;
    //     $maklum->subjek = $request->subjek;
    //     if($request->action=="dalamproses") {
    //         $maklum->status = "DALAM PROSES";
    //     } else {
    //         $maklum->status = "SELESAI";
    //     }
    //     $maklum->save();

    //     $id = (int)$request->route('id'); 
    //     $maklum2 = MbMesej::find($id);
    //     $maklum2->mesej = $request->mesej;
    //     if($request->action=="dalamproses") {
    //         $maklum->status = "DALAM PROSES";
    //     } else {
    //         $maklum->status = "SELESAI";
    //     }
    //     $maklum2->save();
    //     alert()->success('Maklumat Telah Dikemaskini','Berjaya');
    //     return back();
    // }  
    
    public function pengguna_luar(Request $request){
        return view('maklum.pengguna_luar');
    }

    public function cipta_pengguna_luar(Request $request) { 

        $maklum = New Maklumbalas;
        $maklum->nama = $request->nama;
        $maklum->email = $request->email;
        $maklum->keterangan = $request->keterangan;
        $maklum->kategori = $request->kategori;
        $maklum->subjek = $request->subjek;
        $maklum->status = 'SEMAK';
        $maklum->save();

        Mail::to('maisarah.musa@pipeline-network.com')->send(new MaklumbalasPenggunaluar);


        $maklum2 = New MbMesej;
        $maklum2->maklumbalas_id = $maklum->id;
        $maklum2->user_id = $maklum->user_id;
        $maklum2->mesej = $request->mesej;

        $maklum2->save();
        alert('Maklumat Telah Disimpan', 'Berjaya');
        return back();
    } 

    public function papar(Request $request) {   
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        // dd($maklum->mbmesej);
        // $mesejs = MbMesej::where('maklumbalas_id', $maklum->id)->first();
        // if ($mesejs == null) {
        //     $maklum['mesej'] = '';
        // }else {
        //     $mesejs = $mesejs->mesej;
        //     $maklum['mesej'] = $mesejs;
        // }
        // dd($mesejs);
        // foreach ($mesejs as $key => $mb) {
        //     $mbb = MbMesej::find($mb->id)->mesej;
        //     if ($mbb != null ){
        //         $maklum = 'a';
        //     }else{
        //         $maklum = 'b';
        //     };
        //     // dd($mb);
        //     // dd($mesejs);

        // }
        // dd($maklum);
        // dd($mesejs);
    
        return view('maklum.papar', compact('maklum'));
    } 

    public function hantar_mesej(Request $request) {
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        // $mesej = New MbMesej;
        $mesej = MbMesej::where('maklumbalas_id', $id)->first();
        // $mesej->user_id = $request->user()->id;
        $mesej->maklumbalas_id = $maklum->id;
        $mesej->mesej = $request->mesej;
        if($request->action=="dalamproses") {
            $maklum->status = "DALAM PROSES";
        } else {
            $maklum->status = "SELESAI";
        }
        $maklum->save();
        $mesej->save();   
        alert('Mesej Dihantar', 'Berjaya');
        return back();
    }

    public function buang(Request $request) {    
        $id = (int)$request->route('id'); 
        $maklum = Maklumbalas::find($id);
        $maklum->delete();
        alert()->success('Maklumat telah dibuang', 'Berjaya');
        return back();
    }





}
