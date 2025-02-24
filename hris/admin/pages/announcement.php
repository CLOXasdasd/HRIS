<title>Announcement</title>
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
            <h1>Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Add Announcement </a></li>
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

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Announcements</th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllAnnouncement();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['descipriton']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                         
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='edit_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >Remove</i> </button>
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
                        <label>Announcement</label>
                        <input type="text" class="form-control" id="leave_description" placeholder="Enter Announcement" >
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
                     <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to DELETE announcement?</label>
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
                        <label>Do you want to REMOVE announcement?</label>
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
        var pick="44";

       if(leave_description == "" ){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createLeave").attr("disabled", false);
        } else { 
            var fd = new FormData();    
            fd.append('leave_description', leave_description);                    
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Announcement Created Successfully ","success");   
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
        
    });

    $(document).on('click','#dataSubmit',function(){ 
        dataEdit(id);
        // alert(id);
    });

    function dataEdit(id){

        $("#dataSubmit").attr("disabled", true);   
        var id=id;
        // var pick = '19';
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
                $("#ClearLeave").modal("show");
    });


    $(document).on('click','.clearList',function(){ 
        $(".clearList").attr("disabled", true);

        var pick = '45';
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
                    $.notify(" Successfully Deleted Announcement", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    });
  
  
  
</script>