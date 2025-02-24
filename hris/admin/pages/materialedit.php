<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = $_GET['id'];
    $fetchdata = new admin_creation();

    $sql=$fetchdata->selectAllmaterialID($id);
    while($row=mysqli_fetch_array($sql)){ 
?>

<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Materials </h1>
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
                <h3 class="card-title"></h3>
              </div>

              <div class="card-body">
    
                    <div class="form-group" hidden >
                        <label> Date</label>
                        <input type="text" name="date_filed" id="id" class="form-control" value="<?php echo $id ;?>" >
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label> Date</label>
                                <input type="text" name="date_filed" id="id" class="form-control" value="<?php echo htmlentities(date("F d Y", $row['date_issued'])) ;?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Quantity</label>
                                <input type="number" name="date_filed" id="assetNum" class="form-control" value="<?php echo htmlentities($row['quantity']);?>" >
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Department</label>
                                <input list="departments" type="text" name="date_filed" id="location" class="form-control" value="<?php echo htmlentities($row['location']);?>" >
                                    <datalist id="departments">
                                      <?php
                                            $sql=$fetchdata->selectDepartment();
                                           while($row1=mysqli_fetch_array($sql)){ ?>
                                            <option value="<?php echo htmlentities($row1['dept_description']);?>">
                                      <?php } ?>
                                    </datalist>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span>Name</label>
                           
                                <select class="form-control" id="employee_id">
                                    <option value="<?php echo htmlentities($row['emp_id']);?>"  selected> <?php echo htmlentities($row['employee']);?></option>
                                    <?php
                                    $sql=$fetchdata->selectEmployeeAccounts();
                                    while($row1=mysqli_fetch_array($sql)){ ?>
                                        <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row['Firstname']?> </option>                                   
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Status</label>
                                <input list="statuses" type="text" name="status" id="status" class="form-control" value="<?php echo htmlentities($row['status']);?>">
                                 <datalist id="statuses">
                                    <option value="Approve">
                                    <option value="Pending">
                                    <option value="Remove">
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label>Item Description</label>
                        <textarea  class="form-control" id="description" placeholder="Enter Description" ><?php echo htmlentities($row['item_desc']);?></textarea>
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
      var assetNum=$.trim(encodeURI($("#assetNum").val()));
      var location=$.trim(encodeURI($("#location").val()));
      var employee_id=$.trim(encodeURI($("#employee_id").val()));
      var status=$.trim(encodeURI($("#status").val()));
      var description=$.trim(encodeURI($("#description").val()));
      var pick = "50";

      if(assetNum== "" ||location== "" ||employee_id== "" ||status== ""){
          $.notify("Inportant field is null ","error");                           
          $("#datareact").attr("disabled", false);
      } else{
            var fd = new FormData();    
            fd.append('id', id);      
            fd.append('Asset', assetNum); 
            fd.append('location', location); 
            fd.append('employee_id', employee_id); 
            fd.append('description', description); 
            fd.append('status', status); 
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                        if($.trim(result)==1){
                            $.notify("Request Updated Successfully ","success");  
                            setTimeout(function() { window.location="material"; }, 2000);
                            
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


