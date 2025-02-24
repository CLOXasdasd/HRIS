<title>Create Employee Account</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Details</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Create </a></li>
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
                <h3 class="card-title">Create Employee 201</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Employee ID</label>
                        <input type="text" class="form-control" id="emp_id" placeholder="Enter Employee ID Number" >
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Position</label>
                        <input list="positions"  class="form-control" id="position" placeholder="Enter Employee Position" >
                        <datalist id="positions">
                          <?php
                              $sql=$fetchdata->selectPosition();
                              while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($row['position_desc']);?>">
                          <?php } ?>
                        </datalist>
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Department</label>
                        <input list="departments"  class="form-control" id="department" placeholder="Enter Employee Department" >
                        <datalist id="departments">
                          <?php
                                $sql=$fetchdata->selectDepartment();
                               while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($row['dept_description']);?>">
                          <?php } ?>
                        </datalist>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Lastname</label>
                        <input type="text" class="form-control" id="Lastname" placeholder="Enter Employee Lastname" >
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Firstname</label>
                        <input type="text" class="form-control" id="Firstname" placeholder="Enter Employee First Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Middlename</label>
                        <input type="text" class="form-control" id="Middlename" placeholder="Enter Employee Middle Name" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter Employee Age" >
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Civil Status</label>
                        <select class="form-control" id="civil_status">
                            <option value=""  selected> Select Civil Status </option>

                            <option value="M"> M </option>  
                            <option value="M1"> M1 </option>  
                            <option value="M2"> M2 </option>  
                            <option value="M3"> M3 </option>  
                            <option value="M4"> M4 </option>  
                            <option value="S"> S </option>  
                            <option value="S1"> S1 </option>  
                            <option value="S2"> S2 </option>  
                            <option value="S3"> S3 </option>  
          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Gender</label>
                        <select class="form-control" id="gender">
                            <option value=""  selected> Select Gender </option>
                            <option value="Male"  >Male</option>                           
                            <option value="Female"  > Female </option>
                        </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Employee Email" >
                      </div>

                    </div>
                    <div class="col-sm">
                      <div class="form-group" >
                         <label>Birthday</label>
                        <input type="date" class="form-control" id="birthday" placeholder="Enter Employee First Name" >
                       
                      </div>
                    </div>
                    <div class="col-sm">
                         <label>Contact Number</label>
                        <input type="text" class="form-control" id="contact" placeholder="Enter Employee Contact Number" >
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-sm">
                      <div class="form-group" >
                          <label>Employee Status (Probationary / Regular)</label>
                        <select class="form-control" id="emp_status_2">
                            <option value=""  selected> Select Status </option>
                            <option value="Probationary"  >Probationary</option>                           
                            <option value="Regular"  > Regular </option>
                        </select>
                       
                      </div>
                    </div>
                    <div class="col-sm">
                       <label>Payroll Type (Monthly / Daily)</label>
                        <select class="form-control" id="emp_status_1">
                            <option value=""  selected> Select Status </option>
                            <option value="Monthly"  >Monthly</option>                           
                            <option value="Daily"  > Daily </option>
                        </select>
                        
                      
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Date Hired</label>
                        <input type="date" class="form-control" id="date_hired" placeholder="Enter Employee Lastname" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Regularization Date</label>
                        <input type="date" class="form-control" id="reg_date" placeholder="Enter Regularization Date" >
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contacts and Education</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <div class="row">

                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Educational Attainment/Course</label>
                        <input type="text" class="form-control" id="course" placeholder="Enter Educational Attainment" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>School last attended and Place</label>
                        <input type="text" class="form-control" id="school" placeholder="Enter School last attended" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>EMERGENCY Contact Person</label>
                        <input type="text" class="form-control" id="contact_person" placeholder="Enter EMERGENCY Contact Person" >
                      </div>
                    </div>
                   
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>EMERGENCY Contact Number</label>
                         <input type="text" class="form-control" id="contact_person_num" placeholder="Enter EMERGENCY Contact Number" >                   
                      </div>
                    </div>

                    <div class="col-sm">
                        <label>Relationship with EMERGENCY Contact Person</label>
                         <input type="text" class="form-control" id="contact_relation" placeholder="Enter Relationship with EMERGENCY Contact Person" >               
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Government Identification Number</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <div class="row">

                    <div class="col-sm">
                      <div class="form-group" >
                        <label>SSS Number</label>
                        <input type="text" class="form-control" id="sss" placeholder="Enter SSS number" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>TIN </label>
                        <input type="text" class="form-control" id="TIN" placeholder="Enter TIN " >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>PHILHEALTH Number</label>
                        <input type="text" class="form-control" id="philhealth" placeholder="Enter PHILHEALTH Number" >
                      </div>
                    </div>
                   
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>PAG-IBIG  Number</label>
                         <input type="text" class="form-control" id="pagibig" placeholder="Enter Pagibig Number" >                   
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dependents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Spouse</label>
                        <input type="text" class="form-control" id="spouse" placeholder="Enter Spouse Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Spouse Birthday</label>
                        <input type="date" class="form-control" id="spouse_bday" placeholder="Enter Spouse Birthday" >
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Dependent 1</label>
                        <input type="text" class="form-control" id="dependent1" placeholder="Enter Dependent Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Dependent 1 Birthday</label>
                        <input type="date" class="form-control" id="dependent1_bday" placeholder="Enter Dependent Birthday" >
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Dependent 2</label>
                        <input type="text" class="form-control" id="dependent2" placeholder="Enter Dependent Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Dependent 2 Birthday</label>
                        <input type="date" class="form-control" id="dependent2_bday" placeholder="Enter Dependent Birthday" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Dependent 3</label>
                        <input type="text" class="form-control" id="dependent3" placeholder="Enter Dependent Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Dependent 3 Birthday</label>
                        <input type="date" class="form-control" id="dependent3_bday" placeholder="Enter Dependent Birthday" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Dependent 4</label>
                        <input type="text" class="form-control" id="dependent4" placeholder="Enter Dependent Name" >
                      </div>
                    </div>
                    <div class="col-sm">
                        <label>Dependent 4 Birthday</label>
                        <input type="date" class="form-control" id="dependent4_bday" placeholder="Enter Dependent Birthday" >
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Present Address</label>
                        <input type="text" class="form-control" id="present_address" placeholder="Enter Present Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group" >
                        <label>Permanent Address</label>
                        <input type="text" class="form-control" id="permanent_address" placeholder="Enter Permanent Address E.g (Blk,Lot, Street,Brgy,City/Town,Province,Zip Code)" >
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
              Do you want to Save Employee Information??
            </div>  
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary createUser" >Save</button>         
          <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

        </div>
      </div>
    </div>
  </div>



<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createUser',function(){ 
      var emp_id=$.trim(encodeURI($("#emp_id").val()));
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

      



      var pick = '14';

        if(emp_id == "" ||Lastname == "" ||Firstname == "" ||Middlename == "" ||date_hired == "" ||emp_status_1 == "" ||emp_status_2 == "" ){
            $.notify(" Some Fields Are Empty ","warning");  
            $(".createUser").html('Login'); 
            $(".createUser").attr("disabled", false);
        } else { 
            var fd = new FormData();    
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
                  }else{
                    $.notify("Employee ID Already Exist","error");                           
                    $(".createUser").attr("disabled", false);
                  }                       
                }
            });
        }  
    });



  
</script>