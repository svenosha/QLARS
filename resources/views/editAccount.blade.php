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
      <div>
    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Class</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($students as $row)
                     <tr>
                        <td>{{ $row->StdName }}</td>
                        <td>{{ $row->StdID }}</td>
                        <td>{{ $row->StdClass }}</td>
                        <td>{{ $row->StdEmail }}</td>
                        <td>{{ $row->StdPhone }}</td>
                        <td><a href= 'editStd/{{ $row->StdID}}' class="btn btn-primary">Update</a></td>
                        <td><a href='deleteStd/{{ $row->StdID}}' class="btn btn-primary">Delete</a></td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
          </div>
    </body>
</html>