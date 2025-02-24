<title>Dashboard</title>
<?php
    include 'includes/header.php';
    $fetchdata = new admin_creation();
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

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
                <h3><?php echo $fetchdata->countActiveUsers();?></h3>

                <p>Total Number of Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="WorkOrderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fetchdata->countPendingSpecialINQ();?></h3>

                <p>Pending Employee Inquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="workapproval" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $fetchdata->OpenITConcern();?></h3>

                <p>IT Concerns</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $fetchdata->countPendingNotifPass();?></h3>
                <p>Company Assets Accountability</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="WorkOrderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
         

        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">


          <div class="col-lg-3 col-6">
            <!-- small box -->


            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $fetchdata->countPendingLeaveRequest();?></h3>
                <p>Leave Request</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>



          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fetchdata->countPedingBusinessRequest();?></h3>
                <p>Official Business Request</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <!-- <a href="workapproval" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?php echo $fetchdata->countPedingOverTime();?></h3>
                <p>Overtime Request </p>
              </div>
              <div class="icon">
                <i class="far fa-clock"></i>
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <h3> <?php echo $fetchdata->countPedingChangeShift();?></h3>

                <p>Change Shift Request</p>
              </div>
              <div class="icon">
                <i class="  fas fa-sync-alt"></i>
              </div>
              <!-- <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">

              <div class="card">
                  <div class="card-header">
                <h3 class="card-title">Employee Inquries List</h3>
              </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>

                        <th style="text-align:center;">Requested By </th>
                        <th style="text-align:center;">Description </th>
                        <th style="text-align:center;">Action </th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                            $sql=$fetchdata->selectRequest();
                            while($row=mysqli_fetch_array($sql)){ ?>
                            <tr>


                                <td style="text-align:center;"><?php echo $row['Lastname']. "," . $row['Firstname'] . " " .  $row['Middlename'];?></td>
                                <td style="text-align:center;"><?php echo str_ireplace($search,$replace,$row['description']);?> </td>
                                <td style="text-align:center;"> 
                                        <button type='button' id='<?php echo htmlentities($row['id']);?>' class='approve_btn btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                        <button type='button' id='<?php echo htmlentities($row['id']);?>' class='reject_btn btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                </td>                                                     
                            </tr>
                        <?php } ?>
                      </tbody>

                    </table>
                  </div>
              
         
              </div>

          </div>
          <div class="col-sm">
                
               <div class="card">
                  <div class="card-header">
                <h3 class="card-title">Employee Suggestions List</h3>
              </div>

                  <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <?php  if($_SESSION['name'] == "ITSupport Access1")  { ?>
                      <th style="text-align:center;">Name </th>
                    <?php }  ?>
                    <th style="text-align:center;">Description 
                    <th style="text-align:center;">Date </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql1=$fetchdata->selectSuggestion();
                        while($row1=mysqli_fetch_array($sql1)){ ?>
                        <tr>


                    <?php  if($_SESSION['name'] == "ITSupport Access1")  { ?>
                           
                            <td style="text-align:center;"><?php echo $fetchdata->getApproverNAme($row1['emp_id']);?></td> 
                    <?php }  ?>

                            <td style="text-align:center;"><?php echo htmlentities($row1['description']);?></td> 
                            <td style="text-align:center; width: 250px;"><?php echo date('F d,Y',strtotime($row1['date']))  ;?></td>                
                        </tr>
                    <?php } ?>
                  </tbody>

                </table>
                  </div>
              </div>
          </div>
       
        </div>
      </div>
    </div>

<!-- 
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="container-fluid">
              <div class="row">
            
              </div>
            </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th style="text-align:center;">Requested By </th>
                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectRequest();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>


                            <td style="text-align:center;"><?php echo $row['Lastname']. "," . $row['Firstname'] . " " .  $row['Middlename'];?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['description']);?></td>
                            <td style="text-align:center;"> 
                                    <button type='button' id='<?php echo htmlentities($row['id']);?>' class='approve_btn btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                    <button type='button' id='<?php echo htmlentities($row['id']);?>' class='reject_btn btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
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
       <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="container-fluid">
              <div class="row">
              <div class="card-header">
                <h3 class="card-title">Employee Suggestions List</h3>
              </div>
              </div>
            </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql1=$fetchdata->selectSuggestion();
                        while($row1=mysqli_fetch_array($sql1)){ ?>
                        <tr>


                            <td style="text-align:center; width: 250px;"><?php echo $row1['id'];?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row1['description']);?></td>
                            <td style="text-align:center; width: 250px;"> 
                
                        </tr>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  </div>
  <!-- approve -->
    <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Approve this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="approveSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
  <!-- reject -->
    <div class="modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Reject this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="rejectSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>
   var id="";
    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        $("#approveModal").modal("show");
    });

    $(document).on('click','#approveSubmit',function(){ 
      $("#approveSubmit").attr("disabled", true);   

        var pick = '42';
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
                    $.notify("Request Done Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataSubmitEdit").attr("disabled", false);   
                }
                return false;
            }
        });
    });

    $(document).on('click','.reject_btn',function(){ 
        id=$(this).attr("id");
        $("#rejectModal").modal("show");
    });

    $(document).on('click','#rejectSubmit',function(){ 
      $("#rejectSubmit").attr("disabled", true);   

        var pick = '43';
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
                    $.notify("Request Rejected Successfully", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#rejectSubmit").attr("disabled", false);   
                }
                return false;
            }
        });
    });
</script>