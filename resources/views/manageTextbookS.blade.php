@extends('layouts.sapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Textbook') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table style=" width:100%;">
            <tr>
                <td style="border:1px solid white; padding:30px;"><center> 
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img src="../img/tbstatus.jpg" alt="Textbook Status" style="width:100px;height:100px;">
                            <br>
                        
                            <a href="{{ url('/studTBStatus') }}" type ="button">View Status of Textbook Borrowed</a>
                        
                        </div>
                    </div>
                </div>
                </td>

                <td style="border:1px solid white; padding:30px;"><center> 
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img src="../img/editacc.jpg" alt="Textbook Status" style="width:100px;height:100px;">
                            <br>
                        
                            <a href="{{ url('/viewFine') }}" type ="button">View Fine for Returned Books</a>
                        
                        </div>
                    </div>
                </div>
                </td>
            </tr>
            
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection