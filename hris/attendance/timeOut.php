<?php
    
$emp_id = base64_decode($_GET['id']);
    require_once 'codes/function.php';  
    $fetchdata=new admin_creation();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Texwipe Supplies</title>

    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="saves/css/main.css" rel="stylesheet" media="all">
</head>
<style type="text/css">
    .pullright{
        margin-left: 300px;
    }
</style>

<body>
      <!-- <div id="containerexample" class="m-5"> -->
    <div class="page-wrapper bg-blue ">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
             
                <div class="card-body">

                    <div class="form-row" >
                        <h3>Status Message</h3>
                        <input name="body_temp" class="input--style-6" id="emp_id" class="form-control" placeholder="Answer" value = "<?php echo $emp_id; ?>" hidden>
                        <input name="body_temp" class="input--style-6" id="status" class="form-control" placeholder="Answer" value = "1" hidden>
                    </div>

                    <div class="form-row" >
                        <h4><label for="cars">Choose a Status:</label></h4>
                        <select id="assessment" class="input--style-6"  class="form-control" style="width: 100%; height: 50px">
                            <option value="Back Tomorrow / Next Week">Back Tomorrow / Next Week</option>
                            <option value="OB - Official Business">OB - Official Business</option>
                            <option value="Undertime">Undertime</option>
                            <option value="No Overtime">No Overtime</option>
                        </select>
                    </div>

                    <div class="form-row pullright">
                        <button class="btn btn--radius-2 btn--blue-2 " id="send_Request" type="submit">Submit</button>
                        <button class="btn btn--radius-2 btn--blue-2" type="submit" onclick="backRequest()" style="background-color:red ;">Back</button>
                    </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
  <div id="loadercontainer">
  <div class="d-flex justify-content-center text-secondary" id="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div> 

    <script src="dist/notify/notify.js"></script>


</body>
</html>
    <div class="modal fade" id="removeDepartment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h2> Are you sure ?</h2>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnDepartmentRemove">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

<script>

    
    $(document).on('click','#btnDepartmentRemove',function(){
  

        var emp_id=$.trim(encodeURI($("#emp_id").val()));
        var status=$.trim(encodeURI($("#status").val()));
        var assessment=$.trim(encodeURI($("#assessment").val()));


        var pick = '4';

        var fd = new FormData();    
        fd.append('emp_id', emp_id);
        fd.append('status', status);
        fd.append('assessment', assessment);
        fd.append('pick', pick);
        
        $.ajax({
            url: "codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
            //    alert(result);                
                if($.trim(result)=='1'){
                    $.notify("Request Done!","success");  
                    setTimeout(function() {   window.location.href = "test-index.php"; }, 2000);     
                } else {
                    $.notify("Field Found Empty ","error");    
                    $("#btnDepartmentRemove").attr("disabled", false); 
                }                       
            }
        });

    });

    $(document).on('click','#send_Request',function(){
        $("#removeDepartment").modal("show");
    });

    function backRequest(){
         location.href = "test-index.php "; 
    }
</script>