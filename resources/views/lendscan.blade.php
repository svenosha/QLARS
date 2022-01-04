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
        document.getElementById("id").value = content; // Pass the scanned content value to an input field
        
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
    
    <form class="form-inline" action="retrieve" method="POST">
      @csrf
      <div class="form-group mb-2">
        <input type="text" class="form-control" id='id' name='BookID' readonly="">
      </div>
    </form>

    <form action = "/lscan/<?php echo $students[0]->StdID; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <input type = 'submit' value = "Return" />
      </form>

      
   
</body>
</html>