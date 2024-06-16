<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model implements AuthenticatableContract
{
    use Authenticatable;
     
    protected $table = 'mitras';
    static public function getSingle($id){
        $return = self::select('mitras.*')->where('mitras.id', '=', $id)->first();
        return $return;
    }
    static public function getSingleByUserId($id){
        $return = self::select('mitras.*')->where('mitras.user_create_on_mitra_id', '=', $id)->first();
        return $return;
    }
    static public function getRecord(){
        $return = self::select('mitras.*', 'users.nama as pembuat')
                    ->join('users', 'users.id', '=', 'mitras.user_create_on_mitra_id')    
                    ->paginate(20);
        return $return;
    }
}
