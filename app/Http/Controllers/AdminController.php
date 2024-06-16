<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mitra;

class AdminController extends Controller
{
    public function index(){
        $data['countUser'] = User::count();
        $data['countMitra'] = Mitra::count(); 
        $data['title'] = 'Dashboard admin';
        return view('admin.dashboard', $data);
    }
}
