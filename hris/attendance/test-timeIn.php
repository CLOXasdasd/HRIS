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
                        <input name="body_temp" class="input--style-6" id="emp_id" class="form-control" placeholder="Answer" value = "<?php echo $emp_id; ?>" hidden/>
                        <input name="body_temp" class="input--style-6" id="dateToday" class="form-control" placeholder="Answer" value = "<?php echo date('y-m-d'); ?>" hidden/>
                    </div>

                    <?php
                        $sql=$fetchdata->selectAllQuestion();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <div class="form-row" >
                          
                                <label><p style="font-size: 15px;"><strong><?php echo htmlentities($row['description']); ?> </strong></p>  </label>
                                
                                <br>  <br> 
                                 <input type="checkbox" value="<?php echo $row['id'];?>" checked hidden>



                                <?php if($row['questionType'] == 'text') { ?>
                                    <input type="text" name="body_temp" class="input--style-6" id="answer<?php echo $row['id']; ?>" class="form-control" placeholder="Answer"/>
                                <?php } else { ?> 
                                    


                                    <input type="text" name="body_temp" class="input--style-6" id="answer<?php echo $row['id']; ?>" class="form-control" placeholder="Answer"/ list="dropdownAnswer">


                                    <datalist id="dropdownAnswer">

                                        <?php 
                                           $datainlist = explode(",", $row['options']);


                                           for($x = 0; $x < count( $datainlist); $x++){ ?>

                                      <option value="<?php echo $datainlist[$x]; ?>"></option>
                                        <?php } ?>
                                    

                                    </datalist>

                                <?php }  ?>              
                       
                        </div>
                    <?php } ?>
                    
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

                    do you want to time in?
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
        $("#btnDepartmentRemove").attr("disabled", true);  
        let arrCheckbox = [];
		let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

		checkboxes.forEach((item)=>{
		   arrCheckbox.push(item.value);
		}) 

        var textboxValues = [];
        var textInputs = document.querySelectorAll('input[type=text]');     

        textInputs.forEach(function(textInput) {
            textboxValues.push(textInput.value);
        });

        var emp_id=$.trim(encodeURI($("#emp_id").val()));
        var dateToday=$.trim(encodeURI($("#dateToday").val()));
        var checks = arrCheckbox;
        var text = textboxValues;
        var pick = '3';

        var fd = new FormData();    
        fd.append('emp_id', emp_id);
        fd.append('dateToday', dateToday);
        fd.append('pick', pick);
        fd.append('checks', checks);
        fd.append('text', text);
        
        $.ajax({
            url: "codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                
                if($.trim(result)=='10'){
                    $.notify("Field Found Empty ","error");    
                    $("#btnDepartmentRemove").attr("disabled", false);  
                } else {
                    $.notify("Request Done!","success");  
                    setTimeout(function() {   window.location.href = "test-index.php"; }, 1000);                       
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