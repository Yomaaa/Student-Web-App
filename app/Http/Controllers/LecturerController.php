<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function index(){
        $student = DB::table('users')
        ->count()
        ;
        return view('dashboard', ['student' => $student]);
    }
}
