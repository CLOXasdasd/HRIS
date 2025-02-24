<?php
    require_once 'pages/codes/function.php';  
 
        $fetchdata=new admin_creation();

?>
   
   <!DOCTYPE html>
<html lang="en">
<head>

    <link rel="icon" type="image/x-icon" href="dist/img/texwipe.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="index"><img src="dist/img/texwipe.png" style="width: 150px; height: 100px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Features</a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Pricing</a> -->
      </li>
    </ul>
    <span class="navbar-text">
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Check Employee Schedule
        </button> -->
    </span>
  </div>
</nav>
<br> 

    <body style="margin-left: 100px; margin-right: 100px;" >

        <table id="example" class="table table-striped table-bordered" style="width:100%; " >
            <thead>
                <tr>
                    <th style="text-align: center;">Employee ID</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    $sql=$fetchdata->fetch_employee_attendance();
                    while($row=mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td style="text-align: center; width: 150px;"><?php echo htmlentities($row['emp_id']);?></td>
                        <td style="text-align: center;"><?php echo htmlentities($row['firstname']);?></td>
                        <td style="text-align: center; width: 350px;">   
                            <?php if($fetchdata->check_emp_schedule($row['emp_id']) == '1' || $fetchdata->check_emp_schedule($row['emp_id']) == 1 ) { ?>

                                <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='boxes  btn-success btn-sm'  title='Edit Record'> Boxes </button>
                                <?php if($fetchdata->checkBreakNull($row['emp_id']) == '1'){ ?>
                                        <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='OnBreak  btn-light btn-sm'  title='Edit Record'>On Break </button>
                                    <?php } else {

                                        if($fetchdata->checkBreakOffNull($row['emp_id']) == '1'){?>
                                            <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='OffBreak  btn-light btn-sm'  title='Edit Record'>Off  Break </button>

                                                                                
                                    <?php }  else { ?>

                                         <?php if($fetchdata->checkBreakNull1($row['emp_id']) == '1'){ ?>
                                                <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='OnBreak1  btn-light btn-sm'  title='Edit Record'>2nd Break </button>
                                         <?php } else { 

                                        if($fetchdata->checkBreakOffNull1($row['emp_id']) == '1'){?>
                                                     <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='OffBreak1  btn-light btn-sm'  title='Edit Record'>2nd Off  Break </button>
                                        <?php } }  ?>
                                <?php }

                                } ?>

                                <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='TimeOut  btn-danger btn-sm'  title='Edit Record'>Logged Out </button>
                            <?php }else { ?>
                                <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='TimeIn  btn-primary btn-sm'  title='Edit Record'>Logged In </button>
                            <?php }?>         




                        </td>

                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: center;">Employee ID</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </tfoot>
        </table>

        <!-- Time In -->
        <div id="changeStatus" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Start Task</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">   
                       Logged In??
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="dataSubmitStatus">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- -->

        <!-- Time Out -->
        <div id="TimeOut" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Time Out</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">   
                        Logging Out
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="timeoutdatasubmit">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- -->


        <!-- Time In -->
        <div id="BoxInfo" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Done Box</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">  
                        
                        <p id="emp_id"> </p>
                        <?php
                            $emp_id = "<p id='emp_id'> </p>";
                             // $tell=$fetchdata->test($emp_id);
                        ?>

                        <div class="form-group">    
                            <label>Work Order</label>       
                            <select  id="workorder" onchange="getWorkOrder()" class="form-control">  
                                    <option value="" >Select Work Order</option>                   
                                <?php
                                    $sql=$fetchdata->selectWorkOrderForBox($tell);
                                    while($row=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo htmlentities($row['ihp_no']);?>"><?php echo htmlentities($row['ihp_no']);?></option>
                                <?php } ?>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label>Handle Tree</label>
                            <input type="text" class="form-control" id="handleTree" placeholder="Select Work order" disabled>
                        </div>

                        <div class="form-group">
                            <label>Machine #</label>
                            <input type="text" class="form-control" id="machine_no" placeholder="Select Work order" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Box Number</label>
                            <input type="number" class="form-control" id="boxNumber" placeholder="Enter Box Number" >
                        </div>

                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" >
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="createBox">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check for Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div class="form-group">
                        <label>Employee Name</label>
                        <select name="cars" id="cars" class="form-control form-control" >
                            <?php
                                $sql=$fetchdata->fetch_employee_attendance();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo htmlentities($row['emp_id']);?>"><?php echo htmlentities($row['firstname']);?></option>
                            <?php } ?>
                        </select>       
                    </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

    </body>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="plugins/notify/notify.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    var id="";
    $(document).on('click','.TimeIn',function(){ 
        id=$(this).attr("id");
        $("#changeStatus").modal("show");
    });

     $(document).on('click','#dataSubmitStatus',function(){ 
        var pick = "9";
        
       
            var fd = new FormData();    
            fd.append('id',id);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
                   
                            $("#sign-in").removeAttr("disabled");
                        if($.trim(result)==1){
                            // $("#sign-in").attr("disabled", true);  
                            $.notify("Login Success ","success");   
                            // alert("working");
                             setTimeout(function() { window.location.reload(); }, 1000);
                            
                        }else  if($.trim(result)==2){
                            $.notify("No work order is set","warning");          
                            // alert("not working");
                            $("#dataSubmitStatus").attr("disabled", false);  
                            $("#dataSubmitStatus").html('Login');
                          
                        }                       

                        return false;
               
                }
            });            
        

     });


    var TimeOutID="";
    $(document).on('click','.TimeOut',function(){ 
        TimeOutID=$(this).attr("id");
        $("#TimeOut").modal("show");
    });

     $(document).on('click','#timeoutdatasubmit',function(){ 
        var pick = "10";
  
        var fd = new FormData();    

            fd.append('TimeOutID',TimeOutID);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
              
                        $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            $.notify("Sign Success ","success");   
                            setTimeout(function() { window.location.reload(); }, 2000);
                        }else{
                            $.notify("Error Try Again Later ","error");           
                            // alert("not working");
                            $("#timeoutdatasubmit-in").attr("disabled", false);  
                            $("#timeoutdatasubmit-in").html('Login');
                        }                    
                
                }
            });
     });

 
    var breakon="";
    $(document).on('click','.OnBreak',function(){ 
        breakon=$(this).attr("id");
        var pick = "11";
        var fd = new FormData();    
            fd.append('breakon',breakon);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
              
                        $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            $.notify("Sign Success ","success");   
                            window.location.reload();
                        }else{
                            $.notify("Error Try Again Later ","error");           
                            // alert("not working");
                            $("#timeoutdatasubmit-in").attr("disabled", false);  
                            $("#timeoutdatasubmit-in").html('Login');
                        }
                }
            });
     });

  var breakon1="";
    $(document).on('click','.OnBreak1',function(){ 
        breakon1=$(this).attr("id");
        var pick = "21";
        var fd = new FormData();    
            fd.append('breakon1',breakon1);
            fd.append('pick',pick);
               
            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
              
                        $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            $.notify("Sign Success ","success");   
                            window.location.reload();
                        }else{
                            $.notify("Error Try Again Later ","error");           
                            // alert("not working");
                            $("#timeoutdatasubmit-in").attr("disabled", false);  
                            $("#timeoutdatasubmit-in").html('Login');
                        }
                }
            });
     });



        var breakoff="";
    $(document).on('click','.OffBreak',function(){ 
        breakoff=$(this).attr("id");
        var pick = "12";
        var fd = new FormData();    
            fd.append('breakoff',breakoff);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
              
                        $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            $.notify("Sign Success ","success");   
                            window.location.reload();
                        }else{
                            $.notify("Error Try Again Later ","error");          
                            // alert("not working");
                            $("#timeoutdatasubmit-in").attr("disabled", false);  
                            $("#timeoutdatasubmit-in").html('Login');
                        }                    
                
                }
            });
     });

        var breakoff1="";
    $(document).on('click','.OffBreak1',function(){ 
        breakoff1=$(this).attr("id");
        var pick = "22";
        var fd = new FormData();    
            fd.append('breakoff1',breakoff1);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
              
                        $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            $.notify("Sign Success ","success");   
                            window.location.reload();
                        }else{
                            $.notify("Error Try Again Later ","error");          
                            // alert("not working");
                            $("#timeoutdatasubmit-in").attr("disabled", false);  
                            $("#timeoutdatasubmit-in").html('Login');
                        }                    
                
                }
            });
     });

        var emp_id="";
    $(document).on('click','.boxes',function(){ 
        emp_id=$(this).attr("id");
        // $("#emp_id").html(emp_id);  
        $("#BoxInfo").modal("show");
    });

     $(document).on('click','#createBox',function(){ 

        var workorder = $.trim(encodeURI($("#workorder").val()));
        var boxNumber = $.trim(encodeURI($("#boxNumber").val()));
        var machine_no = $.trim(encodeURI($("#machine_no").val()));
        var qty = $.trim(encodeURI($("#quantity").val()));
        var pick = "19";

        if(workorder == "" || boxNumber == "" ||  qty== "" ){
                $.notify("Field Detercted Empty ","error");  
                $("#timeoutdatasubmit-in").attr("disabled", false);  
                $("#timeoutdatasubmit-in").html('Login');
        } else {
            alert(workorder + " || " + boxNumber + " || " + qty  + " || " + emp_id);
            var fd = new FormData();
            fd.append('workorder', workorder);    
            fd.append('machine_no', machine_no);
            fd.append('boxNumber', boxNumber);
            fd.append('qty', qty);
            fd.append('emp_id',emp_id);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);                   
                    $("#sign-in").removeAttr("disabled");
                    if($.trim(result)!=0){
                        $.notify("Sign Success ","success");   
                        setTimeout(function() { window.location.reload(); }, 2000);
                    }else{
                        $.notify("Error While Logging Out ","error");          
                        // alert("not working");
                        $("#timeoutdatasubmit-in").attr("disabled", false);  
                        $("#timeoutdatasubmit-in").html('Login');
                    }                 
                }
            });
        }


 
     });

    function getWorkOrder(){
       // set text box value here
        var workorder = $.trim(encodeURI($("#workorder").val()));
        var pick = "18";
    
        var fd = new FormData();    
        fd.append('workorder', workorder);
        fd.append('pick', pick);
        $.ajax({
            url: "pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success: function(result){
            
                let json = $.parseJSON(result);
            
                    console.log(); 
                var txt =  document.getElementById('handleTree');
                txt.value = json.handleTree;

                var txt2 =  document.getElementById('machine_no');
                txt2.value = json.machine_no;
            }
        });
    }
</script>
</body>
</html>