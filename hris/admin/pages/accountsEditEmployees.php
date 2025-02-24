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
            <h1>Edit Employee Information</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
 
                <li> <button type='button' id='<?php echo $id;?>' class='react_btn  btn-success btn-sm  mr-1'  title='Edit Record'><i class='fa fa-check mr-1' >Save</i> </button></li>
                  <li> <button type='button' id='<?php echo $id;?>' class='download_btn  btn-danger btn-sm  mr-1'  title='Edit Record'><i class='fa fa-times mr-1' >Back</i> </button></li>
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
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile </a></li>
                    </ul>
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <!-- /.Profile -->


                  <div class="active tab-pane" id="profile">
                    <?php //if ( $id != '699' ) {?>
                      <div class="card card-primary card-outline some_images" >
                        <div class="card-body box-profile">
                           <div class="form-group">
                              <label>Upload File</label>
                              <input type="file" name="myfile" id="myfile" class="form-control" value="<?php echo $row['image'];?>">
                          </div>
                        </div>
                      </div>
                        
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
                            <input list="positions"  class="form-control" id="position" placeholder="Enter Employee Position" value="<?php echo$row['position'];?>"  >
                              <datalist id="positions">
                                  <?php
                                      $sql=$fetchdata->selectPosition();
                                      while($row1=mysqli_fetch_array($sql)){ ?>
                                        <option value="<?php echo htmlentities($row1['position_desc']);?>">
                                  <?php } ?>
                              </datalist>
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Department</label>
                            <input list="departments"  class="form-control" id="department" placeholder="Enter Employee Department" value="<?php echo$row['department'];?>"  >
                            <datalist id="departments">
                                <?php
                                      $sql=$fetchdata->selectDepartment();
                                     while($row2=mysqli_fetch_array($sql)){ ?>
                                      <option value="<?php echo htmlentities($row2['dept_description']);?>">
                                <?php } ?>
                            </datalist>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Lastname</label>
                            <input type="text" class="form-control" id="Lastname" placeholder="Enter Employee Lastname" value="<?php echo$row['Lastname'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Firstname</label>
                            <input type="text" class="form-control" id="Firstname" placeholder="Enter Employee First Name" value="<?php echo$row['Firstname'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Middlename</label>
                            <input type="text" class="form-control" id="Middlename" placeholder="Enter Employee Middle Name" value="<?php echo$row['Middlename'];?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Age</label>
                            <input type="tex" class="form-control" id="age" placeholder="Enter Employee Age" value="<?php echo $row['age'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Civil Status</label>
                            <input list="civils" type="text" class="form-control" id="civil_status" placeholder="Enter Employee Age" value="<?php echo $row['civil_status'];?>"  >
                             <datalist id="civils">
                                <option value="Single">
                                <option value="Married">
                                <option value="Widowed">
                                <option value="Separated ">
                                <option value="Divorced">
                            </datalist>
                           
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Gender</label>
                            <input list="genders" type="text" class="form-control" id="gender" placeholder="Enter Employee Age" value="<?php echo $row['gender'];?>"  >
                             <datalist id="genders">
                                <option value="Male"  >Male</option>                           
                                <option value="Female"  > Female </option>
                            </datalist>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">

                                                <div class="form-group" >
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Employee Email" value="<?php echo $row['email'];?>" >
                      </div>
                          
                        </div>
                        <div class="col-sm">
                         <div class="form-group" >
                            <label>Birthday</label>
                            <input type="date" class="form-control" id="birthday" placeholder="Enter Employee Birthday" value="<?php echo date("Y-m-d", strtotime($row['birthday']));?>"  >
                          </div>

                        </div>
                        <div class="col-sm">
                              <label>Contact Number</label>
                              <input type="text" class="form-control" id="contact" placeholder="Enter Employee Contact Number" value="<?php echo $row['contact'];?>"  >
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                            <label>First Approver</label>
                              <select name="cars" id="firstapprover" class="form-control">
                                <option value="<?php echo $row['firstapprover'];?>" selected><?php echo $fetchdata->selectApprover($row['firstapprover']);?></option>
                                <option value="" ><?php echo "";?></option>
                                <?php
                                      $sql=$fetchdata->selectAllapprover();
                                     while($r=mysqli_fetch_array($sql)){ ?>
                                      <option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>

                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Final Approver</label>
                              <select name="cars" id="finalapprover" class="form-control">
                                <option value="<?php echo $row['secondapprover'];?>" selected><?php echo $fetchdata->selectApprover($row['secondapprover']);?></option>
                                <option value="" ><?php echo "";?></option>
                                <?php
                                      $sql=$fetchdata->selectAllapprover();
                                     while($r=mysqli_fetch_array($sql)){ ?>
                                      <option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                                <?php } ?>
                              </select>
                          </div>  
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >

                            <label>Employee Status (Probationary / Regular)</label>
                            <input list="empstatus2s" type="text" class="form-control" id="emp_status_2" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_2'];?>"  >
                             <datalist id="empstatus2s">
                                <option value="Probationary"  >                      
                                <option value="Regular"  >
                            </datalist>
                            </div>
                        </div>

                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Payroll Type (Monthly / Daily)</label>
                            <input list="empstatus1s" type="text" class="form-control" id="emp_status_1" placeholder="Enter Employee Lastname" value="<?php echo $row['emp_status_1'];?>"  >
                              <datalist id="empstatus1s">
                                <option value="Monthly"  >                      
                                <option value="Daily"  >
                            </datalist>
                          </div>  
                        </div>
                      </div>
                  

                  <div class="row">

                    <div class="col-sm">
                        <div class="form-group" >
                            <label>Date Hired</label>
                            <input type="date" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" value="<?php echo date("Y-m-d", strtotime($row['date_hired']));?>"  >
                        </div>
                    </div>
                    <div class="col-sm">
                        <label>Regularization Date</label>
                        <input type="date" class="form-control" id="reg_date" placeholder="Enter Regularization Date" value="<?php  
                          if($row['reg_date'] == "" ){
                              echo "";
                          } else {
                              echo date("Y-m-d", strtotime($row['reg_date']));
                          }?>" >
                    </div>

                    <div class="col-sm">
                        <label>End Date</label>
                        <input type="date" class="form-control" id="endDate" placeholder="Enter End Date" value="<?php  
                          if($row['endDate'] == "" ){
                              echo "";
                          } else {
                              echo date("Y-m-d", strtotime($row['endDate']));
                          }?>" >
                    </div>

                  </div>
                      <hr>
                     
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Educational Attainment/Course</label>
                            <input type="text" class="form-control" id="course" placeholder="Enter Educational Attainment"  value="<?php echo$row['course'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>School last attended and Place</label>
                            <input type="text" class="form-control" id="school" placeholder="Enter School last attended"  value="<?php echo$row['school'];?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>EMERGENCY Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" placeholder="Enter EMERGENCY Contact Person"  value="<?php echo$row['contact_person'];?>"  >
                          </div>
                        </div>
                       
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>EMERGENCY Contact Number</label>
                             <input type="text" class="form-control" id="contact_person_num" placeholder="Enter EMERGENCY Contact Number" value="<?php echo$row['contact_person_num'];?>"  >                   
                          </div>
                        </div>

                        <div class="col-sm">
                            <label>Relationship with EMERGENCY Contact Person</label>
                             <input type="text" class="form-control" id="contact_relation" placeholder="Enter Relationship with EMERGENCY Contact Person" value="<?php echo$row['contact_relation'];?>"  >               
                        </div>
                      </div>

                      <hr>

                      <div class="row">

                        <div class="col-sm">
                          <div class="form-group" >
                            <label>SSS Number</label>
                            <input type="text" class="form-control" id="sss" placeholder="Enter SSS number" value="<?php echo$row['sss'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>TIN </label>
                            <input type="text" class="form-control" id="TIN" placeholder="Enter TIN " value="<?php echo$row['TIN'];?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>PHILHEALTH Number</label>
                            <input type="text" class="form-control" id="philhealth" placeholder="Enter PHILHEALTH Number" value="<?php echo$row['philhealth'];?>"  >
                          </div>
                        </div>
                       
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>PAG-IBIG  Number</label>
                             <input type="text" class="form-control" id="pagibig" placeholder="Enter EMERGENCY Contact Number" value="<?php echo$row['pagibig'];?>"  >                   
                          </div>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Spouse</label>
                            <input type="text" class="form-control" id="spouse" placeholder="Enter Spouse Name" value="<?php echo $row['spouse'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Spouse Birthday</label>
                            <input type="date" class="form-control" id="spouse_bday" placeholder="Enter Spouse Birthday" value="<?php
                                if($row['spouse_bday'] == ''){
                                    echo "";
                                } else {
                                    echo date("Y-m-d", strtotime($row['spouse_bday']));
                                }
                               
                            ?>"  >
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 1</label>
                            <input type="text" class="form-control" id="dependent1" placeholder="Enter Dependent Name" value="<?php echo $row['dependent1'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 1 Birthday</label>
                            <input type="date" class="form-control" id="dependent1_bday" placeholder="Enter Dependent Birthday" value="<?php 
                                if($row['dependent1_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("Y-m-d", strtotime($row['dependent1_bday']));
                                } ?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 2</label>
                            <input type="text" class="form-control" id="dependent2" placeholder="Enter Dependent Name" value="<?php echo$row['dependent2'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 2 Birthday</label>
                            <input type="date" class="form-control" id="dependent2_bday" placeholder="Enter Dependent Birthday" value="<?php                            if($row['dependent2_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("Y-m-d", strtotime($row['dependent2_bday']));
                                } ?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 3</label>
                            <input type="text" class="form-control" id="dependent3" placeholder="Enter Dependent Name" value="<?php echo$row['dependent3'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 3 Birthday</label>
                            <input type="date" class="form-control" id="dependent3_bday" placeholder="Enter Dependent Birthday" value="<?php                            if($row['dependent3_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("Y-m-d", strtotime($row['dependent3_bday']));
                                } ?>"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Dependent 4</label>
                            <input type="text" class="form-control" id="dependent4" placeholder="Enter Dependent Name" value="<?php echo$row['dependent4'];?>"  >
                          </div>
                        </div>
                        <div class="col-sm">
                            <label>Dependent 4 Birthday</label>
                            <input type="date" class="form-control" id="dependent4_bday" placeholder="Enter Dependent Birthday" value="<?php    
                                if($row['dependent4_bday'] == ''){
                                    echo "";
                                } else {
                                   echo date("Y-m-d", strtotime($row['dependent4_bday']));
                                } ?>"  >
                        </div>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Present Address</label>
                            <input type="text" class="form-control" id="present_address" placeholder="Enter Present Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" value="<?php echo$row['present_address'];?>"  >
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group" >
                            <label>Permanent Address</label>
                            <input type="text" class="form-control" id="permanent_address" placeholder="Enter Permanent Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" value="<?php echo$row['permanent_address'];?>"  >
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
      <?php //} ?>
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
                        <label>Do you want to Save editted account ?</label>
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

<script>
    var id="";
    $(document).on('click','.react_btn',function(){ 
        $("#reactivateModal").modal("show");
    });

    $(document).on('click','#datareact',function(){ 
          datadeact();
    });

    function datadeact(){
      $("#datadeact").attr("disabled", true);   
      var myfile = $('#myfile')[0].files;
      var emp_id=$.trim(encodeURI($("#emp_id").val()));
      var id= emp_id;
      var position=$.trim(encodeURI($("#position").val()));
      var department=$.trim(encodeURI($("#department").val()));
      var Lastname=$.trim(encodeURI($("#Lastname").val()));
      var Firstname=$.trim(encodeURI($("#Firstname").val()));
      var Middlename=$.trim(encodeURI($("#Middlename").val()));   
      var date_hired=$.trim(encodeURI($("#date_hired").val()));
      var emp_status_1=$.trim(encodeURI($("#emp_status_1").val()));
      var emp_status_2=$.trim(encodeURI($("#emp_status_2").val()));
      var age=$.trim(encodeURI($("#age").val()));
      var civil_status=$.trim(encodeURI($("#civil_status").val()));
      var gender=$.trim(encodeURI($("#gender").val()));
      var birthday=$.trim(encodeURI($("#birthday").val()));
      var contact=$.trim(encodeURI($("#contact").val()));
      var course=$.trim(encodeURI($("#course").val()));
      var school=$.trim(encodeURI($("#school").val()));
      var contact_person=$.trim(encodeURI($("#contact_person").val()));
      var contact_person_num=$.trim(encodeURI($("#contact_person_num").val()));
      var contact_relation=$.trim(encodeURI($("#contact_relation").val()));
      var sss=$.trim(encodeURI($("#sss").val()));
      var TIN=$.trim(encodeURI($("#TIN").val()));
      var philhealth=$.trim(encodeURI($("#philhealth").val()));
      var pagibig=$.trim(encodeURI($("#pagibig").val()));
      var spouse=$.trim(encodeURI($("#spouse").val()));
      var spouse_bday=$.trim(encodeURI($("#spouse_bday").val()));
      var dependent1=$.trim(encodeURI($("#dependent1").val()));
      var dependent1_bday=$.trim(encodeURI($("#dependent1_bday").val()));
      var dependent2=$.trim(encodeURI($("#dependent2").val()));
      var dependent2_bday=$.trim(encodeURI($("#dependent2_bday").val()));
      var dependent3=$.trim(encodeURI($("#dependent3").val()));
      var dependent3_bday=$.trim(encodeURI($("#dependent3_bday").val()));
      var dependent4=$.trim(encodeURI($("#dependent2").val()));
      var dependent4_bday=$.trim(encodeURI($("#dependent4_bday").val()));
      var present_address=$.trim(encodeURI($("#present_address").val()));
      var permanent_address=$.trim(encodeURI($("#permanent_address").val()));
      var email=$.trim(encodeURI($("#email").val()));
      var reg_date=$.trim(encodeURI($("#reg_date").val()));
      var endDate=$.trim(encodeURI($("#endDate").val()));

      var firstapprover=$.trim(encodeURI($("#firstapprover").val()));
      var finalapprover=$.trim(encodeURI($("#finalapprover").val()));



      var pick = '41';

        if(emp_id == "" ||Lastname == "" ||Firstname == "" ||Middlename == "" ||date_hired == "" ||emp_status_1 == "" ||emp_status_2 == "" ){
            $.notify(" Some Fields Are Empty ","warning");  
            $("#datadeact").attr("disabled", false); 
        } else { 
            var fd = new FormData();  

                          fd.append('firstapprover',firstapprover);
            fd.append('finalapprover',finalapprover);

            fd.append('emp_id',emp_id);
            fd.append('position',position);
            fd.append('department',department);
            fd.append('Lastname',Lastname);
            fd.append('Firstname',Firstname);
            fd.append('Middlename',Middlename);
            fd.append('date_hired',date_hired);
            fd.append('emp_status_1',emp_status_1);
            fd.append('emp_status_2',emp_status_2);
            fd.append('age',age);
            fd.append('civil_status',civil_status);
            fd.append('gender',gender);
            fd.append('birthday',birthday);
            fd.append('contact',contact);
            fd.append('course',course);
            fd.append('school',school);
            fd.append('contact_person',contact_person);
            fd.append('contact_person_num',contact_person_num);
            fd.append('contact_relation',contact_relation);
            fd.append('sss',sss);
            fd.append('TIN',TIN);
            fd.append('philhealth',philhealth);
            fd.append('pagibig',pagibig);
            fd.append('spouse',spouse);
            fd.append('spouse_bday',spouse_bday);
            fd.append('dependent1',dependent1);
            fd.append('dependent1_bday',dependent1_bday);
            fd.append('dependent2',dependent2);
            fd.append('dependent2_bday',dependent2_bday);
            fd.append('dependent3',dependent3);
            fd.append('dependent3_bday',dependent3_bday);
            fd.append('dependent4',dependent4);
            fd.append('dependent4_bday',dependent4_bday);
            fd.append('present_address',present_address);
            fd.append('permanent_address',permanent_address);
            fd.append('email',email);
            fd.append('reg_date',reg_date);
                        fd.append('endDate',endDate);
            fd.append('myfile', myfile[0]);
            fd.append('pick',pick);           
            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                  console.log(result); 
                  if($.trim(result)==1){
                    $.notify("Account Successfully Edited","success");   
                    setTimeout(function() { location.href = "accountsViewEmployees?id=" + id + " ";  }, 2000);
                  }else{
                    $.notify(result,"error");                           
                    $("#datadeact").attr("disabled", false); 
                  }                       
                }
            });
        }  
    }

    $(document).on('click','.download_btn',function(){ 
        id=$(this).attr("id");
         location.href = "accountsViewEmployees?id=" + id + " "; 
    });
</script>




