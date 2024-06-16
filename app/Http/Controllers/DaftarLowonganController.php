<?php

namespace App\Http\Controllers;

use App\Models\DaftarLowongan;
use App\Models\Lowongan;
use App\Models\DokumenUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;


class DaftarLowonganController extends Controller
{
    public function daftarlowongan($id){ 
        $data['getRecord'] = Lowongan::getSingle($id);
        // dd($data['getRecord']);
        $dokumen = DokumenUser::getSingle(Auth::user()->id); 
        if(!empty($dokumen)){
            $data['getDokumen'] = $dokumen;
        }
        // dd($data);
        $data['cekUserPelamar'] = DaftarLowongan::getSingleUser(Auth::user()->id, $id);
        // dd($data);
        $data['title'] = 'Lowongan JobReseacher';
        return view('user.daftar_lowongan', $data);
        // daftarlowonganaction
    }
    // public function daftarlowonganaction(Request $request){
    //     dd($request->all());
    // }
    public function daftarlowonganaction($id, Request $request){
            // dd($request->all());
        $id_user = Auth::user()->id;
        $dokumen = DokumenUser::getSingle($id_user); 

        if(empty($request->file())){
            $daftarLowongan = new DaftarLowongan; 
            // dd($request->file());
            $daftarLowongan->mitra_id = $request->mitra_id;
            $daftarLowongan->user_pelamar_id = Auth::user()->id;
            $daftarLowongan->lowongan_id = $id;
            $daftarLowongan->ktp = $request->ktp;
            $daftarLowongan->cv = $request->cv;
            $daftarLowongan->ijazah = $request->ijazah;
            $daftarLowongan->dokumen_pendukung = $request->dokumen_pendukung;
            $daftarLowongan->keterangan_lainnya = $request->keterangan_lainnya;
            $daftarLowongan->save();
        }else{

            $userDirectory = 'upload/dokumen/' . Auth::user()->nama . '/';
    
            // Check if the directory exists, if not create it
            if (!File::exists(public_path($userDirectory))) {
                File::makeDirectory(public_path($userDirectory), 0775, true);
            }
    
            // if(!empty)
        
            if(!empty($dokumen)){  
                if ($request->hasFile('ktp')) {
                $this->handleFileUpload($request, 'ktp', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya); 
                }else if($request->hasFile('cv')){
                $this->handleFileUpload($request, 'cv', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya);
                }else if($request->hasFile('ijazah')){
                $this->handleFileUpload($request, 'ijazah', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya);
                }else if($request->hasFile('dokumen_pendukung')){
                $this->handleFileUpload($request, 'dokumen_pendukung', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya); 
                }
                $dokumen->save();
            } else { 
                $dokumen = new DokumenUser;
                $dokumen->user_id = $id_user; 
                if ($request->hasFile('ktp')) {
                $this->handleFileUpload($request, 'ktp', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya);
                }else if($request->hasFile('cv')){
                $this->handleFileUpload($request, 'cv', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya);
                }else if($request->hasFile('ijazah')){
                $this->handleFileUpload($request, 'ijazah', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya);
                }else if($request->hasFile('dokumen_pendukung')){
                $this->handleFileUpload($request, 'dokumen_pendukung', $userDirectory, $dokumen, $id,$request->ktp, $request->cv, $request->ijazah, $request->keterangan_lainnya); 
                } 
                $dokumen->save();
            }
        }

       
    
       
 

        return redirect()->back()->with('sukses', 'Berhasil mendaftar lowongan');

 
    }
    
    private function handleFileUpload($request, $fileKey, $userDirectory, $dokumen, $id) {
        if ($request->hasFile($fileKey)) {
            $ext = $request->file($fileKey)->getClientOriginalExtension();
            $file = $request->file($fileKey);
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            
            // Move new file to directory
            $file->move(public_path($userDirectory), $filename);
    
            // Check if there's an existing file for this attribute
            // if (!empty($dokumen->$fileKey)) {
            //     // Delete the existing file
            //     File::delete(public_path($userDirectory . $dokumen->$fileKey));
            // }
    
            // Update the attribute with the new filename
            $dokumen->$fileKey = $filename;

            
            $daftarLowongan = new DaftarLowongan; 
            $daftarLowongan->mitra_id = $request->mitra_id;
            $daftarLowongan->user_pelamar_id = Auth::user()->id;
            $daftarLowongan->lowongan_id = $id;
            if ($request->hasFile('ktp')) { 
                $daftarLowongan->ktp = $filename;
                $daftarLowongan->cv = $request->cv;
                $daftarLowongan->ijazah = $request->ijazah;
                $daftarLowongan->dokumen_pendukung = $request->dokumen_pendukung; 
            }else if($request->hasFile('cv')){
                $daftarLowongan->ktp = $request->ktp;
                $daftarLowongan->cv = $filename;
                $daftarLowongan->ijazah = $request->ijazah;
                $daftarLowongan->dokumen_pendukung = $request->dokumen_pendukung; 
            }else if($request->hasFile('ijazah')){ 
                $daftarLowongan->ktp = $request->ktp;
                $daftarLowongan->cv = $request->cv;
                $daftarLowongan->ijazah = $filename;   
                $daftarLowongan->dokumen_pendukung = $request->dokumen_pendukung; 
            }else if($request->hasFile('dokumen_pendukung')){ 
                $daftarLowongan->ktp = $request->ktp;
                $daftarLowongan->cv = $request->cv;
                $daftarLowongan->ijazah = $request->ijazah;
                $daftarLowongan->dokumen_pendukung = $filename; 
            } 
            $daftarLowongan->keterangan_lainnya = $request->keterangan_lainnya;
            $daftarLowongan->save(); 

        }
    }

    public function kelolalowongan($id){ 
        $data['getRecord'] = DaftarLowongan::getRecordById($id);
        // dd($data['getRecord']);
        $data['title'] = 'Dashboard kelola pelamar';
        return view('mitra.pelamar.kelola', $data);
  
    }
    public function kelolapelamar($id){ 
        $data['getRecord'] = DaftarLowongan::getSingle($id);
        // dd($data['getRecord']);
        $data['title'] = 'Dashboard kelola pelamar';
        return view('mitra.pelamar.edit', $data);
  
    }

    public function kelolapelamarupdate($id, Request $request){ 
        $user = DaftarLowongan::getSingle($id); 
        $user->is_aktif = $request->is_aktif; 
        $user->save();
        
        return redirect('/mitra/kelola_lowongan')->with('sukses', 'Anda berhasil mengedit pelamar');
    }
} 