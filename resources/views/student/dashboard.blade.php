@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello STUDENT, You are logged in!') }}

                    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
            <a href="{{ url('/manageAccount') }}" type ="button">Manage Account</a>
            
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
            <a href="{{ url('/manageTextbook') }}" type ="button">Manage Textbook</a>
            
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
            <a href="{{ url('/manageReturnLend') }}" type ="button">Manage Return and Lending</a>
            
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection