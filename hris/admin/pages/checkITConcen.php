<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = $_GET['id'];
    $fetchdata = new admin_creation();

    $sql=$fetchdata->checkConcern($id);
    while($row=mysqli_fetch_array($sql)){ 
?>

<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>IT Concern ID <?php echo $id; ?></h1>
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
                <h3 class="card-title">Change Shift List <?php echo $id;?></h3>
              </div>

              <div class="card-body">
            
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> ID</label>
                                <input type="text" name="date_filed" id="id" class="form-control" value="<?php echo $id; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Date Raised</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo date("F d Y",$row['dateFiled']);?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Department</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities($row['department']);?>" disabled>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">

                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span>Name</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $row['Firstname'] . " " . $row['Lastname'];?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Status</label>
                                <input list="statuses" type="text" name="status" id="status" class="form-control" value="<?php echo htmlentities($row['status']);?>">
                                 <datalist id="statuses">
                                    <option value="Open">
                                    <option value="Close">
                                    <option value="Remove">
                                    <option value="Re-Open ">
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label>Raised Concern</label>
                        <textarea  class="form-control" id="notification" placeholder="Enter Reason for change shift" value="" disabled><?php echo htmlentities($row['description']);?></textarea>
                    </div>

                    <div class="form-group" >
                        <label>Resolution</label>
                        <textarea  class="form-control" rows="4" cols="50" id="resolution" placeholder="Enter Resolution" value="" ><?php echo htmlentities($row['resolution']);?></textarea>
                    </div>
                </div>  
    
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
 
        <!-- Start Edit Modal -->
    <div class="modal fade" id="reactivateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Save request account ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datareact">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>


<script type="text/javascript">
      var id="";
    $(document).on('click','.react_btn',function(){ 
        $("#reactivateModal").modal("show");
    });

    $(document).on('click','#datareact',function(){ 
      $("#datareact").attr("disabled", true); 
      var id=$.trim(encodeURI($("#id").val()));
      var status=$.trim(encodeURI($("#status").val()));
      var resolution=$.trim(encodeURI($("#resolution").val()));
      var pick = "46";

      if(status == ""){
          $.notify("Status is null ","error");                           
          $("#datareact").attr("disabled", false);
      } else{
            var fd = new FormData();    
            fd.append('id', id);         
            fd.append('status', status); 
            fd.append('resolution', resolution); 
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
                             setTimeout(function() { location.href="ITConcern"; }, 2000);
                        } else {
                            $.notify("Problem Encountered Upon Request","error");                           
                            $("#datareact").attr("disabled", false);
                        }                       
                        return false;

                }
            });    
      }

    });
</script>


