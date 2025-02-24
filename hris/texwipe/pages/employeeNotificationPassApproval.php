<title>Norification Pass Type</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notification Pass </h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Description </th>
                                        <th style="text-align:center;">Date </th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                       
                            $sql=$fetchdata->selectAllNotifRequestListhead($emp_id);     
                    

                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>

                            <td style="text-align:center;"><?php echo htmlentities($row['notifID']);?></td>
                            <td style="text-align:center;"><?php echo $row['Lastname'] . " " . $row['Firstname'];?></td>
                            <td style="text-align:center;"><?php echo htmlentities(str_ireplace($search,$replace,$row['notif_desc']));?></td>     
                            <td style="text-align:center;"><?php echo date('F d Y H:i A',strtotime($row['date']));?></td>    
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>     

                            <td style="text-align:center;">
                                <?php if($row['status'] == 'Pending') {?>
                                    <button type='button' id='<?php echo htmlentities($row['notifID']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                    <button type='button' id='<?php echo htmlentities($row['notifID']);?>' class='reject_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                <?php }?>
                            </td> 
                                                
                        </tr>
                    <?php } ?>
                  </tbody>
                  
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <!-- Position modal -->

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
<?php include 'includes/footer.php'; ?>
<script>
 
   var id="";
    $(document).on('click','.reject_btn',function(){ 
        id=$(this).attr("id");
        $("#editModal").modal("show");
    });

    $(document).on('click','#dataSubmit',function(){ 
        $("#dataSubmit").attr("disabled", true);   

        var pick = '23';
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
                if($.trim(result)==1){
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

        var pick = '24';
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
                if($.trim(result)==1){
                    $.notify("  Request Approved Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#approveSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    });

</script>