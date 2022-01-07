<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Book;
use App\Models\User;
use App\Models\qrbooks;
use App\Models\Students;
use App\Models\Fine;
use DB;
use Illuminate\Support\Facades\Auth;

class manageTextbookController extends Controller
{
    public function index(){
        $book = DB::select('select * from books order by id desc');
        return view ('registerBook', ['book' => $book]);
    }

    public function store(Request $request){
        $quantity=$request->quantity;
        for($x =0; $x<$quantity;$x++){
        $book = new Book;
        $book->TbPrice = $request->TbPrice;
        $book->TbSubj = $request->TbSubj;
        $book->TbISBN = $request->TbISBN;
        $book->TbPublisher = $request->TbPublisher;
        $book->TbForm = $request->TbForm;
        $book->save();
        }
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

    public function index1()
     {
         $tbooks = DB::select('select books.*, qrbooks.* from books join qrbooks on books.id = qrbooks.id');
         return view('viewTextBooksQR', ['tbooks'=>$tbooks]);
     }

     public function index2(){
        $tbooks = DB::select('select * from books');
        return view ('textbookStatus', ['tbooks' => $tbooks]);
    }

    public function viewStudFine()
    {
        $students = DB::select('select * from students');
        return view('viewStudFine', ['students'=>$students]);
    }

    public function viewFines($id)

    {
        $fine = DB::select('select fines.*, books.* from fines join books on fines.TbID = books.id where fines.StdID =? and fines.TbFine=?',[$id,'Not Paid']);
        return view('viewFine', ['fine'=>$fine]);
    }

    //Students

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stdlend()

    {
        $id= Auth::id();
        $tbooks = DB::select('select * from books where StdID =?',[$id]);
        return view('studTBStatus',['tbooks'=>$tbooks]);

    }
    
    public function viewFine()
    {
        $id= Auth::id();
        $fine = DB::select('select fines.*, books.* from fines join books on fines.TbID = books.id where fines.StdID =? and fines.TbFine=?',[$id,'Not Paid']);
        return view('viewFine', ['fine'=>$fine]);
    }

}
