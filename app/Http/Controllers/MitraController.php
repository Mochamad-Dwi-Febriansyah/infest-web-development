<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Mitra;


class MitraController extends Controller
{
    // admin side 
    public function index(){
        $data['getRecord'] = Mitra::getRecord();
        // dd($data['getRecord']);
        $data['title'] = 'Dashboard kelola mitra';
        return view('admin.mitra.index', $data);
    }
    public function tambahmitra(){ 
        $data['title'] = 'Dashboard kelola mitra';
        return view('admin.mitra.tambah', $data);
    }

    public function tambahmitraaction(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'no_hp' => 'required',
            'tahun_berdiri' => 'required',
            'deskripsi_perusahaan' => 'required',
            'karakteristik_perusahaan' => 'required',
            'latarbelakang_pengajuan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]); 

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 

        $mitra = new Mitra; 
        $mitra->user_create_on_mitra_id = Auth::user()->id;
        $mitra->nama = $request->nama;  
        $mitra->email = $request->email; 
        $mitra->no_hp = $request->no_hp; 
        $mitra->tahun_berdiri = $request->tahun_berdiri; 
        $mitra->deskripsi_perusahaan = $request->deskripsi_perusahaan; 
        $mitra->karakteristik_perusahaan = $request->karakteristik_perusahaan; 
        $mitra->latarbelakang_pengajuan = $request->latarbelakang_pengajuan; 
        $mitra->alamat = $request->alamat; 
        $mitra->rt = $request->rt; 
        $mitra->rw = $request->rw; 
        $mitra->kota = $request->kota; 
        $mitra->provinsi = $request->provinsi; 
        $mitra->username = $request->username;
        $mitra->password_mentah = $request->password;  
        $mitra->password = Hash::make($request->password); 
        $mitra->save();  
 

        if($mitra){
            return redirect('/admin/kelola_mitra')->with('sukses', 'Anda berhasil menambah user');
        }else{
            return redirect('/admin/kelola_mitra/tambah')->with('gagal', 'Anda gagal menambah user');
        }
 
        // return view('admin.user.tambah', $data);
    }

    public function editmitra($id){
        $data['getRecord'] = Mitra::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['title'] = "Edit user";
            return view('admin.mitra.edit', $data);
        }else{
            abort(404);
        }
    }

    public function updatemitra(Request $request){
        // dd($request->all());
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]); 

        $mitra = Mitra::getSingle($id);
        // $mitra->user_create_on_mitra_id = Auth::user()->id;
        $mitra->nama = $request->nama;  
        $mitra->email = $request->email; 
        $mitra->no_hp = $request->no_hp; 
        $mitra->tahun_berdiri = $request->tahun_berdiri; 
        $mitra->deskripsi_perusahaan = $request->deskripsi_perusahaan; 
        $mitra->karakteristik_perusahaan = $request->karakteristik_perusahaan; 
        $mitra->latarbelakang_pengajuan = $request->latarbelakang_pengajuan; 
        $mitra->alamat = $request->alamat; 
        $mitra->rt = $request->rt; 
        $mitra->rw = $request->rw; 
        $mitra->kota = $request->kota; 
        $mitra->provinsi = $request->provinsi; 
        $mitra->username = $request->username;
        $mitra->password_mentah = $request->password;  
        $mitra->password = Hash::make($request->password); 
        $mitra->is_aktif = $request->is_aktif; 
        $mitra->save();  
 

        if($mitra){
            return redirect('/admin/kelola_mitra')->with('sukses', 'Anda berhasil mengubah mitra');
        }else{
            return redirect('/admin/kelola_mitra/tambah')->with('gagal', 'Anda gagal mengubah mitra');
        }
 
        // return view('admin.user.tambah', $data);
    }

    public function deletemitra($id){
        $user = Mitra::getSingle($id);
        $user->delete();
        if($user){
            return redirect('/admin/kelola_mitra')->with('sukses', 'Anda berhasil menghapus user');
        }else{
            return redirect('/admin/kelola_mitra')->with('gagal', 'Anda gagal menghapus user');
        }
    }


    // user side
    public function pendaftaran_mitra(){
        $id = Auth::user()->id;
        $data['getMitra'] = Mitra::getSingleByUserId($id);
        // dd($data['getMitra']);
        $data['title'] = 'Daftar mitra';
        return view('user.daftar_mitra', $data);
    }
    public function insert_pendaftaran_mitra(Request $request){ 
        // dd($request->all());
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|unique:users',
                'no_hp' => 'required',
                'tahun_berdiri' => 'required',
                'deskripsi_perusahaan' => 'required',
                'karakteristik_perusahaan' => 'required',
                'latarbelakang_pengajuan' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'username' => 'required', 
                'password' => 'required',
            ]); 
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } 
    
            $mitra = new Mitra; 
            $mitra->user_create_on_mitra_id = Auth::user()->id;
            $mitra->nama = $request->nama;  
            $mitra->email = $request->email; 
            $mitra->no_hp = $request->no_hp; 
            $mitra->tahun_berdiri = $request->tahun_berdiri; 
            $mitra->deskripsi_perusahaan = $request->deskripsi_perusahaan; 
            $mitra->karakteristik_perusahaan = $request->karakteristik_perusahaan; 
            $mitra->latarbelakang_pengajuan = $request->latarbelakang_pengajuan; 
            $mitra->alamat = $request->alamat; 
            $mitra->rt = $request->rt; 
            $mitra->rw = $request->rw; 
            $mitra->kota = $request->kota; 
            $mitra->provinsi = $request->provinsi; 
            $mitra->username = $request->username; 
            $mitra->password_mentah = $request->password; 
            $mitra->password = Hash::make($request->password); 
            $mitra->save();  
     
    
            if($mitra){
                return redirect('/pendaftaran_mitra')->with('sukses', 'Anda berhasil mengajukan mitra');
            }else{
                return redirect('/pendaftaran_mitra')->with('gagal', 'Anda gagal mengajukan mitr');
            }
      
    }
}
