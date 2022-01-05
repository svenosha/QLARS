<?php

namespace App\Http\Controllers;
use App\Models\qrbooks;
use App\Models\Book;
use DB;

use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function lend(Request $request){
        
        $TBookID=$request->TBookID;
        $StdID=$request->StdID;
        $update = DB::table('books')
                ->where('id', $TBookID)
                ->update(['StdID'=> $StdID,'TBStatus'=>'Lend']);
                return redirect()->back()->withInput();
    }
}
