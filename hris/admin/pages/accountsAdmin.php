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
            <h1>Admin Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-info  fa fa-plus-square" data-toggle="modal" data-target="#CreateModal"> Create Admin Account </a></li>
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
                <h3 class="card-title">Admin Account List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Username </th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Account</th>                                   
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql=$fetchdata->selectAddAdminAccount();
  
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['username']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['name']);?></td>          
                            <td style="text-align:center;"><?php echo htmlentities($row['account_type']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                          
                            <td style="text-align:center; width: 250px;">
                                <?php if($row['status'] == 'Active'){?>
                                <button type='button' id='<?php echo htmlentities($row['username']);?>' class='deact_btn btn-danger btn-sm '  title='Delete Record' hidden><i class='fa fa-times' >Deactivate</i> </button> 

                                <?php } else { ?> 
                                <button type='button' id='<?php echo htmlentities($row['username']);?>' class='react_btn  btn-primary btn-sm'  title='Edit Record' hidden><i class='fa fa-edit' >Reactivate</i> </button> 
                                <?php } ?>
   
                                <button type='button' id='<?php echo htmlentities($row['username']);?>' class='reset_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reset Password</i> </button>
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

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Work Email</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-info  fa fa-plus-square" data-toggle="modal" data-target="#AddEmail"> Add Email </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Approvers Email</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql1=$fetchdata->getAllworkEmail();
  
                        while($row1=mysqli_fetch_array($sql1)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row1['Lastname'] . ", " . $row1['Firstname']; ?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row1['email']);?></td>                          
                            <td style="text-align:center; width: 250px;">
                               <button type='button' id='<?php echo htmlentities($row1['id']);?>' class='removeEmail  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-times' >Remove</i> </button>
                                
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

    <!-- Start Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Avtivate Account</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to activate this account ?
                </div>

               	<div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
          	
          	</div>
        </div>
    </div>
    <!-- End Delete Modal -->

    <!-- Start Edit Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deactivate Account </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to deactivate account?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitEdit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->



    <!-- Start Edit Modal -->
    <div class="modal fade" id="RemoveWorkEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remove Email </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Remove Email?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataRemoveEmail">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->
    <!-- Create modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username" >
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="text" class="form-control emp_id" id="name" placeholder="Enter Full name ">
                    </div>

                    <!-- <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="text" class="form-control emp_id" id="email" placeholder="Emter Email (e.g example@texwipe.com)">
                    </div> -->

                    <div class="form-group">
                        <label>Account Type</label>
                        <select class="form-control" id="accountType">
                            <option value=""  selected> Select Account Type </option>
                            <option value="Approver"  >Approver</option>                           
                            <option value="Admin"  > Admin </option>
                            <option value="Human Resources"  > Human Resources </option>
                            <option value="HR Monitoring" > HR Monitoring </option>
                        </select>
                    </div>

                   
                </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createAccount" >Create</button>	      	
	        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

	      </div>
	    </div>
	  </div>
	</div>


    <!-- Start Edit Modal -->
    <div class="modal fade" id="passwordmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Reset Password </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to reset account password?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datareset">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- Create modal -->
    <div class="modal fade" id="AddEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    
                    <div class="form-group">
                        <label>User</label>
                        <select name="cars" id="employeeEmail"  class="form-control emp_id">
                              <?php
                                $sql=$fetchdata->selectEmployeeForWorkEmail();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']; ?> </option>
                                <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Work Email</label>
                        <input type="email" name="text" class="form-control emp_id" id="work_email" placeholder="Enter Work Email ">
                    </div>

                   
                </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary AddAccount" >Create</button>            
            <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createAccount',function(){ 
        $(".createAccount").attr("disabled", true);

        var username=$.trim(encodeURI($("#username").val()));
        var name=$.trim(encodeURI($("#name").val()));
        var email=$.trim(encodeURI($("#email").val()));   
        var accountType=$.trim(encodeURI($("#accountType").val()));  
        var pick="4";

       if(username == "" || name == ""  || accountType  == "" ){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createAccount").html('Login'); 
            $(".createAccount").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('username', username);
            fd.append('name',name);
            fd.append('email',email);
            fd.append('accountType',accountType);          
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Account Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        } else if($.trim(result)==0){
                                $.notify("Username Already Exist!!","error");                           
                            $(".createAccount").attr("disabled", false);
                        }else{
                            $.notify("Schedule Already Exist","error");                           
                            $(".createAccount").attr("disabled", false);
                        }                       
                        return false;

                }
            });
        }    
    });

    $(document).on('click','.AddAccount',function(){ 
        $(".AddAccount").attr("disabled", true);

        var employeeEmail=$.trim(encodeURI($("#employeeEmail").val()));
        var work_email=$.trim(encodeURI($("#work_email").val()));       
        var pick="workEmail";

       if(work_email == "" ){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".AddAccount").html('Login'); 
            $(".AddAccount").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('employeeEmail', employeeEmail);
            fd.append('work_email',work_email);   
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Account Created Successfully ","success");   
                             setTimeout(function() { location.reload(); }, 2000);
                        } else{
                            $.notify("Error! Please call admin","error");                           
                            $(".AddAccount").attr("disabled", false);
                        }                  
                        return false;

                }
            });
        }    
    });

    // <!------------- ------------->
   var id="";
    $(document).on('click','.deact_btn',function(){ 
        id=$(this).attr("id");
        $("#editModal").modal("show");
    });

    $(document).on('click','#dataSubmitEdit',function(){ 
          dataEdit(id);
    });

    function dataEdit(id){

        $("#dataSubmitEdit").attr("disabled", true);   
        var id=id;
        var pick = '5';
        var fd = new FormData();    
        fd.append('username', id);
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



    // delete admin data
    
    $(document).on('click','.react_btn',function(){ 
        id=$(this).attr("id");
        $("#deleteModal").modal("show");
    });
    
    $(document).on('click','#dataSubmitDelete',function(){ 
          dataDelete(id);
    });

    function dataDelete(id){

        $("#dataSubmitDelete").attr("disabled", true);   
       
        var id=id;
        var pick = '6';
        var fd = new FormData();    
        fd.append('username', id);
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
                        $.notify(" Account Activated ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#dataSubmitDelete").attr("disabled", false);
                    }
                    return false;
            }
        });
    }


    $(document).on('click','.reset_btn',function(){ 
        id=$(this).attr("id");
        $("#passwordmodal").modal("show");
    });
    
    $(document).on('click','#datareset',function(){ 
          dataDelete(id);
    });

    function dataDelete(id){

        $("#datareset").attr("disabled", true);   
       
        var id=id;
        var pick = '7';
        var fd = new FormData();    
        fd.append('username', id);
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
                    $.notify(" Account Password Change Successfull ", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#datareset").attr("disabled", false);
                }
                return false;
            }
        });
    }

    $(document).on('click','.removeEmail',function(){ 
        id=$(this).attr("id");
        $("#RemoveWorkEmail").modal("show");
    });


    $(document).on('click','#dataRemoveEmail',function(){ 
           removeEmail(id);
    });



    function removeEmail(id){

        $("#datareset").attr("disabled", true);   
       
        var id=id;
        var pick = 'removeEmail';
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
                    $.notify(" Email Remove Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Error! , please contact Admin ", "error");
                    $("#datareset").attr("disabled", false);
                }
                return false;
            }
        });
    }

</script>