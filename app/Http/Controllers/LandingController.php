<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
