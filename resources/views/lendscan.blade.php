<!DOCTYPE html>
<html>
<head>
	<title>Scan QR Code</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  
    <h1>Lend TextBook Scan </h1>
    
    <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        document.getElementById("TBookID").value = content; // Pass the scanned content value to an input field
        
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
    
    <form class="form-inline" action="{{ route('lend') }}" method="POST">
      @csrf
      <div class="form-group mb-2">
        Textbook Code:<input type="text" class="form-control" id='TBookID' name='TBookID' readonly="">
        Student ID: <input type="text"  class="form-control" id="StdID" name="StdID" value="{{ old('StdID') }}" required>
        <button type="submit" class="btn btn-sm btn-info">Lend</button>
      </div>
    </form>


      
   
</body>
</html>