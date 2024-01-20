<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $menu = 'home';
        return view('landing.index',compact([
            'menu'
        ]));
    }
    public function Dashboard_landing()
    {
        $menu = 'dashboard-landing';
        return view('landing.dashboard',compact([
            'menu'
        ]));
    }
    public function Jadwal_poli()
    {
        $menu = 'jadwalpoli';
        return view('landing.jadwalpoli',compact([
            'menu'
        ]));
    }
    public function Kontak_kami()
    {
        $menu = 'kontakkami';
        return view('landing.kontakkami',compact([
            'menu'
        ]));
    }
    public function login()
    {
        $menu = 'login';
        return view('landing.login',compact([
            'menu'
        ]));
    }
    public function Register()
    {
        $menu = 'login';
        return view('landing.register',compact([
            'menu'
        ]));
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->hak_akses == 4) {
                if(auth()->user()->unit == '1002'){
                    // return redirect()->intended('indexdokter_igd');
                    return redirect()->intended('indexigd');
                }else{
                    // return redirect()->intended('indexdokter');
                    return redirect()->intended('dashboard');
                }
            } else if (auth()->user()->hak_akses == 5) {
                    if(auth()->user()->unit == '1002'){
                        return redirect()->intended('indexdokter_igd');
                    }else{
                        return redirect()->intended('dashboard');
                    }
            } else if (auth()->user()->hak_akses == 99) {
                return redirect()->intended('antrianigd');
            }
            // else if(auth()->user()->hak_akses == 9){
            //     return redirect()->intended('logout');
            // }
            else {
                return redirect()->intended('dashboard');
            }
        }
        return back()->with('loginError', 'Login gagal !');
    }
    public function store(Request $request)
    {
        $validateData = $request ->
         validate([
            'nama' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:user'],
            'unit' =>'required',
            'hak_akses' => 'required',
            'password' => 'required|min:5|max:255',
            'password2' => 'required|same:password',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('login')->with('success','Registration successful, Please Login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
