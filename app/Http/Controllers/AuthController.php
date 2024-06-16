<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }
    public function postLogin(Request $request){ 
        // dd($request->all());
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) { 
            if(Auth::user()->user_type == 0){
                return redirect('/');
            }
            else if(Auth::user()->user_type == 1){
                return redirect('mitra/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('admin/dashboard');
            }   
        }else if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) { 
            if(Auth::user()->user_type == 0){
                return redirect('/');
            }
            else if(Auth::user()->user_type == 1){
                return redirect('mitra/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('admin/dashboard'); 
            }
        }else if(Auth::guard('mitra')->attempt(['email' => $request->username, 'password' => $request->password])){
            // dd($request->all());
            return redirect('mitra/dashboard');
            if(Auth::guard('mitra')->user()->user_type == 1){
            } else{
                return redirect()->back()->with('gagal', 'Masukkan username dan password yang tepat');
            }

        }
        else{

            return redirect()->back()->with('gagal', 'Masukkan username dan password yang tepat');
        }
    }
    
    public function registrasi(){
        $data['title'] = 'Registrasi';
        return view('auth.registrasi', $data);
    }
    public function postRegistrasi(Request $request){ 
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
        ]); 

        if ($validator->fails()) {
            return redirect('/registrasi')->withErrors($validator)->withInput();
        }  

        $user = new User; 
        $user->nama = $request->nama; 
        $user->username = $request->username; 
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->tanggal_lahir = $request->tanggal_lahir; 
        $user->no_hp = $request->no_hp; 
        $user->save();  

        if($user){
            return redirect('/login')->with('sukses', 'Anda berhasil registrasi, silahkan login');
        }else{
            return redirect('/registrasi')->with('gagal', 'Anda gagal registrasi, silahkan coba lagi');
        } 
    }
    public function Logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }

}
