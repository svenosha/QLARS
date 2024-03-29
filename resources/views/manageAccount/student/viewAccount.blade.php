@extends('layouts.sapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Account Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Class</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($students as $row)
                     <tr>
                        <td>{{ $row->StdName }}</td>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->StdClass }}</td>
                        <td>{{ $row->StdEmail }}</td>
                        <td>{{ $row->StdPhone }}</td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>

                </div>

            
            </div>
        </div>
    </div>
</div>
@endsection