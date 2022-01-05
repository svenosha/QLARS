<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use DB;

class viewStudentController extends Controller
{
    public function index()
    {
        $students = DB::select('select * from students');
        return view('viewStudents', ['students'=>$students]);
    }

    public function returns ($StdID)
    {
       return view('scanqrcode') ->with('StdID',$StdID);
                
    }

    public function lends ($StdID)
    {
       return view('lendscan') ->with('StdID',$StdID);
                
    }

    




}
