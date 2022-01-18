@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View UnPaid Fine For Textbook Borrowed') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="std_table" class="table">
                    <thead>
                      <tr>
                        
                        <th scope="col">Subject</th>
                        <th scope="col">Form</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Price</th>
                        <th scope="col">Fine</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($fine as $row)
                     <tr>
                        <td>{{ $row->TbSubj }}</td>
                        <td>{{ $row->TbForm }}</td>
                        <td>{{ $row->TbCon }}</td>
                        <td>{{ $row->TbPrice }}</td>
                        <td>{{ $row->TbFine}}</td>
                        <td><a href='/finepaid/{{ $row->id}}' class="btn btn-primary">Done</a></td>
                        </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#std_table').DataTable();
} );
 </script>
@endsection