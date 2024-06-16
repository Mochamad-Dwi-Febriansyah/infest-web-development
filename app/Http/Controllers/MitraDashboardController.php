<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class MitraDashboardController extends Controller
{
    public function index(){
        $data['countLowongan'] = Lowongan::count();
        $data['title'] = 'Dashboard mitra';
        return view('mitra.dashboard', $data);
    }
}
