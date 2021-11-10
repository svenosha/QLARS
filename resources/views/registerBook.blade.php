<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <form class="form-inline" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbSubj" placeholder="Insert Subject">
                    </div>
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbName" placeholder="Insert Name">
                    </div>
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="TbPublisher" placeholder="Insert Publisher">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="TbYear" placeholder="Insert Year">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="TbCode" placeholder="Insert Code">
                      </div>
                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                  </form>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Name</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Year</th>
                        <th scope="col">Code</th>
                        <th scope="col">QR code</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($book as $book)
                     <tr>
                        <td>{{ $book->TbSubj }}</td>
                        <td>{{ $book->TbName }}</td>
                        <td>{{ $book->TbPublisher }}</td>
                        <td>{{ $book->TbYear }}</td>
                        <td>{{ $book->TbCode }}</td>
                        <td>
                            <a href="{{ route('generate',$book->id) }}" class="btn btn-primary">Generate</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>