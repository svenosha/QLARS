@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register New Textbook') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="container">
            
                <form class="form-inline" action="{{ route('store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbSubj" placeholder="Insert Subject">
                    </div>
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbISBN" placeholder="Insert ISBN">
                    </div>
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbPublisher" placeholder="Insert Publisher">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="TbForm" placeholder="Insert Form">
                      </div>
                      <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbPrice" placeholder="Insert Price">
                    </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="quantity" id='quantity' placeholder="Insert Quantity">
                      </div>
                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                  </form>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Form</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">QR Code</th>

                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($book as $row)
                     <tr>
                        <td>{{ $row->TbSubj }}</td>
                        <td>{{ $row->TbISBN }}</td>
                        <td>{{ $row->TbForm }}</td>
                        <td>{{ $row->TbPublisher }}</td>
                        <td>{{ $row->id}}</td>
                        <td>{{ $row->TbPrice}}</td>
                        <td>
                        <a href="{{ route('generate',$row->id) }}" class="btn btn-primary">Generate</a>
                        </td>
                      </tr>

                     @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    

            </div>
        </div>
    </div>
</div>
@endsection