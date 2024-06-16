<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLowongan extends Model
{
    use HasFactory;
    protected $table = 'daftar_lowongans'; 
     static public function getSingleUser($user_id,$id){
        $return = self::select('daftar_lowongans.*', 'mitras.nama as mitrasnama','mitras.email as mitrasemail','mitras.no_hp as mitrasno_hp' )->where('daftar_lowongans.user_pelamar_id', '=', $user_id)->join('mitras', 'mitras.id', '=', 'daftar_lowongans.mitra_id')->where('daftar_lowongans.lowongan_id', '=', $id)->first();
        return $return;
    }
     static public function getSingle($id){
        $return = self::select('daftar_lowongans.*')->where('daftar_lowongans.id', '=', $id)->first();
        return $return;
    }

    static public function getCount(){
        // $return = self::select('daftar_lowongans.id', COUNT());
        return self::select('lowongan_id')
        ->selectRaw('COUNT(*) as total_applicants')
        ->groupBy('lowongan_id')
        ->get();
    }

    
    static public function getRecordById($id){
        $return = self::select('daftar_lowongans.*', 'users.nama as usernama', 'mitras.nama as mitranama' , 'lowongans.nama_lowongan as namalowongan')->where('daftar_lowongans.lowongan_id', '=', $id)
                        ->join('users', 'users.id', '=', 'daftar_lowongans.user_pelamar_id')    
                        ->join('mitras', 'mitras.id', '=', 'daftar_lowongans.mitra_id')   
                        ->join('lowongans', 'lowongans.id', '=', 'daftar_lowongans.lowongan_id')   
                        ->paginate(20);
        return $return;
    }
}
