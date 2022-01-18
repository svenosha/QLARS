@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Account') }}</div>

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
                            <img src="../img/student.jpg" alt="Register New Students" style="width:100px;height:100px;">
                            <br>
                            <a href="{{ url('/registerStud') }}" type ="button">Register New Students</a>
            
                        </div>
                    </div>
                </div>
                </td>
                <td style="border:1px solid white; padding:30px;"><center> 
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img src="../img/viewstud.jpg" alt="View Students" style="width:100px;height:100px;">
                            <br>
                        
                            <a href="{{ url('/viewStudents') }}" type ="button">View Students</a>
                        
                        </div>
                    </div>
                </div>
                </td>
                <td style="border:1px solid white; padding:30px;"><center> 
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img src="../img/editacc.jpg" alt="Edit Students" style="width:100px;height:100px;">
                            <br>
                        
                            <a href="{{ url('/editAccount') }}" type ="button">Edit Students</a>
                        
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