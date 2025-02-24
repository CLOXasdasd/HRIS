<title>Change Shift</title>
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
            <h1>Change Shift </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Change Employee Shift</a></li>
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
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Category </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Date </th>

                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Approver 1 </th>
                    <th style="text-align:center;">Approver 2 </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectCSRequest($emp_id);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['changeshift_id']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['category']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['filed_date']));?></td>

                            <td style="text-align:center;"><?php echo htmlentities(str_ireplace($search,$replace,$row['reason']));?></td>     
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status1']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status2']);?></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
    <!-- Department modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CHANGE SHIFT </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="card-body">

                    <div class="form-group" >
                        <label><span style="color:red">*</span> Change Shift Category </label>
                        <select class="form-control" id="change_shift">
                            <option value=""  selected> Select Category </option>
                            <option value="Change Shift"> Change Shift</option>                                   
                            <option value="No Overtime"> No Overtime</option>
                            <option value="Undertime"> Undertime</option>      
                            <option value="Early Out"> Early Out</option>                                                                  
                        </select>
                    </div>                    
                    
                    <div class="form-group" hidden>employee_id
                        <label><span style="color:red">*</span> Employee </label>
                        <input class="form-control" id="employee_id" value="<?php echo $emp_id; ?>">
                    </div>


                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Date Start</label>
                                <input type="date" name="date_filed" id="date_filed" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-sm">
                            <div class="form-group" >
                                <label>Date End </label>
                                <input type="date" name="date_filed1" id="date_filed1" class="form-control">
                            </div>
                        </div>
                    </div>    

                    <div class="row">
                        <label> Current Schedule </label>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Shift Start (from )</label>
                                <select class="form-control" id="change_shiftfrom">
                                    <?php 
                                     $min=array("00","30");
                                    for($x = 0 ; $x <= 23 ; $x++) {
                                          foreach ($min as $v) {?>
                                                
                                            <?php if($x <= 11 ){ ?>
                                                <option value="<?php echo $x .":".$v ." am"; ?>"> <?php echo $x.":".$v." am"; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $x .":".$v ." pm"; ?>"> <?php echo $x.":".$v." pm"; ?></option>
                                            <?php } ?>                                                

                                    <?php } }?>                            
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Shift End (to )</label>
                                <select class="form-control" id="change_shiftto">
                                    <?php 
                                    $min=array("00","30");
                                    for($x = 0 ; $x <= 23 ; $x++) {
                                          foreach ($min as $v) {?>
                                                
                                            <?php if($x <= 11 ){ ?>
                                                <option value="<?php echo $x .":".$v ." am"; ?>"> <?php echo $x.":".$v." am"; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $x .":".$v ." pm"; ?>"> <?php echo $x.":".$v." pm"; ?></option>
                                            <?php } ?>                                                
                                    
                                    <?php } }?>                            
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label> New Schedule </label>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label>Shift Start (from )</label>
                                <select class="form-control" id="rep_shiftfrom">
                                    <?php 
                                    $min=array("00","30");
                                    for($x = 0 ; $x <= 23 ; $x++) {
                                          foreach ($min as $v) {?>
                                                
                                            <?php if($x <= 11 ){ ?>
                                                <option value="<?php echo $x .":".$v ." am"; ?>"> <?php echo $x.":".$v." am"; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $x .":".$v ." pm"; ?>"> <?php echo $x.":".$v." pm"; ?></option>
                                            <?php } ?>                                                
                           
                                    <?php } }?>                            
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label> Shift End (to )</label>
                                <select class="form-control" id="rep_shiftto">
                                    <?php 
                                     $min=array("00","30");
                                    for($x = 0 ; $x <= 23 ; $x++) {
                                          foreach ($min as $v) {?>
                                                
                                            <?php if($x < 11 ){ ?>
                                                <option value="<?php echo $x .":".$v ." am"; ?>"> <?php echo $x.":".$v." am"; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $x .":".$v ." pm"; ?>"> <?php echo $x.":".$v." pm"; ?></option>
                                            <?php } ?>                                                
                           
                                    <?php } }?>                            
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span> Reason</label>
                        <textarea  class="form-control" id="notification" placeholder="Enter Reason for change shift"></textarea>
                    </div>

                    <div class="form-group" >

                        <label> Person available Employee </label>
                        <select class="form-control" id="rep_employee_id">
                            <option value=""  selected> Select Person available </option>
                            <?php
                            $sql=$fetchdata->selectEmployeeAccounts();
                            while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo $row['Lastname'] . ", " . $row['Firstname']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary createDepartment" >Submit</button>         
            <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
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
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 

        var date_filed1=$.trim(encodeURI($("#date_filed1").val()));
        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var change_shift=$.trim(encodeURI($("#change_shift").val()));
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var change_shiftfrom=$.trim(encodeURI($("#change_shiftfrom").val()));
        var change_shiftto=$.trim(encodeURI($("#change_shiftto").val()));
        var rep_employee_id=$.trim(encodeURI($("#rep_employee_id").val()));
        var rep_shiftfrom=$.trim(encodeURI($("#rep_shiftfrom").val()));
        var rep_shiftto=$.trim(encodeURI($("#rep_shiftto").val()));
        var notification=$.trim(encodeURI($("#notification").val()));
        var pick="31";

        if(change_shift == "" ||employee_id == "" ||change_shiftfrom == "" ||change_shiftto == "" ||notification == "" ){
            $.notify("Some of the important fields are empy", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('date_filed1',date_filed1);
            fd.append('date_filed',date_filed);
            fd.append('change_shift',change_shift);
            fd.append('employee_id',employee_id);
            fd.append('change_shiftfrom',change_shiftfrom);
            fd.append('change_shiftto',change_shiftto);
            fd.append('rep_employee_id',rep_employee_id);
            fd.append('rep_shiftfrom',rep_shiftfrom);
            fd.append('rep_shiftto',rep_shiftto);
            fd.append('notification',notification);
            fd.append('pick', pick);
            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);       

                    // alert(result);                 
                    if($.trim(result)==1){
                        $.notify(" Request Created Successfully", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#dataSubmitEdit").attr("disabled", false);   
                    }
                    return false;
                }
            });           
        }
    });

   var id="";
    $(document).on('click','.reject_btn',function(){ 
        id=$(this).attr("id");
        $("#editModal").modal("show");
    });

    $(document).on('click','#dataSubmit',function(){ 
        $("#dataSubmit").attr("disabled", true);   

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
                    $.notify("Request Rejected Successfully", "success"); 
                    setTimeout(function() { location.href = "employeeChangeShiftApproval"; }, 2000);
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
        location.href = "employeeChangeShiftInfo?id=" + id + " "; 
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
                   setTimeout(function() { location.href = "employeeChangeShiftApproval"; }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#approveSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    });

</script>