<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenUser extends Model
{
    use HasFactory;
    protected $table = 'dokumen_users';
    static public function getSingle($id){
        $return = self::select('dokumen_users.*')->where('dokumen_users.user_id', '=', $id)->first();
        return $return;
    }
}
