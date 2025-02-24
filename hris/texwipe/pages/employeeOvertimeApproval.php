employeeOvertime<title>Overtime Approval</title>
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
            <h1>Overtime Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">     
                <li><a type="button" id='approve_selected' class="btn btn-success mr-1 btn_selected" >Approve Selected</a> </li>
                <li><a type="button" id='reject_selected' class="btn btn-danger mr-1 btn_selected_Reject" >Reject Selected</a> </li>                
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
                    <th style="text-align:center;"> <input type="checkbox" id="selectAll"></th>
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">Date Filed</th>                    
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Start Date</th>
                    <th style="text-align:center;">End Date</th>
                    <th style="text-align:center;">Total Hours</th>
                    <th style="text-align:center;">Reason</th>                    
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectOTRequestListHead($emp_id);     
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"> 
                                <?php if($row['status'] == 'Pending') { ?>
                                    <input type="checkbox" id="update[]" class="item-checkbox" name="update[]" value="<?php echo htmlentities($row['OTID']);?>"> 
                                <?php } ?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['OTID']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date_filed'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date_worked'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date_filed_to'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['total_hours']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['reason']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                            <td style="text-align:center;">
                                <?php if($row['status'] == 'Pending') {?>
                                    <button type='button' id='<?php echo htmlentities($row['OTID']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                    <button type='button' id='<?php echo htmlentities($row['OTID']);?>' class='reject_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                <?php }?>
                            </td>                                                
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
                    
                    <div class="form-group" >
                        <label><span style="color:red">*</span>Employee </label>
                        <select class="form-control" id="employee_id">
                            <option value=""  selected> Select Employee </option>
                            <?php
                            $sql=$fetchdata->selectEmployeeAccountsDepartment($emp_id);
                            while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>                                   
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group" >
                         <div class="row">
                            <div class="col-sm">
                                <label><span style="color:red">*</span>Date From</label>
                                <input type="date" name="date_filed" id="date_filed" class="form-control">
                            </div>
                            <div class="col-sm">
                                <label><span style="color:red">*</span>Date To</label>
                                <input type="date" name="date_filed" id="date_filed_to" class="form-control">
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
                        <textarea  class="form-control" id="notification" placeholder="Enter Employee Notification"></textarea>
                    </div>
                </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary createDepartment" >Create</button>         
            <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
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

    <div class="modal fade" id="selected_reject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to reject this confirm  request ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSelectedReject">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>
 

      document.getElementById('selectAll').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.item-checkbox').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

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

        var Totalhours=$.trim(encodeURI($("#Totalhours").val()));

        var pick="19";

        if(employee_id == "" || date_filed== "" || notification =="" ||  hours ==""){
            $.notify("Account Request was not Successfull ", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('employee_id', employee_id);
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
        var pick = '43';
        
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
        $("#selected_reject").modal("show");
    });
    
    $(document).on('click','#dataSelectedReject',function(){ 
        deleteSelected()  
    });


       function deleteSelected(){
        $("#dataSubmitSelected").attr("disabled", true); 
        let arr = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

        checkboxes.forEach((item)=>{
           arr.push(item.value)
        }) 

        var selected = arr;
        var pick = '46';
        
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
</script>