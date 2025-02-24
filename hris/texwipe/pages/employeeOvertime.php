<title>Overtime Approval</title>
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
            <h1>Overtime Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Create Overtime </a></li>
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
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Date Worked (from)</th>
                    <th style="text-align:center;">Date Worked (to) </th>
                    <th style="text-align:center;">Total Hours </th>
                    <th style="text-align:center;">Reason </th>                    
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Approver 1 </th>
                    <th style="text-align:center;">Approver 2 </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectOTRequest($emp_id);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['OTID']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date_worked'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date_filed_to'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['total_hours']);?></td>
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
	<div class="modal fade" id="CreateDocumentType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                <div class="card-body">
                    
                    <div class="form-group" hidden>
                        <label><span style="color:red">*</span>Employee </label>
                        <input type="text" name="date_filed" id="employee_id" class="form-control" value="<?php echo $emp_id; ?>">
                      
                    </div>
                    
                    <div class="form-group" >
                         <div class="row">
                            <div class="col-sm">
                                <label><span style="color:red">*</span>Date From</label>
                                <input type="date" name="date_filed" id="date_filed" class="form-control"  onkeyup="discount();">
                            </div>
                            <div class="col-sm">
                                <label><span style="color:red">*</span>Date To</label>
                                <input type="date" name="date_filed" id="date_filed_to" class="form-control" onkeyup="discount();">
                            </div>
                          </div>

                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span>Hours Rendered per Day </label>
                        <input type="number" name="date_filed" id="hours" class="form-control"  placeholder="Enter Employee Rendered Hours" onkeyup="discount();">
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span>Total Hours Rendered </label>
                        <input type="number" name="date_filed" id="Totalhours" class="form-control" disabled>
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span>REASON FOR OT WORK    </label>
                        <textarea  class="form-control" id="notification" placeholder="Enter Employee Reason for Overtime"></textarea>
                    </div>
                </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createDepartment" >Add</button>	      	
	        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
	      </div>
	    </div>
	  </div>
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
                    <button type="button" class="btn btn-primary" id="dataSubmit">Submit</button>
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
     function discount(){
        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var hours=$.trim(encodeURI($("#hours").val()));
        var date_filed_to=$.trim(encodeURI($("#date_filed_to").val()));
        var fistDay = new Date(date_filed);
        var secordDay = new Date(date_filed_to);
        var fiveDaysAgo = secordDay.getDate() - fistDay.getDate() + 1;
        var computed = fiveDaysAgo*hours;
        document.getElementById('Totalhours').value = computed; 
    }


    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var hours=$.trim(encodeURI($("#hours").val()));
        var notification=$.trim(encodeURI($("#notification").val()));
        var date_filed_to=$.trim(encodeURI($("#date_filed_to").val()));
        var pick="28";
        var Totalhours=$.trim(encodeURI($("#Totalhours").val()));


        if(employee_id == "" || date_filed== "" || notification =="" ||  hours =="" || date_filed_to == ""){
            $.notify("Account Request was not Successfull ", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    

            fd.append('employee_id', employee_id);
            fd.append('date_filed_to', date_filed_to);
            fd.append('date_filed', date_filed);
            fd.append('hours', Totalhours);
            fd.append('notification', notification);
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
                        $.notify(" Request Created Successfully", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $(".createDepartment").attr("disabled", false);   
                    }
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

        var pick = '29';
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

        var pick = '30';
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