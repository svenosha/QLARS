<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class manageAccountController extends Controller
{
    //view student registration form
    public function insertform(){
        $stud = Students::all();
        return view ('registerStud', ['stud' => $stud]);
    }
    public function insert(Request $request){
        $StdName = $request->input('name');
        $StdPhone = $request->input('phone');
        $StdPassword = Hash::make($request->input('password'));
        $StdClass = $request->input('class');
        $StdEmail = $request->input('email');
        $stud=array('StdName'=>$StdName,'StdPhone'=>$StdPhone,'StdPassword'=>$StdPassword,'StdClass'=>$StdClass,'StdEmail'=>$StdEmail);
        $stud1=array('name'=>$StdName,'password'=>$StdPassword,'email'=>$StdEmail);
        DB::table('users')->insert($stud1);
        DB::table('students')->insert($stud);
        DB::table('users')
            ->join('students', 'students.StdEmail', '=', 'users.email')
            ->where('email', $StdEmail)
            ->update(['users.id' => DB::raw('students.id')]);
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

    public function editStd($id)

    {
        $students = DB::select('select* from students where id =?',[$id]);
        return view('editStd',['students'=>$students]);
    }

    public function updateStd(Request $request, $id)

    {
        $StdName = $request->input('name');
        $StdPhone = $request->input('phone');
        $StdID = $request->input('id');
        $StdPassword = Hash::make($request->input('password'));
        $StdClass = $request->input('class');
        $StdEmail = $request->input('email');
        DB::update('update students set StdName =?,StdPhone =?, StdEmail =?, StdPassword =?, StdClass =? where id =?',[$StdName,$StdPhone,$StdEmail,$StdPassword,$StdClass,$StdID]);
        DB::update('update users set name =?, email =?, password =? where id =?',[$StdName,$StdEmail,$StdPassword,$StdID]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/editAccount">Click Here</a> to go back.';
    }

    public function deleteStd($id) {
        DB::delete('delete from students where id = ?',[$id]);
        DB::delete('delete from users where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/editAccount">Click Here</a> to go back.';
     }

     public function lendTB($id)

    {
        $students = DB::select('select * from books where StdID =?',[$id]);
        return view('lendTB',['students'=>$students]);

    }

    //Student

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAcc()
    {
        $id= Auth::id();
        $students = DB::select('select * from students where id =?',[$id]);
        return view('viewAccount', ['students'=>$students]);
    }

 
}
