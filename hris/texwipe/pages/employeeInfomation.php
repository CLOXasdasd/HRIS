<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = $_SESSION['emp_id'];
    $fetchdata = new admin_creation();

    $sql=$fetchdata->getEmployeeInformation($id);
    while($row=mysqli_fetch_array($sql)){ 
?>

<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Information</h1>
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
                   

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Employee ID</label>
                            <input type="text" class="form-control" id="emp_id" placeholder="Enter Employee ID Number" value="<?php echo $id; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Position</label>
                            <input list="positions"  class="form-control" id="position" placeholder="Enter Employee Position" value="<?php echo$row['position'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Department</label>
                            <input list="departments"  class="form-control" id="department" placeholder="Enter Employee Department" value="<?php echo$row['department'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Lastname</label>
                            <input type="text" class="form-control" id="Lastname" placeholder="Enter Employee Lastname" value="<?php echo$row['Lastname'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Firstname</label>
                            <input type="text" class="form-control" id="Firstname" placeholder="Enter Employee First Name" value="<?php echo$row['Firstname'];?>" disabled >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Middlename</label>
                            <input type="text" class="form-control" id="Middlename" placeholder="Enter Employee Middle Name" value="<?php echo$row['Middlename'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Age</label>
                            <input type="tex" class="form-control" id="age" placeholder="Enter Employee Age" value="<?php echo  $fetchdata->bday($row['birthday']) ;?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Civil Status</label>
                            <input type="text" class="form-control" id="age" placeholder="Enter Employee Age" value="<?php echo $row['civil_status'];?>" disabled>
                           
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Gender</label>
                            <input type="text" class="form-control" id="age" placeholder="Enter Employee Age" value="<?php echo $row['gender'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Date Hired</label>
                            <input type="text" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo date("F d Y", strtotime($row['date_hired']));?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Employee Status (Monthly / Daily)</label>
                            <input type="text" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_1'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Employee Status (Probationary / Regular)</label>
                            <input type="text" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_2'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Birthday</label>
                            <input type="text" class="form-control" id="birthday" placeholder="Enter Employee Birthday" value="<?php echo date("F d Y", strtotime($row['birthday']));?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" id="contact" placeholder="Enter Employee Contact Number" value="<?php echo $row['contact'];?>" disabled>
                        </div>
                      </div>

                      <hr>
                     
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Educational Attainment/Course</label>
                            <input type="text" class="form-control" id="course" placeholder="Enter Educational Attainment"  value="<?php echo$row['course'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>School last attended and Place</label>
                            <input type="text" class="form-control" id="school" placeholder="Enter School last attended"  value="<?php echo$row['school'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>EMERGENCY Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" placeholder="Enter EMERGENCY Contact Person"  value="<?php echo$row['contact_person'];?>" disabled>
                          </div>
                        </div>
                       
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>EMERGENCY Contact Number</label>
                             <input type="text" class="form-control" id="contact_person_num" placeholder="Enter EMERGENCY Contact Number" value="<?php echo$row['contact_person_num'];?>" disabled >                   
                          </div>
                        </div>

                        <div class="col-sm">
                            <label>Relationship with EMERGENCY Contact Person</label>
                             <input type="text" class="form-control" id="contact_relation" placeholder="Enter Relationship with EMERGENCY Contact Person" value="<?php echo$row['contact_relation'];?>" disabled >               
                        </div>
                      </div>

                      <hr>

                      <div class="row">

                        <div class="col-sm">
                          <div class="form-group" >
                            <label>SSS Number</label>
                            <input type="text" class="form-control" id="sss" placeholder="Enter SSS number" value="<?php echo$row['sss'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>TIN Number</label>
                            <input type="text" class="form-control" id="TIN" placeholder="Enter TIN number" value="<?php echo$row['TIN'];?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>PHILHEALTH Number</label>
                            <input type="text" class="form-control" id="philhealth" placeholder="Enter PHILHEALTH Number" value="<?php echo$row['philhealth'];?>" disabled>
                          </div>
                        </div>
                       
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>PAG-IBIG  Number</label>
                             <input type="text" class="form-control" id="pagibig" placeholder="Enter EMERGENCY Contact Number" value="<?php echo$row['pagibig'];?>" disabled>                   
                          </div>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Spouse</label>
                            <input type="text" class="form-control" id="spouse" placeholder="Enter Spouse Name" value="<?php echo $row['spouse'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Spouse Birthday</label>
                            <input type="text" class="form-control" id="spouse_bday" placeholder="Enter Spouse Birthday" value="<?php
                                if($row['spouse_bday'] == ''){
                                    echo "";
                                } else {
                                    echo date("F d Y", strtotime($row['spouse_bday']));
                                }
                               
                            ?>" disabled>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 1</label>
                            <input type="text" class="form-control" id="dependent1" placeholder="Enter Dependent Name" value="<?php echo $row['dependent1'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 1 Birthday</label>
                            <input type="text" class="form-control" id="dependent1_bday" placeholder="Enter Dependent Birthday" value="<?php 
                                if($row['dependent1_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("F d Y", strtotime($row['dependent1_bday']));
                                } ?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 2</label>
                            <input type="text" class="form-control" id="dependent2" placeholder="Enter Dependent Name" value="<?php echo$row['dependent2'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 2 Birthday</label>
                            <input type="text" class="form-control" id="dependent2_bday" placeholder="Enter Dependent Birthday" value="<?php                            if($row['dependent2_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("F d Y", strtotime($row['dependent2_bday']));
                                } ?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 3</label>
                            <input type="text" class="form-control" id="dependent3" placeholder="Enter Dependent Name" value="<?php echo $row['dependent3'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 3 Birthday</label>
                            <input type="text" class="form-control" id="dependent3_bday" placeholder="Enter Dependent Birthday" value="<?php if($row['dependent3_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("F d Y", strtotime($row['dependent3_bday']));
                                } ?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 4</label>
                            <input type="text" class="form-control" id="dependent4" placeholder="Enter Dependent Name" value="<?php echo$row['dependent4'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 4 Birthday</label>
                            <input type="text" class="form-control" id="dependent4_bday" placeholder="Enter Dependent Birthday" value="<?php    
                                if($row['dependent4_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("F d Y", strtotime($row['dependent4_bday']));
                                } ?>" disabled>
                        </div>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Present Address</label>
                            <input type="text" class="form-control" id="present_address" placeholder="Enter Present Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" value="<?php echo$row['present_address'];?>" disabled>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Permanent Address</label>
                            <input type="text" class="form-control" id="permanent_address" placeholder="Enter Permanent Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" value="<?php echo$row['permanent_address'];?>" disabled>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
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
                        <label>Do you want to deactivate password?</label>
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
                        <label>Do you want to Reactive account password?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datareact">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- Reset Passord  -->
    <div class="modal fade" id="resetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
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

    <!-- Reset Passord  -->
    <div class="modal fade" id="fileDocumentsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label for="cars">Document type</label>
                        <select name="documents" id="documentTypes"  class="form-control .documents" >         
                            <?php
                                $sql=$fetchdata->selectDocument();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                   <option value="<?php echo $row['description'];?>"><?php echo htmlentities($row['description']);?></option>
                                
                            <?php } ?>
                         </select>

                          <div class="form-group">
                              <label>Upload File</label>
                              <input type="file" name="myfile" id="myfile" class="form-control"> 
                          </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="uplodeData">Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->
<?php include 'includes/footer.php'; ?>

<script>
    var id="";
    $(document).on('click','.btn_addleave',function(){ 
        id=$(this).attr("id");
        location.href = "accountAddLeave?id=" + id + " "; 
    });

    $(document).on('click','.deact_btn',function(){ 
        id=$(this).attr("id");
        $("#deactivateModal").modal("show");
    });

    $(document).on('click','.react_btn',function(){ 
        id=$(this).attr("id");
        $("#reactivateModal").modal("show");
    });

    $(document).on('click','.reset_btn',function(){ 
        id=$(this).attr("id");
        $("#resetModal").modal("show");
    });

    $(document).on('click','#datadeact',function(){ 
          datadeact(id);
    });

    $(document).on('click','#datareact',function(){ 
          datareact(id);
    });

    $(document).on('click','#datareset',function(){ 
          datareset(id);
    });

    function datadeact(id){
        $("#datadeact").attr("disabled", true);   
        var id=id;
        var pick = '15';
        var fd = new FormData();    
        fd.append('emp_id', id);
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
                        $("#datadeact").attr("disabled", false);   
                    }
                    return false;
            }
        });
    }

    function datareact(id){
        $("#datareact").attr("disabled", true);   
        var id=id;
        var pick = '16';
        var fd = new FormData();    
        fd.append('emp_id', id);
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
                        $.notify(" Account Activated ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#datareact").attr("disabled", false);   
                    }
                    return false;
            }
        });
    }

    function datareset(id){
        $("#datareset").attr("disabled", true);   
        var id=id;
        var pick = '17';
        var fd = new FormData();    
        fd.append('emp_id', id);
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
                        $.notify(" Account Password Changed ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#datareset").attr("disabled", false);   
                    }
                    return false;
            }
        });
    }    

    $(document).on('click','.btn_documents',function(){ 
        id=$(this).attr("id");
        $("#fileDocumentsModal").modal("show");
    });

    $(document).on('click','#uplodeData',function(){
        $("#uplodeData").attr("disabled", true); 
        var documentTypes=$.trim(encodeURI($("#documentTypes").val()));
        var myfile = $('#myfile')[0].files;
        // var myfile=$('#myfile').prop("files")[0];
        var pick = '21';


        if(myfile == ""){
          $.notify("Please upload a file", "error"); 
          $("#uplodeData").attr("disabled", false);         
        } else {
            var fd = new FormData();    
            fd.append('emp_id', id);
            fd.append('documentTypes', documentTypes);
            fd.append('myfile', myfile[0]);
            fd.append('pick', pick);


            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);       
             
                        if($.trim(result)=="Uploaded Successfully"){
                            $.notify(result, "success"); 
                            setTimeout(function() { location.reload(); }, 2000);
                        }else{
                            $.notify(result, "error");
                            $("#datareset").attr("disabled", false);   
                        }
                }
            }); 
        }
    });

    $(document).on('click','.download_btn',function(){ 
        id=$(this).attr("id");
        location.href = "downloadfile?id=" + id + " "; 
    });
</script>




