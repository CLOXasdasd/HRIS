<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture photo with javascript | Genelify</title>
    <style>
        #video {
          box-shadow: 2px 2px 3px black;
          width: 320px;
          height: 240px;
        }
  
        #photo {
          box-shadow: 2px 2px 3px black;
          width: 320px;
          height: 240px;
        }
  
        #canvas {
          display: none;
        }
  
        .camera {
          width: 340px;
          display: inline-block;
        }
  
        .output {
          width: 340px;
          display: inline-block;
          vertical-align: top;
        }
  
        #startbutton {
          display: block;
          position: relative;
          margin: 0 auto;
          bottom: 32px;
          background-color: rgba(0, 150, 0, 0.5);
          box-shadow: 0px 0px 1px 2px rgba(0, 0, 0, 0.2);
          font-size: 14px;
          color: rgba(255, 255, 255, 1);
        }
  
        .content-area {
          font-size: 16px;
          width: 760px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="camera">
          <video id="video">Stream not available.</video>
          <button id="capture">Take photo</button>
        </div>
        <canvas id="canvas"></canvas>
        <div class="output">
          <img id="photo"/>
        </div>
    </div>
    <script>
        const width = 640; 
        let height = 0;
        let video = document.getElementById("video");
        let canvas = document.getElementById("canvas");
        let photo = document.getElementById("photo");
        let capture = document.getElementById("capture");

        navigator.mediaDevices.getUserMedia({ video: true, audio: false }).then((stream) => {
            video.srcObject = stream;
            video.play();
        })
        .catch((err) => {
            alert(err);
        });

        navigator.mediaDevices.getUserMedia({ video : { FacingMode: { exact: "environment" } }, audio: false });

        video.addEventListener("canplay", function () { height = video.videoHeight / (video.videoWidth / width); if (isNaN(height)) { height = width / (4 / 3); } video.setAttribute("width", width); video.setAttribute("height", height); canvas.setAttribute("width", width); canvas.setAttribute("height", height); }, false);

        capture.addEventListener("click", function (event) {
            event.preventDefault();
            const context = canvas.getContext("2d");

            if (width && height)
            {
                video.pause();
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);

                const data = canvas.toDataURL("image/png");
                photo.setAttribute("src", data);
            }

            video.play();

        }, false);
    </script>
</body>
</html>