<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\User;
use DB;

class manageAccountController extends Controller
{
    public function insertform(){
        $stud = Students::all();
        return view ('registerStud', ['stud' => $stud]);
    }
    public function insert(Request $request){
        $StdName = $request->input('name');
        $StdPhone = $request->input('phone');
        $StdID = $request->input('id');
        $StdPassword = $request->input('password');
        $StdClass = $request->input('class');
        $StdEmail = $request->input('email');
        $stud=array('StdName'=>$StdName,'StdID'=>$StdID,'StdPhone'=>$StdPhone,'StdPassword'=>$StdPassword,'StdClass'=>$StdClass,'StdEmail'=>$StdEmail);
        $stud1=array('name'=>$StdName,'password'=>$StdPassword,'email'=>$StdEmail);
        DB::table('users')->insert($stud1);
        DB::table('students')->insert($stud);
        echo "Record Succesfully Inserted<br/>";
        echo '<a href = "/insert"> Click Here</a> to go back';
    }

    public function index()
    {
        $students = DB::select('select * from students');
        return view('viewStudents', ['students'=>$students]);
    }

    public function edit()
    {
        $students = DB::select('select * from students');
        return view('editAccount', ['students'=>$students]);
    }

    public function editStd($StdID)

    {
        $students = DB::select('select* from students where StdID =?',[$StdID]);
        return view('editStd',['students'=>$students]);
    }

    public function updateStd(Request $request, $StdID)

    {
        $StdName = $request->input('name');
        $StdPhone = $request->input('phone');
        $StdID = $request->input('id');
        $StdPassword = $request->input('password');
        $StdClass = $request->input('class');
        $StdEmail = $request->input('email');
        DB::update('update students set StdName =?,StdPhone =?, StdEmail =?, StdPassword =?, StdClass =? where StdID =?',[$StdName,$StdPhone,$StdEmail,$StdPassword,$StdClass,$StdID]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/editAccount">Click Here</a> to go back.';
    }

    public function deleteStd($StdID) {
        DB::delete('delete from studentS where StdID = ?',[$StdID]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/editAccount">Click Here</a> to go back.';
     }
 
}
