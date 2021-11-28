<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use DB;

class registerStud extends Controller
{
    public function insertform(){
        $stud = Students::all();
        return view ('registerStud', ['stud' => $stud]);
    }
    public function insert(Request $request){
        $StdName = $request->input('StdName');
        $StdPhone = $request->input('StdPhone');
        $StdPassword = $request->input('StdPassword');
        $StdClass = $request->input('StdClass');
        $StdEmail = $request->input('StdEmail');
        $stud=array('StdName'=>$StdName,'StdPhone'=>$StdPhone,'StdPassword'=>$StdPassword,'StdClass'=>$StdEmail,'StdEmail'=>$StdEmail);
        DB::table('students')->insert($stud);
        echo "Record Succesfully Inserted<br/>";
        echo '<a href = "/insert"> Click Here</a> to go back';
    }
    
}
