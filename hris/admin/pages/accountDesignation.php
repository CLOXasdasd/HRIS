<title>User Accounts</title>
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
            <h1>Department </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDepartment"> Create Department </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Department </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectDepartment();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['dept_description']);?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['dept_id']);?>' class='delete_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Delete</i> </button>
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


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Postion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-info  fa fa-plus-square" data-toggle="modal" data-target="#CreatePosition"> Create Position </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Position List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Position </th>
                    <th style="text-align:center;">Approver</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectPosition();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['position_desc']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['approver']);?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='delete_btn_position  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Delete</i> </button>
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

    <!-- Department modal -->
	<div class="modal fade" id="CreateDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Department Description</label>
                        <input type="text" class="form-control" id="department" placeholder="Enter Department Description" >
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

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deactivate Account </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to delete department?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitEdit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Department modal -->

    <!-- Position modal -->
	<div class="modal fade" id="CreatePosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Position Description</label>
                        <input type="text" class="form-control" id="position" placeholder="Enter Position Description" >
                    </div>


                    <div class="form-group" >
                       	<input type="checkbox" name="formWheelchair" id="checkPost"/><label>Is Position Approver</label>
                    </div>                    
               
                    <div class="form-group"hidden >
                        <input type="checkbox" name="formWheelchair" id="checkPostApprover"/><label>Is Position Eligible for Single Approver</label>


                    </div>  
                </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createPosition" >Create</button>	      	
	        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

	      </div>
	    </div>
	  </div>
	</div>

    <div class="modal fade" id="editPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deactivate Account </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to delete Position?</label>
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
<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true);

        var department=$.trim(encodeURI($("#department").val()));
        var pick="8";

       if(department == ""){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createDepartment").html('Login'); 
            $(".createDepartment").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('department', department);         
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Department Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        } else {
                            $.notify("Problem Encountered Upon Request","error");                           
                            $(".createDepartment").attr("disabled", false);
                        }                       
                        return false;

                }
            });
        }    
    });

   var id="";
    $(document).on('click','.delete_btn',function(){ 
        id=$(this).attr("id");
        $("#editModal").modal("show");
    });

    $(document).on('click','#dataSubmitEdit',function(){ 
          dataEdit(id);
    });

    function dataEdit(id){

        $("#dataSubmitEdit").attr("disabled", true);   
        var id=id;
        var pick = '9';
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
                        $.notify(" Account Deactivated ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#dataSubmitEdit").attr("disabled", false);   
                    }
                    return false;
            }
        });
    }

    // <!------------- ------------->

    $(document).on('click','.createPosition',function(){ 
        $(".createPosition").attr("disabled", true);

        var position=$.trim(encodeURI($("#position").val()));
        var checkBox = document.getElementById("checkPost");
        var isSingleApprover = document.getElementById("checkPostApprover");
        
         
          if (checkBox.checked == true){
		     var approver = "yes";
		  } else {
		       var approver = "no";
		  }

          if (isSingleApprover.checked == true){
             var isSingleapprover = "yes";
          } else {
               var isSingleapprover = "no";
          }


        var pick="10";

       if(position == ""){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createPosition").html('Login'); 
            $(".createPosition").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('position', position);         
            fd.append('approver', approver); 
            fd.append('isSingleapprover', isSingleapprover);      
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Department Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        } else {
                            $.notify("Problem Encountered Upon Request","error");                           
                            $(".createPosition").attr("disabled", false);
                        }                       
                        return false;

                }
            });
        }    
    });



   var id="";
    $(document).on('click','.delete_btn_position',function(){ 
        id=$(this).attr("id");
        $("#editPosition").modal("show");
    });

    $(document).on('click','#dataSubmit',function(){ 
          dataEditPosition(id);
    });

    function dataEditPosition(id){

        $("#dataSubmitEdit").attr("disabled", true);   
        var id=id;
        var pick = '11';
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
                        $.notify(" Account Deactivated ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#dataSubmitEdit").attr("disabled", false);   
                    }
                    return false;
            }
        });
    }
  
</script>