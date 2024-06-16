<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongans';
    static public function getSingle($id){
        $return = self::select('lowongans.*')->where('lowongans.id', '=', $id)->first();
        return $return;
    } 
    static public function getSingleByUserId($id){
        $return = self::select('lowongans.*')->where('lowongans.mitra_id', '=', $id)->first();
        return $return;
    }
    static public function getRecord(){
        $return = self::select('lowongans.*', 'mitras.nama as nama_mitra')
                    ->join('mitras', 'mitras.id', '=', 'lowongans.mitra_id')    
                    ->paginate(20);
        return $return;
    }
    static public function getRecordIsAktif(){
        $return = self::select('lowongans.*', 'mitras.nama as nama_mitra')
                    ->join('mitras', 'mitras.id', '=', 'lowongans.mitra_id');
                    if(Request::get('nama_lowongan')){
                        $return = $return->where('lowongans.nama_lowongan', 'like', '%'.Request::get('nama_lowongan').'%');
                    }
                    if(Request::get('level')){
                        $return = $return->where('lowongans.level_lowongan', 'like', '%'.Request::get('level').'%');
                    }
                    if(Request::get('tipe')){
                        $return = $return->where('lowongans.tipe_lowongan', 'like', '%'.Request::get('tipe').'%');
                    }
                    $return = $return->where('lowongans.is_aktif', '=', 1)  
                    ->paginate(20);
        return $return;
    }
}
