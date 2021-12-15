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
                        <th scope="col">Subject</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Form</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Code</th>
                        <th scope="col">QR Code</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($tbooks as $row)
                     <tr>
                        <td>{{ $row->TbSubj }}</td>
                        <td>{{ $row->TbISBN }}</td>
                        <td>{{ $row->TbForm }}</td>
                        <td>{{ $row->TbPublisher }}</td>
                        <td>{{ $row->TbCode }}</td>
                        <td></td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
          </div>
    </body>
</html>
