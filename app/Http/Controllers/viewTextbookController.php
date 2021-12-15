<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Textbook;
use DB;

class viewTextbookController extends Controller
{
    public function index()
    {
        $tbook = DB::select('select * from books');
        return view('viewTextBooks', ['tbooks'=>$tbook]);
    }
}