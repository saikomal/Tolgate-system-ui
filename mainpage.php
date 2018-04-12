<!DOCTYPE html>
<html>
<head>

	   <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Registration</title>
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
    <style type="text/css">
        div.div_class_name { /* this will hide div with class div_class_name */
            display: none;
        }

        .box {
            display: none;
        }

        label {
            margin-right: 15px;
        }

        ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('p').hide();
            $('input[type="radio"][name="category"]').click(function () {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
        $(function () {
            $("#nav-placeholder").load("header.php");
        });
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
body{
	background-repeat:no-repeat;

   background-size:cover;
}
</style>
</head>
<body onload="fun()">

<h1 align="center">SMART GATEWAY</h1>

<div class="row">
  <div class="column" >

    <button onclick="startWebcam();">Start WebCam</button>
    <button onclick="stopWebcam();">Stop WebCam</button> 
       <button onclick="snapshot();">Take Snapshot</button> 
    <video onclick="snapshot(this);" width=400 height=400 id="video" controls autoplay></video>
  <p>

        Screenshots : <p>
      <canvas  id="myCanvas" width="400" height="350"></canvas>  
        <form action="insert.php" method="POST">
        	<input type="hidden" id="rfid1" name="rfid1"><br>
    Enter your name:<input type="text" name="name" id="name"><br>
    Purpose of visit:<input type="text" name="purpose" id="purpose"><br>
    <input type = 'hidden' id = "test" name="test"><br>
    <input type="submit" name="submit">
  </form>
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
  </div>
  <div class="column" >
    
<div id="nav-placeholder"></div>
<br/>
<div align="center" style="margin-left:10%;margin-top:20px">
    <div class="col-lg-5">

    </div>
    <input type="hidden" id="scan" class="btn btn-default" onclick="fun()" value="Scan" >

</div>
<div id="screen" class="div_class_name"></div>
<div id="screen1" class="div_class_name"></div>
<div id="temp" class="div_class_name"></div>
<div id="temp1" class="div_class_name"></div>
<div id="temp" class="div_class_name"></div>
<div id="temp1" class="div_class_name"></div>
<script>
    function fun() {
        var timer = 0;
        $("#temp").load('index21.php');
        var myTimer = setInterval(function () {
                document.getElementById("scan").className = "btn btn-warning";
                var initcount = document.getElementById("temp").innerHTML;
                $("#screen").load('index22.php');
                var countstr = document.getElementById('screen').innerHTML;
                var newcount = countstr.split("_")[1];
                if (newcount > initcount) {
                    var x = countstr.split('_')[3];
                    var im = countstr.split('_')[5];
                    var name = countstr.split('_')[7];
                    if(x == 1){
                    document.getElementById('rfid').innerHTML = "Authorised User";
                    document.getElementById("myImg").src = "435.gif";
                    document.getElementById("scan").className = "btn btn-default";
                    document.getElementById("image").src = im;
                    document.getElementById("nameofuser").innerHTML = name;
                } 
                    else{
                     location.reload();  
                    }
                    clearInterval(myTimer);
                }
            },
            1000);

        $("#temp1").load('index31.php');
        var myTimer1 = setInterval(function () {
                document.getElementById("scan").className = "btn btn-warning";
                var initcount = document.getElementById("temp1").innerHTML;
                $("#screen1").load('index32.php');
                var countstr = document.getElementById('screen1').innerHTML;
                var newcount = countstr.split(",")[1];
                if (newcount > initcount) {
                    // alert(countstr.split(",")[3]);

                  var x  = countstr.split(',')[3];
                  
                  if(x==0){location.reload();}
                    document.getElementById("scan").className = "btn btn-default";
                    clearInterval(myTimer);
                }
            },
            1000);
    }
</script>

<div align="center">
    <form class="form-horizontal" style="width: 80%" action='register.php' method='POST' enctype="multipart/form-data">
            <div><span class='error'></span></div>
            <div class="form-group">
                <div class="col-lg-8">
                    <h1 name='rfid' id='rfid'>Tap Your Smart Card </h1>
                </div>
            </div>
    </form>
    <img id ="myImg" src="3740.gif" style="max-width: 100%;max-height: 100%;">
</div>

  </div>
  <div class="column" >
    <img src="person-icon.png" id = 'image' > 
    <br>
    <br>
    <div>Name:--<div id = 'nameofuser'></div></div>
  </div>
</div>

</body>
</html>