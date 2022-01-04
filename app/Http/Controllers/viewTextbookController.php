<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Textbook;
use DB;

class viewTextbookController extends Controller
{
    public function index()
    {
        $tbook = DB::select('select books.*, qrbooks.* from books join qrbooks on books.id = qrbooks.id');
        return view('viewTextBooks', ['tbooks'=>$tbook]);
    }

    public function returned(Request $request,$id){
        $tbook =DB::update('update books set TbStatus = returned',[$TbStatus]);
        echo "Record updated succesfully.<br/>";
    }

    /* public function retrieve()
    {
        $tbook = DB::select('select * from books');
        return view('viewTextBooks', ['tbooks'=>$tbook]);
    } */
}