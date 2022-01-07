
@extends('layouts.sapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Succesful') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form class="form-inline" action="{{ route('updateFine') }}" method="POST">
                    <button type="submit" class="btn btn-sm btn-info">  Done</button>

                    </form>
                          
                    
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection

