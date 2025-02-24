<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = $_GET['id'];
    $fetchdata = new admin_creation();

    $sql=$fetchdata->getEmployeeInformation($id);
    while($row=mysqli_fetch_array($sql)){ 
?>
<style>


.image--cover {
  width: 150px;
  height: 150px;
  border-radius: 75%;

  object-fit: cover;
  object-position: center left;
}
</style>
<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Information</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php if($row['status'] == 'Active'){?>
                    <li> <button type='button' id='<?php echo $id;?>' class='deact_btn  btn-danger btn-sm mr-1'  title='Edit Record'><i class='fa fa-times mr-1' >Deactivate</i> </button></li>
                <?php } else { ?> 
                    <li> <button type='button' id='<?php echo $id;?>' class='react_btn  btn-success btn-sm  mr-1'  title='Edit Record'><i class='fa fa-check mr-1' >Activate</i> </button></li>
                <?php } ?>
                <li> <button type='button' id='<?php echo $id;?>' class='reset_btn  btn-primary btn-sm  mr-1'  title='Edit Record'><i class='fa fa-edit mr-1' >Reset Password</i> </button></li>
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
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"> Profile </a></li>
                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab"> Documents </a></li>
                        <li class="nav-item"><a class="nav-link" href="#leave" data-toggle="tab"> Leave Count </a></li>
                    </ul>
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <!-- /.Profile -->
                  <div class="active tab-pane" id="profile">
                   
                      <div class="card card-primary card-outline some_images" >
                        <div class="card-body box-profile">
                          <div class="row" >
                            <div class="col-sm-4" >
                              <center>
                            
                                <?php if($fetchdata->getProfilePic($id) != "") {?>
                                  <img src="<?php echo $fetchdata->getProfilePic($id); ?>" alt="Avatar" class="image--cover" >  
                                <?php } else {?>
                                  <img src="profile_pic\normal.jpg" alt="Avatar" class="image--cover" >
                                <?php }?>


                                  
                              </center>
                            </div>
                            <div class="col-sm-8">
                              <center>
                                    <h1><b>
                                        <span style="color: #1E3F66;"><?php echo $id; ?> </span>
                                        <?php echo$row['Lastname'];?>, 
                                        <?php echo$row['Firstname'];?>
                                        <?php echo$row['Middlename'];?>
                                    </b></h1>
                                    <h4><b><?php echo $row['position'];?></b></h4>    
                                    <h4><b> <?php echo$row['department'];?></b></h4>    
                              </center>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row" hidden>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Employee ID</label>
                            <input type="text" class="form-control" id="emp_id" placeholder="Enter Employee ID Number" value="<?php echo $id; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Position</label>
                            <input list="positions"  class="form-control" id="position" placeholder="Enter Employee Position" value="<?php echo $row['position'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Department</label>
                            <input list="departments"  class="form-control" id="department" placeholder="Enter Employee Department" value="<?php echo$row['department'];?>" disabled>
                        </div>
                      </div>
                      <div class="row" hidden>
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
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Employee Email" value="<?php echo $row['email'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >

                            <label>Contact Number</label>
                            <input type="text" class="form-control" id="contact" placeholder="Enter Employee Contact Number" value="<?php echo $row['contact'];?>" disabled>
                            
                          </div>
                        </div>
                        <div class="col-sm">

                          <label>Birthday</label>
                            <input type="text" class="form-control" id="birthday" placeholder="Enter Employee Birthday" value="<?php echo date("F d Y", strtotime($row['birthday']));?>" disabled>


                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                       
                          <div class="form-group" >
                                           
                            <label>Employee Status (Probationary / Regular)</label>
                            <input type="text" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_2'];?>" disabled>
                          </div>

                        </div>
                        <div class="col-sm">
                            <label>Payroll Type (Monthly / Daily)</label>
                            <input type="text" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_1'];?>" disabled>
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
                        <label>Regularization Date</label>
                        <input type="text" class="form-control" id="reg_date" placeholder="Enter Regularization Date" value="<?php if($row['reg_date']==''){echo "";}else {echo date("F d Y", strtotime($row['reg_date']));}?>" disabled>
                    </div>

                    <div class="col-sm">
                        <label>End Date Date</label>
                        <input type="text" class="form-control" id="reg_date" placeholder="Enter End Date" value="<?php if($row['endDate']==''){echo "";}else {echo date("F d Y", strtotime($row['endDate']));}?>" disabled>
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
                            <label>TIN </label>
                            <input type="text" class="form-control" id="TIN" placeholder="Enter TIN " value="<?php echo$row['TIN'];?>" disabled>
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
                            <input type="text" class="form-control" id="dependent3" placeholder="Enter Dependent Name" value="<?php echo$row['dependent3'];?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 3 Birthday</label>
                            <input type="text" class="form-control" id="dependent3_bday" placeholder="Enter Dependent Birthday" value="<?php                            if($row['dependent3_bday'] == ''){
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

                  <!-- /.Documents -->
                  <div class="tab-pane" id="documents">
                    <div class="card-body">
                    <button type="button" class="btn_documents btn btn-primary float-sm-right" id='<?php echo $id;?>' > Upload Documents </button>
                      <br><br>


                      <table id="example0" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="text-align:center;">Document </th>
                          <th style="text-align:center;">Description</th>                                  
                          <th style="text-align:center;">Status</th>                           
                          <th style="text-align:center;">Action</th> 
                        </tr>
                        </thead>

                        <tbody>
                          <?php
                              $sql=$fetchdata->selectDocumentEmployee($id);
                              while($row1=mysqli_fetch_array($sql)){ ?>
                              <tr>
                                  <td style="text-align:center;"><?php echo htmlentities($row1['documentType']);?></td>
                                  <td style="text-align:center;"><?php echo htmlentities($row1['document_description']);?></td>
                                  <td style="text-align:center;"><?php echo htmlentities($row1['status']);?></td>
                                  <td style="text-align:center;">
                                        
                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='edit_btn  btn-warning btn-sm  mr-1'  title='Edit Record'><i class="fa fa-pen mr-1"> Edit</i> </button>
                                      
                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='remove_btn  btn-danger btn-sm  mr-1'  title='Delete Record'><i class="fa fa-search-plus mr-1"> Delete</i> </button>

                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='delete_btn  btn-info btn-sm  mr-1'  title='View Record'><i class="fa fa-search-plus mr-1"> View</i> </button>

                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='download_btn  btn-primary btn-sm  mr-1'  title='Download Record'><i class='fa fa-download mr-1' > Download</i> </button>

                                  </td>                                                 
                              </tr>
                          <?php } ?>
                        </tbody>
                        
                        <tfoot>
                          <tr>
                            <th style="text-align:center;">Document </th>
                            <th style="text-align:center;">Description</th>                                 
                          <th style="text-align:center;">Status</th>                                     
                            <th style="text-align:center;">Action</th> 
                          </tr>
                        </tfoot>
                      </table>

                      </div>                  
                  </div>

                  <!-- /.Leaves -->
                  <div class="tab-pane" id="leave">
                    <div class="card-body">
 

                      <button type="button" class="btn_addleave btn btn-primary float-sm-right mr-1" id='<?php echo $id;?>' > Add Leave </button>
                            
                         <button type="button" class="btn_generatePDF btn btn-link float-sm-right mr-1" id='<?php echo $id;?>' > Generate File </button>
                      
                      <br>   <br>   <br>
                      <table id="example0" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;">Description </th>
                            <th style="text-align:center;">Total Leave Credit</th>                            
                            <th style="text-align:center;">Total Earned</th>
                            <th style="text-align:center;">Used</th> 
                            
                            <th style="text-align:center;">Pending</th> 
                            <th style="text-align:center;">Remaining</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $sql = $fetchdata->selectLeaves($id);
                           while($row2=mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td style="text-align:center;"><?php echo htmlentities($row2['leave_description']);?></td>          
                                <td style="text-align:center;"><?php echo htmlentities($row2['leave_count'])?></td> 
                                <td style="text-align:center;"><?php echo $earned = $fetchdata->checkifearnable($row2['id']);?></td>
                                <td style="text-align:center;"><?php echo $fetchdata->checkifUsed($row2['leave_description'], $id);?> </td> 
                                <td style="text-align:center;"><?php echo $fetchdata->checkPendingLeave($row2['leave_description'], $id);?></td>
                                <td style="text-align:center;"><?php echo $fetchdata->checkRemainingLeave($row2['leave_description'],$id, $earned);?></td>                        
                             <tr>     
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
                    <h5 class="modal-title" id="staticBackdropLabel">System Document</h5>
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
                          </div>

                          <div class="form-group">
                              <label>Upload File</label>
                              <input type="file" name="myfile" id="myfile" class="form-control"> 
                          </select>
                  
                          <div class="form-group">
                            <label for="cars">Status</label>
                            <input list="browser" type="text" class="form-control" id="Status" placeholder="Enter Status">            
                            <datalist id="browser">
                                  <option value="Viewable">
                                  <option value="Non-viewable">
                            </datalist>
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

   
            <!-- Start Edit Modal -->
<div class="modal fade documodal" id="documodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!-- End Edit Modal -->
<?php include 'includes/footer.php'; ?>
 <div class="modal fade" id="removeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remove Modal </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label for="cars">Do You want to remove ?  </label>
     
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="removerBTNremove">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

  <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="dataModalLabel">System Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div id="modalContent"></div>
              </div>
              <div class="modal-footer">
                          <button type="button" class="btn btn-primary createAccount" id="btnEditDocuments">Save</button>   
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div> 


<script>


    var id="";
    $(document).on('click','.btn_addleave',function(){ 
        id=$(this).attr("id");
        location.href = "accountAddLeave?id=" + id + " "; 
    });



    $(document).on('click','.btn_generatePDF',function(){ 
        id=$(this).attr("id");
        window.open("GenerateFileLeave?id=" + id + " ");
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




    $(document).on('click','.remove_btn',function(){ 
        id=$(this).attr("id");
        $("#removeModal").modal("show");
    });




    $(document).on('click','.btn_documents',function(){ 
        id=$(this).attr("id");
        $("#fileDocumentsModal").modal("show");
    });

    $(document).on('click','#removerBTNremove',function(){ 
        $("#removerBTNremove").attr("disabled", true); 
        // alert("easy lang maam bell wala pa");
        var pick = '54';      
        var fd = new FormData();    
        fd.append('pick', pick);
        fd.append('id', id);    

            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);       

                        if($.trim(result)=="1"){
                            $.notify("Deleted Successfull", "success"); 
                            setTimeout(function() { location.reload(); }, 2000);
                        }else{
                            $.notify("Problem Encountered", "error");
                                    $("#removerBTNremove").attr("disabled", false); 
                        }
                }
            }); 
    });


    $(document).on('click','#uplodeData',function(){
        $("#uplodeData").attr("disabled", true); 
        var documentTypes=$.trim(encodeURI($("#documentTypes").val()));
        var myfile = $('#myfile')[0].files;

        
        var status=$.trim(encodeURI($("#Status").val()));

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

            fd.append('status', status);

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
                            setTimeout(function() { 


                               location.reload();

                            // redirectToPageWithHash('/hris/admin/pages/accountsViewEmployees', { id: '699' }, 'documents');
                             }, 2000);
                        }else{
                            $.notify(result, "error");
                                    $("#uplodeData").attr("disabled", false); 
                        }
                }
            }); 
        }
    });

    $(document).on('click','.download_btn',function(){ 
        id=$(this).attr("id");
        location.href = "downloadfile?id=" + id + " "; 
    });


    $(document).on('click','.delete_btn',function(){ 
        id=$(this).attr("id");
        // alert(id);
        // location.href = "viewfile?id=" + id + " "; 
        window.open("viewfile?id=" + id );
    });

    $(document).on('click','.edit_btn',function(){ 
        var pick = "56";
        id=$(this).attr("id");
        var fd = new FormData();    
        fd.append('pick', pick);
        fd.append('id', id);  

        $.ajax({
            url: "codes/admin_control.php",
            data: fd,
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'JSON', // Expect JSON response
            success: function(response) {

                console.log(response);

             var modalContent = '' +

              '<div class="form-group" hidden>' +
              '<input type="text" class="form-control" id="documentID" placeholder="Enter username" value="'+response[0].id+'">' +
                '</div>' +     


                              '<div class="form-group">' +

                                    '<label for="cars">Document Name</label>' +
              '<input type="text" class="form-control" id="documentName" placeholder="Enter DocumentName" value="'+response[0].document_description+'">' +
                '</div>' +       



      '<div class="form-group">' +
      '<label for="cars">Document type</label>' +
      '<select name="documents" id="documentTypes1" class="form-control documents">' +

        '<option value="' + response[0].documentType + '">' + response[0].documentType + '</option>' ;

  <?php
      $sql = $fetchdata->selectDocument();
      while($row = mysqli_fetch_array($sql)) {
          echo 'modalContent += \'<option value="' . $row['description'] . '">' . htmlentities($row['description']) . '</option>\';';
      }
  ?>

  modalContent += '</select>' +
      '</div>' +


        '<div class="form-group">' +
          '<label for="cars">Status</label>' +
          '<input list="browsers" type="text" class="form-control" id="documentStatus" placeholder="Enter Status" value="'+response[0].status+'">' +

          '<datalist id="browsers">' +
              '<option value="Viewable">'  +
              '<option value="Non-viewable">'+
            '</datalist>' +

        '</div>' 

;  



                  $('#modalContent').html(modalContent);
                  $('#dataModal').modal('show');
      
        },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr, status, error);
            }
        });
    });

    $(document).on('click','#btnEditDocuments',function(){ 

          var pick = '57';
          var documentID=$.trim(encodeURI($("#documentID").val()));
          var documentName=$.trim(encodeURI($("#documentName").val()));
          var documentTypes1=$.trim(encodeURI($("#documentTypes1").val()));

          var status=$.trim(encodeURI($("#documentStatus").val()));
          
          var fd = new FormData();  
          fd.append('pick',pick);
          fd.append('documentID',documentID);
          fd.append('documentName',documentName);
          fd.append('documentTypes1',documentTypes1);
          fd.append('status',status);


                $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);       

                        if($.trim(result)==1){
                            $.notify("Document Editted Successfully", "success"); 
                            setTimeout(function() { location.reload(); }, 2000);
                        }else{
                            $.notify(result, "error");
                                    $("#uplodeData").attr("disabled", false); 
                        }
                }
            }); 

    });

    

</script>




