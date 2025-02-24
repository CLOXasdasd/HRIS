<title>Create Leave</title>
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
            <h1>Leave Request </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create</a></li> -->
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
                <h3 class="card-title">Leave Request Form</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                       <div class="form-group" >
                            <label><span style="color:red">*</span> Employee </label>
                            <select class="form-control" id="employee_id">
                                <option value=""  selected> Select Employee </option>
                                <?php
                                $sql=$fetchdata->selectEmployeeAccounts();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>
                                <?php } ?>
                            </select>
                        </div>

                       <div class="form-group" >
                            <label><span style="color:red">*</span> Leave Type </label>
                            <select class="form-control" id="leave">
                                <option value=""  selected> Select Employee </option>
                                <?php
                                $sql=$fetchdata->selectLeaveTypes();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['leave_description']?>"> <?php echo $row['leave_description']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                               <div class="form-group" >
                                    <label><span style="color:red">*</span> Start Date </label>
                                    <input type="date" name="date_filed" id="start_date" class="form-control">                                    
                                </div>                                
                            </div>
                          
                            <div class="col-sm">
                                <div class="form-group" >
                                    <label><span style="color:red">*</span> End Date </label>
                                    <input type="date" name="date_filed" id="end_date" class="form-control">                                    
                                </div>     
                            </div>  
                        </div>

                        <div class="form-group" >
                            <label><span style="color:red">*</span>Day</label>
                            <select class="form-control" id="date">
                                <option value="1"> Whole Day </option>     
                                <option value="2"> Half Day </option>                               
                            </select>
                        </div>

                        <div class="form-group" >
                            <label><span style="color:red">*</span>Reason for Leave</label>
                            <textarea  class="form-control" id="description" placeholder="Enter Reason for Leave"></textarea>
                        </div>

                        <div class="row">
                          <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create</a></li>
                               <li><a type="button" class="btn btn-danger  fas fa-times-circle mr-1" id="cancel"> Back</a></li>
                            </ol>
                          </div>
                        </div>

                  </div>
                  <div class="col-sm">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th style="text-align:center;">Leave Description </th>
                        <th style="text-align:center;">Leave Count </th>
                        <th style="text-align:center;">Earned Leave </th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                            $sql=$fetchdata->selectLeaveTypes();
                            while($row=mysqli_fetch_array($sql)){ ?>
                            <tr>
                                <td style="text-align:center;"><?php echo htmlentities($row['leave_description']);?></td>
                                <td style="text-align:center;"><?php echo htmlentities($row['leave_count']);?></td>
                                <td style="text-align:center;"><?php echo htmlentities($row['earned']);?></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>       
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
            <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="card-body">
                    <label>Do you want to Save Request?</label>
                </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary createDepartment" >save</button>         
            <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>


<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 

        var date=$.trim(encodeURI($("#date").val()));
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var leave=$.trim(encodeURI($("#leave").val()));
        var start_date=$.trim(encodeURI($("#start_date").val()));
        var end_date=$.trim(encodeURI($("#end_date").val()));
        var description=$.trim(encodeURI($("#description").val()));
        var pick="34";

        if(end_date < start_date ){
            $.notify("Start date and End date is not valid", "error");
            $(".createDepartment").attr("disabled", false);   
        }else
         if(employee_id == "" || leave == "" || start_date == "" || end_date == "" || description == ""){
            $.notify("Some of the important fields are empy", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('date',date);
            fd.append('employee_id',employee_id);
            fd.append('leave',leave);
            fd.append('start_date',start_date);
            fd.append('end_date',end_date);
            fd.append('description',description);
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
                        setTimeout(function() {  location.href = "employeeLeave"; }, 2000);
                    }else if($.trim(result)==2){
                        $.notify("Problem Encountered while creating a request", "error");
                        $(".createDepartment").attr("disabled", false); 
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $(".createDepartment").attr("disabled", false);   
                    }
                    return false;
                }
            });           
        }
    });
    
    $(document).on('click','#cancel',function(){ 
        location.href = "employeeLeave";
    });

 

</script>