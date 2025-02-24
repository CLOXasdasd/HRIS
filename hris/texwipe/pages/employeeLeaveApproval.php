<title>Leave Approval</title>
<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Approval </h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
            <li><a type="button" id='approve_selected' class="btn btn-primary mr-1 btn_selected" >Approve Selected</a> </li>
            <!-- <li><a type="button" id='reject_selected' class="btn btn-danger mr-1 btn_selected_Reject" >Reject Selected</a> </li> -->
            </ol>
          </div>
        </div>
      </div>
    </section>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
       <!--            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Approvals</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Approved</a></li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                     
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="text-align:center;"></th>
                            <th style="text-align:center;">ID </th>
                            <th style="text-align:center;">Category </th>
                            <th style="text-align:center;">Name </th>
                            <th style="text-align:center;">Start Date </th>
                            <th style="text-align:center;">End Date </th>
                            <th style="text-align:center;">Time </th>
                            <th style="text-align:center;">Number of Days</th>    
                            <th style="text-align:center;">Description </th>
                            <th style="text-align:center;">Date Filed </th>
                            <th style="text-align:center;">Status </th>
                            <th style="text-align:center;">Action </th>                    
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                                $sql=$fetchdata->selectLEAVERequestlistHead($emp_id);    
                                while($row=mysqli_fetch_array($sql)){ 
                                   if($row['status'] == '0') {?>
                                <tr>
                                    <td style="text-align:center;"><input type="checkbox" id="update[]" name="update[]" value="<?php echo htmlentities($row['leave_id']);?>"></td> 
                                    <td style="text-align:center;"><?php echo htmlentities($row['leave_id']);?></td>
                                    <td style="text-align:center;"><?php echo htmlentities($row['leaveRequest']);?></td>
                                    <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                                    <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['startDate']));?></td>
                                    <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['endDate']));?></td>  
                                    <td style="text-align:center;"><?php echo htmlentities($row['time_Filed']);?></td> 
                                    <td style="text-align:center;"><?php echo htmlentities($row['days']);?></td>  
                                    <td style="text-align:center;"><?php echo htmlentities($row['reason']);?></td>     
                                    <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['dateFiled']));?></td>  
                                    <td style="text-align:center;"><?php if($row['status'] == "0") { echo "Pending";} else {echo $row['status'] ;}?></td>
                                    <td style="text-align:center;">
                                        <?php if($row['status'] == '0' || $row['status2'] == ''){ ?>
                                            <button type='button' id='<?php echo htmlentities($row['leave_id']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                            <button type='button' id='<?php echo htmlentities($row['leave_id']);?>' class='reject_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                        <?php } ?>
                                    </td>   
                                </tr>
                            <?php } }?>
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="tab-pane" id="settings">

                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="text-align:center;"></th>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">Category </th>
                            <th style="text-align:center;">Name </th>
                            <th style="text-align:center;">Start Date </th>
                            <th style="text-align:center;">End Date </th>
                            <th style="text-align:center;">Number of Days</th>    
                            <th style="text-align:center;">Description </th>
                            <th style="text-align:center;">Status </th>
                            <th style="text-align:center;">Action </th>                    
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                                $sql=$fetchdata->selectLEAVERequestlistHead($emp_id);    
                                while($row=mysqli_fetch_array($sql)){ 
                                   if($row['status'] == 'Pending') {?>
                                <tr>
                                    <td style="text-align:center;"><input type="checkbox" id="update[]" name="update[]" value="<?php echo htmlentities($row['leave_id']);?>"></td> 
                                    <td style="text-align:center;"><?php echo htmlentities($row['leave_id']);?></td>
                                    <td style="text-align:center;"><?php echo htmlentities($row['leaveRequest']);?></td>
                                    <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                                    <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['startDate']));?></td>
                                    <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['endDate']));?></td>  
                                    <td style="text-align:center;"><?php echo htmlentities($row['days']);?></td>  
                                    <td style="text-align:center;"><?php echo htmlentities($row['reason']);?></td>     
                                    <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                                    <td style="text-align:center;">
                                        <?php if($row['status'] == 'Pending' || $row['status2'] == ''){ ?>
                                            <button type='button' id='<?php echo htmlentities($row['leave_id']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                            <button type='button' id='<?php echo htmlentities($row['leave_id']);?>' class='reject_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                        <?php } ?>
                                    </td>   
                                </tr>
                            <?php } }?>
                          </tbody>
                        </table>
                      </div>
                     
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

  </div>

    <div class="modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Reject this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

        <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Approve this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="approveSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

    <div class="modal fade" id="selected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to confirm this request ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitSelected">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>

    <div class="modal fade" id="reject_selected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to reject  this request ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataRejectSelected">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>
 
   var id="";
    $(document).on('click','.reject_btn',function(){ 
        id=$(this).attr("id");
        $("#rejectModal").modal("show");
    });

    $(document).on('click','#dataSubmit',function(){ 
        $("#dataSubmit").attr("disabled", true);
        var pick = '36';
        var fd = new FormData();    
        fd.append('id', id);
        fd.append('pick', pick);
        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                        
                if($.trim(result)!=0){
                    $.notify("Request Rejected Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataSubmitEdit").attr("disabled", false);   
                }
                return false;
            }
        });
    });

    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
         $("#approveModal").modal("show");
    });

    $(document).on('click','#approveSubmit',function(){ 
        $("#approveSubmit").attr("disabled", true);   

        var pick = '35';
        var fd = new FormData();    
        fd.append('id', id);
        fd.append('pick', pick);
        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                                     
                if($.trim(result)==1){
                    $.notify("  Request Approved Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#approveSubmit").attr("disabled", false);   
                }
              
            }
        });
    });


$(document).on('click','.btn_selected',function(){ 
        $("#selected").modal("show");
    });
    
    $(document).on('click','#dataSubmitSelected',function(){ 
        selected()  
    });

   function selected(){
        $("#dataSubmitSelected").attr("disabled", true); 
        let arr = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

        checkboxes.forEach((item)=>{
           arr.push(item.value)
        }) 

        var selected = arr;
        var pick = '42';
        
        if(selected == '') {
            $.notify("Warning!, Nothing to approve");
            $("#dataSubmitSelected").attr("disabled", false); 
        } else {
            var fd = new FormData();    
            fd.append('selected', selected);
            fd.append('pick', pick);
                $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);
                    if($.trim(result)!=0){
                        $.notify(" Request Approved", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Error! Please try again later", "error");
                        $("#dataSubmitSelected").attr("disabled", false);  
                    }
                }
            });         
        }
    }
   

    $(document).on('click','.btn_selected_Reject',function(){ 
        $("#reject_selected").modal("show");

        alert();
    });
    
    $(document).on('click','#dataRejectSelected',function(){ 
        reject_selected()  
    });


   function reject_selected(){
        $("#dataRejectSelected").attr("disabled", true); 
        let arr = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

        checkboxes.forEach((item)=>{
           arr.push(item.value)
        }) 



        var selected = arr;
        var pick = '47';
        
        if(selected == '') {
            $.notify("Warning!, Nothing to approve");
            $("#dataRejectSelected").attr("disabled", false); 
        } else {
            var fd = new FormData();    
            fd.append('selected', selected);
            fd.append('pick', pick);
                $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);
                    if($.trim(result)!=0){
                        $.notify(" Request Approved", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Error! Please try again later", "error");
                        $("#dataSubmitSelected").attr("disabled", false);  
                    }
                }
            });         
        }
    }
</script>