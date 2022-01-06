<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qrbooks;
use App\Models\Book;
use DB;

class manageReturnLendController extends Controller
{
    public function lend(Request $request){
        
        $TBookID=$request->TBookID;
        $StdID=$request->StdID;
        $update = DB::table('books')
                ->where('id', $TBookID)
                ->update(['StdID'=> $StdID,'TBStatus'=>'Lend']);
                return redirect()->back()->withInput();
    }

    public function return(Request $request){
        
        $TBookID=$request->TBookID;
        $StdID=$request->StdID;
        $update = DB::table('books')
                ->where('id', $TBookID)
                ->update(['StdID'=> '0','TBStatus'=>'Return']);
                return redirect()->back()->withInput();
    }
}
