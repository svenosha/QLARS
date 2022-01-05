<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Book;
use App\Models\qrbooks;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view ('registerBook', ['book' => $book]);
    }

    public function store(Request $request){
        
        $book = new Book;
        $book->TbSubj = $request->TbSubj;
        $book->TbISBN = $request->TbISBN;
        $book->TbPublisher = $request->TbPublisher;
        $book->TbForm = $request->TbForm;
        $book->save();
        return back();
    }
    public function generate ($id)
    {
        $book = Book::findOrFail($id);
        /* $qrcode = QrCode::size(400)->generate($book->TbSubj);
        return view('qrcode',compact('qrcode'));
        $output_file = '../../resources/img/qr-code/img-' . $id . '.png';
        Storage::disk('local')->put($output_file, $qrcode); //storage/app/public/img/qr-code/img-1557309130.png */
    
        $qrcode = QrCode::size(200)
        ->generate($book->id);
        $saveqr = $book->id;
        $qr=new qrbooks;
        $qr->QRCode=$qrcode;
        $qr->id=$saveqr;
        $qr->save();

        $book = Book::all();

        return view('qrcode',compact('qrcode'));
        //$output_file = '..app/public/img/qr-code/img-' . $id . '.png';
        //Storage::disk('local')->put($output_file, $qrcode); //storage/app/public/img/qr-code/img-1557309130.png
    }

}
