

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Textbook Status') }}</div>

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
                        <th scope="col">Code</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Form</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($tbooks as $row)
                     <tr>
                        <td>{{ $row->TbSubj }}</td>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->TbISBN }}</td>
                        <td>{{ $row->TbForm }}</td>
                        <td>{{ $row->TbPublisher }}</td>
                        <td>{{ $row->TbPrice }}</td>
                        <td>{{ $row->TbStatus}}</td>
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

