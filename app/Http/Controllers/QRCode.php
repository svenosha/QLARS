<?php

namespace App\Http\Controllers;
use App\Models\qrbooks;
use App\Models\Book;
use DB;

use Illuminate\Http\Request;

class QRCode extends Controller
{
    public function retrieve(Request $request)

    {
        $qrcode->id = $request->id;
        $tbook = DB::select('select * from books where ');
        return view('viewTextBooks', ['tbooks'=>$tbook]);
    }
}
