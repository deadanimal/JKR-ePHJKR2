<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PengesahanPendaftaran;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->icPengguna = $request->icPengguna;
        $user->telNo = $request->telNo;
        $user->faxNo = $request->faxNo;
        $user->daerah = $request->daerah;
        $user->aktif = false;
        $user->negeri = $request->negeri;
        $user->alamat_syarikat = $request->alamat_syarikat;
        $user->nama_syarikat = $request->nama_syarikat;
        //$user->password = $request->password;
        $user->password = Hash::make($request->password);

        
        $user->save();
        // alert('maklumat telah berjaya', 'Berjaya');

        Mail::to('haris.zahari@pipeline-network.com')->send(new PengesahanPendaftaran);

        event(new Registered($user));
        // Mail::to('maisarah.musa@pipeline-network.com')->send(new AkaunBaru());

        // return redirect('/');
        // Auth::login($user);
        alert('maklumat telah berjaya', 'Berjaya');



        return redirect('/login');

        // Auth::login($user);


        // return redirect(RouteServiceProvider::HOME);
    }
}
