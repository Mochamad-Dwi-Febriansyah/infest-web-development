<?php

namespace App\Http\Controllers;

use App\Models\DaftarLowongan;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\DokumenUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    public function index(){
        $data['getLowongan'] = Lowongan::getRecordIsAktif();
        $data['title'] = 'Job Seekers';
        $data['getTopJobs'] = DaftarLowongan::getCount();
        // dd($data);
        // if(!empty($data['getTopJobs'][0])){
        //     $data['getTopJobs'] = $data['getTopJobs'][0];
        // }
        return view('user.dashboard', $data);
    }

    public function profile(){
        $id = Auth::user()->id;
        $dokumen = DokumenUser::getSingle($id); 
        if(!empty($dokumen)){
            $data['getDokumen'] = $dokumen;
        }
        $data['title'] = 'Job Seekers'; 
        return view('user.profile', $data);
    }

    public function updateprofile(Request $request){
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->nama = trim($request->nama); 
        $user->username = trim($request->username); 
        $user->email = trim($request->email);
        $user->tanggal_lahir = trim($request->tanggal_lahir); 
        $user->no_hp = trim($request->no_hp); 
        $user->alamat = trim($request->alamat); 
        $user->rt = trim($request->rt); 
        $user->rw = trim($request->rw); 
        $user->kota = trim($request->kota); 
        $user->provinsi = trim($request->provinsi); 
        $user->save();
        
        return redirect('/profile')->with('sukses', 'Anda berhasil memperbaharui profil');
    }

    public function updateperlengkapanberkas(Request $request){
        $id = Auth::user()->id;
        $dokumen = DokumenUser::getSingle($id); 
    
        $userDirectory = 'upload/dokumen/' . Auth::user()->nama . '/';
    
        // Check if the directory exists, if not create it
        if (!File::exists(public_path($userDirectory))) {
            File::makeDirectory(public_path($userDirectory), 0775, true);
        }
    
        if(!empty($dokumen)){
            // Handle file uploads
            $this->handleFileUpload($request, 'ktp', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'cv', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'ijazah', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'dokumen_pendukung', $userDirectory, $dokumen);
            $dokumen->save();
        } else {
            // Logic for creating a new document if it doesn't exist
            $dokumen = new DokumenUser();
            $dokumen->user_id = $id;
    
            // Handle file uploads
            $this->handleFileUpload($request, 'ktp', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'cv', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'ijazah', $userDirectory, $dokumen);
            $this->handleFileUpload($request, 'dokumen_pendukung', $userDirectory, $dokumen);
            $dokumen->save();
        }
        
        return redirect()->back()->with('sukses', 'Dokumen berhasil diupdated');
    }
    
    private function handleFileUpload($request, $fileKey, $userDirectory, $dokumen) {
        if ($request->hasFile($fileKey)) {
            $ext = $request->file($fileKey)->getClientOriginalExtension();
            $file = $request->file($fileKey);
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            
            // Move new file to directory
            $file->move(public_path($userDirectory), $filename);
    
            // Check if there's an existing file for this attribute
            if (!empty($dokumen->$fileKey)) {
                // Delete the existing file
                File::delete(public_path($userDirectory . $dokumen->$fileKey));
            }
    
            // Update the attribute with the new filename
            $dokumen->$fileKey = $filename;
        }
    }

    public function updatepassword(Request $request){
        $id = Auth::user()->id; 
        $user = User::getSingle($id); 
        if (!Hash::check($request->password_lama, Auth::user()->password)) { 
            return redirect()->back()->with('gagal', 'Password lama tidak sesuai.');
        }

        // Update password 
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('sukses', 'Password berhasil diubah.');
    }

    

}
