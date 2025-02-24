<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = intval($_GET['id']);
    $fetchdata = new admin_creation();
 	$sql=$fetchdata->getLeaveforEdit($id);
    while($row=mysqli_fetch_array($sql)){ 
?>


<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Leave Information</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
 
                <li> <button type='button' id='<?php echo $id;?>' class='react_btn  btn-success btn-sm  mr-1'  title='Edit Record'><i class='fa fa-check mr-1' >Save</i> </button></li>

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
                <h3 class="card-title">
                   
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <!-- /.Profile -->
                  <div class="active tab-pane" id="profile">
                   

					<div class="row" hidden>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Leave Description</label>
                            <input type="text" class="form-control" id="leave_id" placeholder="Enter Employee ID Number"  value="<?php echo$row['id'];?>">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Leave Description</label>
                            <input type="text" class="form-control" id="leave_desc" placeholder="Enter Leave Description"  value="<?php echo$row['leave_description'];?>">
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Leave Count</label>
                            <input type="number" class="form-control" id="leave_count" placeholder="Enter Number of Leave" value="<?php echo$row['leave_count'];?>">
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Earnable</label>
                            <input list="positions" type="text" class="form-control" id="earnable" placeholder="Is leave Earnable" value="<?php echo$row['earned'];?>">
                            <datalist id="positions">
                                <option value="yes">
                                <option value="no">           
                            </datalist>

                        </div>
                      </div>
                     
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
    <!-- Start Edit Modal -->
    <div class="modal fade" id="deactivateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to save request?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datadeact">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->



<?php } include 'includes/footer.php'; ?>

<script>
	var id = "";
    $(document).on('click','.react_btn',function(){ 
        id=$(this).attr("id");
        $("#deactivateModal").modal("show");
    });

    $(document).on('click','#datadeact',function(){
   		$("#datadeact").attr("disabled", true); 
        var leave_id=$.trim(encodeURI($("#leave_id").val()));
        var leave_desc=$.trim(encodeURI($("#leave_desc").val()));        
        var leave_count=$.trim(encodeURI($("#leave_count").val()));
        var earnable=$.trim(encodeURI($("#earnable").val()));
        var pick = '39';

        if(leave_desc == "" || leave_count == ""  || earnable == ""  ){
          $.notify("Found Empty", "error"); 
          $("#datadeact").attr("disabled", false);         
        } else {
            var fd = new FormData();    
            fd.append('leave_id', leave_id);
            fd.append('leave_desc', leave_desc);
            fd.append('leave_count', leave_count);
            fd.append('earnable', earnable);
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
                        $.notify("request edited successful", "success"); 
                        setTimeout(function() { location.href = "leaveTypes"; }, 2000);
                    }else{
                        $.notify("error encountered while editting", "error");
                        $("#datareset").attr(" ", false);   
                    }
                }
            }); 
        }
    });

</script>