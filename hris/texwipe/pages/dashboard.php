<title>Dashboard</title>
<?php
    include 'includes/header.php';
        $fetchdata=new admin_creation();
        $dateToday = date('Y-m-d');
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
          </div><!-- /.col -->

                   <div class="container-fluid">
         

                  <ol class="breadcrumb float-sm-right">
                    <li><a type="button" class="btn btn-primary fa fa-plus-square mr-1" data-toggle="modal" data-target="#SuggestionsBox"> Suggestions </a></li>
                  </ol>
                </div>
        </div><!-- /.row -->


      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallLeaveRequest($emp_id); ?></h3>
                <p>Pending Leave Request</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <!-- <a href="WorkOrderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallchangeshift($emp_id); ?></h3>
                <p>Pending Change Shift</p>
              </div>
              <div class="icon">
                <i class=" fas fa-sync-alt"></i>
              </div>
              <!-- <a href="workapproval" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallovertime($emp_id); ?></h3>
                <p>Pending Overtime</p>
              </div>
              <div class="icon">
                <i class="far fa-clock"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallOfficial($emp_id); ?></h3>
                <p>Pending Offical Business Request</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php if($user->checkPosition($position) == "yes"){?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallLeaveRequestdepartment($emp_id); ?></h3>
                <p> Employee Pending Leave Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="WorkOrderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallchangedepartment($emp_id); ?></h3>
                <p>Employee Pending Change Shift</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="workapproval" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $fetchdata->selectallovertimedepartment($emp_id); ?></h3>
                <p> Employee Pending Overtime</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php 
                    if( $_SESSION['position'] == 'Business Unit Manager'){ 
                      echo "<h3>".$fetchdata->selectallOfficialdepartmentAdmin()."<h3>"; 
                    } else { 
                      echo "<h3>".$fetchdata->selectallOfficialdepartment($emp_id)."<h3>";
                    }
                ?> 

                <p>Employee Pending OB Request <?php //echo $_SESSION['position']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">

                <?php 
                   
                      echo "<h3>".$fetchdata->selectallNotification($emp_id)."<h3>";
                    //}



                ?> 

                <p>Employee Pending Notif Request <?php //echo $_SESSION['position']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <?php 
                   
                      //echo  "<h3>".$fetchdata->selectallNotification($emp_id)."<h3>";
                    //}

                        echo "<h3>0</h3>";

                ?> 

                <p>Employee Pending IT Request <?php //echo $_SESSION['position']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-sm-9">
          <div class="card">

            <div class="container-fluid">
              <div class="card-header">
                <h3 class="card-title">Employee Inquiries List</h3>
              </div>

                  <ol class="breadcrumb float-sm-right">
                    <li><a type="button" class="btn btn-primary fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Create Request </a></li>
                  </ol>
                </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID</th>

                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Status </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectRequest($emp_id);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['id']);?></td>
                            <!-- Here -->
                            <td style="text-align:center;"><?php echo str_ireplace($search,$replace,$row['description']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                                                     
                        </tr>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="container">
                <br>
                <h3 style="text-align:center;"> <strong> Announcements </strong> </h3><hr><hr>
                <?php
                    $sql=$fetchdata->selectAllAnnouncement();
                    while($row1=mysqli_fetch_array($sql)){ ?>
                      <p> <center><?php echo htmlentities($row1['descipriton']);?></center></p>
                      <hr>
                <?php } ?>
              </div>

              <hr>
             <div class="container">
                <br>
                <h3 style="text-align:center;"> <strong> Birthdays </strong> </h3><hr><hr>
                <?php
                    $sql=$fetchdata->selectAllBirthdays();
                    while($row2=mysqli_fetch_array($sql)){ ?>
                      <p> 
                        <?php //if($row2['emp_id'] != '699') {?>

                       
                        <center> <img src="<?php echo $fetchdata->getProfilePic($row2['emp_id']); ?>" class="rounded-circle" alt="Round Image" style="width: 90px; height: 90px;"> </center>

                        <center> <?php echo $row2['Firstname'] . " " . $row2['Middlename'] . " " . $row2['Lastname'];?></center>
                      </p>
                      <hr>
                <?php //} 
                } ?>
              </div>
           
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
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
                    
                    <div class="form-group" hidden>
                        <label><span style="color:red">*</span>Employee </label>
                         <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $emp_id;?>">
                    </div>
                    
                    <div class="form-group" >
                        <label><span style="color:red">*</span>Inquiries</label>
                        <textarea  class="form-control" id="notification" placeholder="Enter Inquiries for Human Resources"></textarea>
                    </div>
                </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary createDepartment" >Create</button>         
          <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>



    <div class="modal fade" id="SuggestionsBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    <div class="form-group" hidden>
                        <label><span style="color:red">*</span>Employee </label>
                         <input type="text" name="date_filed" id="empployee_Id" class="form-control" value="<?php echo $emp_id;?>">
                    </div>
                    
                    <div class="form-group" >
                        <label><span style="color:red">*</span>Suggestions</label>
                        <textarea  class="form-control" id="suggestionsText" placeholder="Enter Any suggestion" rows="4" column="10"></textarea>
                    </div>
                </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary createSuggestions" >Create</button>         
          <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
      $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true);   
        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var notification=$.trim(encodeURI($("#notification").val()));
        var pick = '37';
        var fd = new FormData();

        if(notification == ''){
            $.notify("Inquiries found empty", "error");
            $(".createDepartment").attr("disabled", false);   
        }  else {
            fd.append('date_filed', date_filed);
            fd.append('notification', notification);
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
                      $.notify("Request Create Successfully", "success"); 
                      setTimeout(function() { location.reload(); }, 2000);
                  }else{
                      $.notify("Account Request was not Successfull ", "error");
                      $("#dataSubmitEdit").attr("disabled", false);   
                  }
                  return false;
                }
            });          
        }   

    });



    $(document).on('click','.createSuggestions',function(){ 




        var val_id=$.trim(encodeURI($("#empployee_Id").val()));
              
        var suggestionsText=$.trim(encodeURI($("#suggestionsText").val()));
        var pick = '51';
        var fd = new FormData();
            fd.append('suggestionsText', suggestionsText);
            fd.append('pick', pick);


        if(suggestionsText == ''){
                      $.notify("Suggestion found empty", "error");
            $(".createDepartment").attr("disabled", false);   
        }  else {
            fd.append('val_id', val_id);
            fd.append('suggestionsText', suggestionsText);
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
                      $.notify("Request Create Successfully", "success"); 
                      setTimeout(function() { location.reload(); }, 2000);
                  }else{
                      $.notify("Account Request was not Successfull ", "error");
                      $("#dataSubmitEdit").attr("disabled", false);   
                  }
                  return false;
                }
            });          
        }   


    });
</script>