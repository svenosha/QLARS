<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\qrbooks;
use App\Models\Students;
use App\Models\Fine;
use DB;
use Illuminate\Support\Facades\Auth;

class managePaymentController extends Controller
{
    //Student

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function viewFine()
    {
        $id= Auth::id();
        $fine = DB::select('select fines.*, books.* from fines join books on fines.TbID = books.id where fines.StdID =? and fines.TbFine=?',[$id,'Not Paid']);
        return view('payFine', ['fine'=>$fine]);
    }

     public function updateFine(Request $request)
    {
        $id= Auth::id();
        $id=$request->id;
        $update = DB::table('fines')
                    ->where('StdID', $id)
                    ->update(['TbFine'=> 'Paid']);
                    return redirect()->back();

    } 
}

