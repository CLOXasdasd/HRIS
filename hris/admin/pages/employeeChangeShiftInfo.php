<title>Change Shift info</title>
<?php 
    include 'includes/header.php'; 
        $id =$_GET['id'];
    $fetchdata=new admin_creation( );
   
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Shift </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <!-- <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Change Employee Shift</a></li> -->
                          <?php if( $_SESSION['account_type'] != 'HR Monitoring'){ ?>
                <?php if($fetchdata->checkstatusCS($id) == "Pending"){ ?>
                    <li><button type='button' id='<?php echo $id;?>' class='approve_btn  btn-success btn-sm mr-1'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button></li>
                  
                <?php } ?>
                  <li><button type='button' id='<?php echo $id;?>' class='reject_btn  btn-danger btn-sm mr-1'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button></li>
                 <?php } ?>
            </ol>
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
                <h3 class="card-title">Change Shift List </h3>
              </div>

              <div class="card-body">
                <?php
                $sql=$fetchdata->selectCSRequestinfo($id);
                while($row=mysqli_fetch_array($sql)){ ?>

                     <div class="form-group" >
                        <label> Change Shift Category </label>
                        <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities($row['category']);?>" disabled>
                    </div>
        
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Current Schedule</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities(date("F d Y", strtotime($row['filed_date'])));?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Shift Start (from )</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities(date("h:i a", strtotime($row['shift_start'])));?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Shift End (to )</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $row['shift_end'];?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label> Person available Employee </label>
                        <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities($row['replacement_personel']);?>" disabled>
                    </div>
                   
                    <div class="row">
                   <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> New Schedule</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities(date("F d Y", strtotime($row['date_filed1'])));?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label>Shift Start (from )</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $row['rep_shiftstart'];?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label> Shift End (to )</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $row['rep_shiftend'];?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label>Reason</label>
                        <textarea  class="form-control" id="notification" placeholder="Enter Reason for change shift" value="" disabled><?php echo htmlentities($row['reason']);?></textarea>
                    </div>
                <?php } ?>
                </div>  
    
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- Actions -->
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
        var pick = '33';
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
                    $("#dataSubmit").attr("disabled", false);   
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

        var pick = '32';
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