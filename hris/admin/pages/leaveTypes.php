<title>Leave Type</title>
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
            <h1>Leave Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-danger  fas fa-trash mr-1" data-toggle="modal" data-target="#ClearLeave"> Clear Leave </a></li>
			  <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Create Leave Type </a></li>
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
                <h3 class="card-title">Leave Type List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Leave Description </th>
                    <th style="text-align:center;">Leave Count </th>
                    <th style="text-align:center;">Earned Leave </th>
                    <th style="text-align:center;">Action</th>
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
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='edit_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >Edit</i> </button>
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='delete_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-trash' >Delete</i> </button>
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
                        <label>Leave Description</label>
                        <input type="text" class="form-control" id="leave_description" placeholder="Enter Leave Description" >
                    </div>

                    <div class="form-group" >
                        <label>Leave Count</label>
                        <input type="number" class="form-control" id="leave_Count" placeholder="Enter Leave Count" >
                    </div>

                    <div class="form-group" >
                        <input type="checkbox" name="formWheelchair" id="checkPost"/><label>Is Leave Earned</label>
                    </div>  
                </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createLeave" >Create</button>	      	
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
                        <label>Do you want to delete LEave Type?</label>
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

        <!-- Department modal -->
    <div class="modal fade" id="ClearLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                Do you want to clear all existing leaved file by employees
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-Danger clearList" >Yes</button>          
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>

          </div>
        </div>
      </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>
      $(document).on('click','.createLeave',function(){ 
        $(".createLeave").attr("disabled", true);

        var leave_description=$.trim(encodeURI($("#leave_description").val()));
        var leave_Count=$.trim(encodeURI($("#leave_Count").val()));
        var checkBox = document.getElementById("checkPost");
        if (checkBox.checked == true){
            var earned = "yes";
        } else {
            var earned = "no";
        }

        var pick="18";

       if(leave_description == "" || leave_Count == ""){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createLeave").html('Login'); 
            $(".createLeave").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('leave_description', leave_description);         
            fd.append('earned', earned); 
            fd.append('leave_Count', leave_Count);             
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Document Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        } else {
                            $.notify("Problem Encountered Upon Request","error");                           
                            $(".createLeave").attr("disabled", false);
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

    $(document).on('click','#dataSubmit',function(){ 
        dataEdit(id);
        // alert(id);
    });

    function dataEdit(id){

        $("#dataSubmit").attr("disabled", true);   
        var id=id;
        var pick = '19';
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
                    $.notify(" Leave Deleted", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    }

    // <!------------- ------------->
    $(document).on('click','.edit_btn',function(){ 
        id=$(this).attr("id");
        location.href = "employeeeditleave?id=" + id ;
    });


    $(document).on('click','.clearList',function(){ 
        $(".clearList").attr("disabled", true);

        var pick = '40';
        var fd = new FormData();   
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
                    $.notify(" Successfully Cleared Existing Leave", "success"); 
                    setTimeout(function() { location.reload(); }, 3000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    });
  
  
  
</script>