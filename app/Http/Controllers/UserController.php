<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $data['getRecord'] = User::getRecordUser();
        // dd($data['getRecord']);
        $data['title'] = 'Dashboard kelola user';
        return view('admin.user.index', $data);
    }
    public function tambahuser(){
        $data['title'] = 'Dashboard kelola user';
        return view('admin.user.tambah', $data);
    }
    public function tambahuseraction(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'is_aktif' => 'required',
        ]); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 

        $user = new User; 
        $user->nama = $request->nama; 
        $user->username = $request->username; 
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->tanggal_lahir = $request->tanggal_lahir; 
        $user->no_hp = $request->no_hp; 
        $user->is_aktif = $request->is_aktif; 
        $user->save();  
 

        if($user){
            return redirect('/admin/kelola_user')->with('sukses', 'Anda berhasil menambah user');
        }else{
            return redirect('/admin/kelola_user/tambah')->with('gagal', 'Anda gagal menambah user');
        }
 
        // return view('admin.user.tambah', $data);
    }
    public function edituser($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['title'] = "Edit user";
            return view('admin.user.edit', $data);
        }else{
            abort(404);
        }

    }
    public function updateuser($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->nama = $request->nama; 
        $user->username = $request->username; 
        $user->email = $request->email;  
        $user->tanggal_lahir = $request->tanggal_lahir; 
        $user->no_hp = $request->no_hp; 
        $user->is_aktif = $request->is_aktif; 
        $user->save();
        
        return redirect('/admin/kelola_user')->with('sukses', 'Anda berhasil mengedit user');
    }

    public function deleteuser($id){
        $user = User::getSingle($id);
        $user->delete();
        if($user){
            return redirect('/admin/kelola_user')->with('sukses', 'Anda berhasil menghapus user');
        }else{
            return redirect('/admin/kelola_user')->with('gagal', 'Anda gagal menghapus user');
        }
    }
}
