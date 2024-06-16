<?php

namespace App\Http\Controllers;

use App\Models\DaftarLowongan;
use Illuminate\Http\Request;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LowonganController extends Controller
{
    public function index(){
        $data['getRecord'] = Lowongan::getRecord();
        // dd($data['getRecord']);
        $data['title'] = 'Dashboard kelola mitra';
        return view('mitra.lowongan.index', $data);
    }
    public function tambahlowongan(){ 
        $data['title'] = 'Dashboard kelola mitra';
        return view('mitra.lowongan.tambah', $data);
    }

    public function tambahlowonganaction(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_lowongan' => 'required',
            'lokasi_lowongan' => 'required',
            'deskripsi_lowongan' => 'required',
            'kriteria_lowongan' => 'required', 
            'level_lowongan' => 'required',
            'tipe_lowongan' => 'required',
            'kategori_lowongan' => 'required', 
        ]); 

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 

        $lowongan = new Lowongan; 
        $lowongan->mitra_id = Auth::guard('mitra')->user()->id;
        $lowongan->nama_lowongan = $request->nama_lowongan;
        $lowongan->lokasi_lowongan = $request->lokasi_lowongan;
        $lowongan->deskripsi_lowongan = $request->deskripsi_lowongan;
        $lowongan->kriteria_lowongan = $request->kriteria_lowongan;
        $lowongan->gaji_batas_awal = $request->gaji_batas_awal;
        $lowongan->gaji_batas_akhir = $request->gaji_batas_akhir;
        $lowongan->level_lowongan = $request->level_lowongan;
        $lowongan->tipe_lowongan = $request->tipe_lowongan;
        $lowongan->kategori_lowongan = $request->kategori_lowongan;
        $lowongan->is_aktif = $request->is_aktif;
         
        $lowongan->save();  
 

        if($lowongan){
            return redirect('/mitra/kelola_lowongan')->with('sukses', 'Anda berhasil menambah lowongan');
        }else{
            return redirect('/mitra/kelola_lowongan/tambah')->with('gagal', 'Anda gagal menambah lowongan');
        }
 
        // return view('admin.user.tambah', $data);
    }

    public function editlowongan($id){
        $data['getRecord'] = Lowongan::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['title'] = "Edit lowongan";
            return view('mitra.lowongan.edit', $data);
        }else{
            abort(404);
        }
    }

    public function updatelowongan(Request $request){
        // dd($request->all());
        $id = Auth::guard('mitra')->user()->id;
        // dd($id);
        // request()->validate([
        //     'email' => 'required|email|unique:users,email,'.$id
        // ]); 

        $lowongan = Lowongan::getSingleByUserId($id);
        // $mitra->user_create_on_mitra_id = Auth::user()->id;
        $lowongan->mitra_id = Auth::guard('mitra')->user()->id;
        $lowongan->nama_lowongan = $request->nama_lowongan;
        $lowongan->lokasi_lowongan = $request->lokasi_lowongan;
        $lowongan->deskripsi_lowongan = $request->deskripsi_lowongan;
        $lowongan->kriteria_lowongan = $request->kriteria_lowongan;
        $lowongan->gaji_batas_awal = $request->gaji_batas_awal;
        $lowongan->gaji_batas_akhir = $request->gaji_batas_akhir;
        $lowongan->level_lowongan = $request->level_lowongan;
        $lowongan->tipe_lowongan = $request->tipe_lowongan;
        $lowongan->kategori_lowongan = $request->kategori_lowongan;
        $lowongan->is_aktif = $request->is_aktif;
        $lowongan->save();  
 

        if($lowongan){
            return redirect('/mitra/kelola_lowongan')->with('sukses', 'Anda berhasil mengubah lowongan');
        }else{
            return redirect('/mitra/kelola_lowongan/tambah')->with('gagal', 'Anda gagal mengubah lowongan');
        }
 
        // return view('admin.user.tambah', $data);
    }

    public function deletemitra($id){
        $user = Lowongan::getSingle($id);
        $user->delete();
        if($user){
            return redirect('/mitra/kelola_lowongan')->with('sukses', 'Anda berhasil menghapus lowongan');
        }else{
            return redirect('/mitra/kelola_lowongan')->with('gagal', 'Anda gagal menghapus lowongan');
        }
    }

    
}
