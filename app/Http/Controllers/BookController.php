<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view ('registerBook', ['book' => $book]);
    }
    public function store(Request $request){
        $book = new Book;
        $book->name = $request->name;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->save();
        return back();
    }
    public function generate ($id)
    {
        $book = Book::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($book->name);
        return view('qrcode',compact('qrcode'));
    }
}
