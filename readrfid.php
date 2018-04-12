 <!DOCTYPE html>
<html>
  <head>
  </head>
  <body>

     <p>
    <button onclick="startWebcam();">Start WebCam</button>
    <button onclick="stopWebcam();">Stop WebCam</button> 
       <button onclick="snapshot();">Take Snapshot</button> 
    </p>
    <video onclick="snapshot(this);" width=400 height=400 id="video" controls autoplay></video>
  <p>

        Screenshots : <p>
      <canvas  id="myCanvas" width="400" height="350"></canvas>  
        <form action="insert.php" method="POST">
  	Enter your name:<input type="text" name="name" id="name"><br>
  	Purpose of visit:<input type="text" name="purpose" id="purpose"><br>
  	<input type = 'text' id = "test" name="test"><br>
  	<input type="submit" name="submit">
  </form>
  </body>
  <script>
      //--------------------
      // GET USER MEDIA CODE
      //--------------------
          navigator.getUserMedia = ( navigator.getUserMedia ||
                             navigator.webkitGetUserMedia ||
                             navigator.mozGetUserMedia ||
                             navigator.msGetUserMedia);

      var video;
      var webcamStream;

      function startWebcam() {
        if (navigator.getUserMedia) {
           navigator.getUserMedia (

              // constraints
              {
                 video: true,
                 audio: false
              },

              // successCallback
              function(localMediaStream) {
                  video = document.querySelector('video');
                 video.src = window.URL.createObjectURL(localMediaStream);
                 webcamStream = localMediaStream;
              },

              // errorCallback
              function(err) {
                 console.log("The following error occured: " + err);
              }
           );
        } else {
           console.log("getUserMedia not supported");
        }  
      }

      function stopWebcam() {
          webcamStream.stop();
      }
      //---------------------
      // TAKE A SNAPSHOT CODE
      //---------------------
      var canvas, ctx;

        canvas = document.getElementById("myCanvas");
        ctx = canvas.getContext('2d');


      function snapshot() {
         // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0,0, canvas.width, canvas.height);
              // set canvasImg image src to dataURL
              // set canvasImg image src to dat
			 var dataURL = canvas.toDataURL('image/png');
			 document.getElementById('test').value=dataURL;
               document.getElementById('canvasImg').src = dataURL;
      }

  </script>
 
</html>