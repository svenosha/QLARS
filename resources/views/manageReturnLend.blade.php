@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Return and Lending') }}</div>

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
                            <img src="../img/textbooks.jpg" alt="Lend" style="width:100px;height:100px;">
                            <br>
                            <a href="{{ url('/lendscan') }}" type ="button">Lend</a>
            
                        </div>
                    </div>
                </div>
                </td>
                <td style="border:1px solid white; padding:30px;"><center> 
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img src="../img/textbooks.jpg" alt="Return" style="width:100px;height:100px;">
                            <br>
                        
                            <a href="{{ url('/returnscan') }}" type ="button">Return</a>
                        
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