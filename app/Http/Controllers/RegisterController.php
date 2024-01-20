<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegisterController extends Controller
{
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
        // $request->session()->flash('success','Registration successful, Please Login');
        return redirect('login')->with('success','Registration successful, Please Login');
    }
}
