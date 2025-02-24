
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="saves/css/main.css" rel="stylesheet" media="all">
</head>
<style type="text/css">
    .pullright{
        margin-left: 500px;
    }


          
  
</style>

<body onload="configure();">
    <div class="page-wrapper bg-blue p-t-50 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
             
                <div class="card-body">
                    <div class="form-row">
             
         
                    </div>

                    <div class="form-row">
                        <div class="name">Full name</div>
                        <input list="browsers" name="fullname" class="input--style-6" id="fullname" class="form-control" placeholder="Enter Full Name" />
                    </div>

                    <div class="form-row">
                        <div class="name">Company Name</div>                
                        <input list="descriptions" name="company" id="company" class="input--style-6" id="emp" class="form-control" placeholder="Enter Company Name" /></label>
                    </div>
                        
                    <div class="form-row">
                        <div class="name">Phone Number</div>
                        <input class="input--style-6" type="tel" name="tel" id="tel" placeholder="Enter Phone Number" pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}">
                    </div>

                    <div class="form-row">
                        <div class="name" >Email</div>
                        <input class="input--style-6" type="email" name="email" id="email" placeholder="Enter Email" >
                    </div>

                    <div class="form-row">
                        <div class="name">Purpose of Visit</div>
                        <input class="input--style-6" type="text" name="purpose" id="purpose" placeholder="Enter Purpose of Visit" >
                    </div>

                    <div class="form-row pullright">
                        <button class="btn btn--radius-2 btn--blue-2 mr-1" id="send_Request" type="submit" >Submit</button>
                        <button class="btn btn--radius-2 btn--blue-2 mr-1" id="back_Request" type="submit" style="background-color:red ;">Back</button>
                    </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
    <script src="dist/notify/notify.js"></script>
    <script src="./plugins/sweetalert/sweetalert.min.js"></script>
    <script src="./plugins/webcamjs/webcam.min.js"></script>


</body>

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Change</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        
                       <center> <video id="video" width="250" height="250" autoplay></video>
                        <button id="capture-btn">Capture</button>
                        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
                        </center>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitEdit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

</html>
<!-- end document-->

<!-- <script type="text/javascript" src="plugins/webcam.min.js"></script> -->


<script>
  
 
//   navigator.mediaDevices.getUserMedia({ video: true })
//             .then(stream => {
//                 let video = document.getElementById('video');
//                 video.srcObject = stream;
//             })
//             .catch(error => {
//                 console.error('Error accessing camera:', error);
//             });

//         document.getElementById('capture-btn').addEventListener('click', function() {
//             let video = document.getElementById('video');
//             let canvas = document.getElementById('canvas');
//             let context = canvas.getContext('2d');
//             context.drawImage(video, 0, 0, canvas.width, canvas.height);
//             let imageData = canvas.toDataURL('image/jpeg');

//             // You can now send imageData to your PHP script for further processing
//             // For example, you can send it using AJAX or by submitting a form.
//             // Here's an example using fetch API:
      
//             .then(response => {
//                 if (response.ok) {
//                     alert('Image captured and saved successfully!');
//                 } else {
//                     throw new Error('Failed to save image.');
//                 }
//             })
//             .catch(error => {
//                 console.error('Error saving image:', error);
//             });
//         });

        //end

    $(document).on('click','#dataSubmitEdit',function(){
               var fullname=$.trim(encodeURI($("#fullname").val()));
        var company=$.trim(encodeURI($("#company").val()));
        var tel=$.trim(encodeURI($("#tel").val()));
        var email=$.trim(encodeURI($("#email").val()));
        var purpose=$.trim(encodeURI($("#purpose").val()));
        var pick= "1";
        var fd = new FormData();

        if(fullname == "" || company == "" || tel == "" || email == "" || purpose == "" ){
            $.notify("Please fill out all fields ","error");
        } else {
    
            fd.append('fullname', fullname);
            fd.append('company',company);
            fd.append('tel', tel);
            fd.append('email',email);
            fd.append('purpose',purpose);            
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
                            $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                             $.notify("Request Sent ","success");
                            setTimeout(function() { location.href = "test-index.php ";  }, 1000);
                        }else{
                             $.notify("Please fill out all fields ","error");                              
                        }                       
                        return false;
                }
            });
        }
    });


    $(document).on('click','#send_Request',function(){
        $("#editModal").modal("show");
    });

    $(document).on('click','#back_Request',function(){
        location.href = "test-index.php "; 
    });

    // var id_edit="";
    // $(document).on('click','.edit_btn',function(){ 
    //     id_edit=$(this).attr("id");
    //     $("#editModal").modal("show");
    // });
</script>