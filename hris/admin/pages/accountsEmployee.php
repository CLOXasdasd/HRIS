<title>User Accounts</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-danger mr-1 fa fa-plus-square" data-toggle="modal" id="generateLeave"> Generate Leave Counts </a></li>
              <li><a type="button" class="btn btn-success mr-1 fa fa-plus-square" data-toggle="modal" id="generateEmployee"> Generate Details </a></li>
              <li><a type="button" class="btn btn-info mr-1 fa fa-plus-square" data-toggle="modal" id="createUser"> Create Employee Account </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Account List</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Department</th>                                   
                    <th style="text-align:center;">Position</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql=$fetchdata->selectEmployeeAccounts();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_id']);?></td>
                            <td style="text-align:center;"><?php echo $row['Lastname'] . "," . $row['Firstname'] . " " .$row['Middlename'];?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['department']);?></td>           
                            <td style="text-align:center;"><?php echo htmlentities($row['position']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                          
                            <td style="text-align:center;">   

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='view_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-search-plus' > View </i> </button>

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='edit_btn  btn-primary btn-sm'  title='Edit Record'><i class='fas fa-pencil-alt' > Edit </i> </button>
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
 -->

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"> Active Employee </a></li>
                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab"> Inactive Employee </a></li>
                    </ul>
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <!-- /.Profile -->
                  <div class="active tab-pane" id="profile">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Account List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Department</th>                                   
                    <th style="text-align:center;">Position</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql=$fetchdata->selectEmployeeAccounts();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_id']);?></td>
                            <td style="text-align:center;"><?php echo $row['Lastname'] . "," . $row['Firstname'] . " " .$row['Middlename'];?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['department']);?></td>           
                            <td style="text-align:center;"><?php echo htmlentities($row['position']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                          
                            <td style="text-align:center;">   

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='view_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-search-plus' > View </i> </button>

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='edit_btn  btn-primary btn-sm'  title='Edit Record'><i class='fas fa-pencil-alt' > Edit </i> </button>
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

                  <!-- /.Documents -->
        <div class="tab-pane" id="documents">
                                 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Account List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Department</th>                                   
                    <th style="text-align:center;">Position</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql=$fetchdata->selectEmployeeAccountsInactive();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_id']);?></td>
                            <td style="text-align:center;"><?php echo $row['Lastname'] . "," . $row['Firstname'] . " " .$row['Middlename'];?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['department']);?></td>           
                            <td style="text-align:center;"><?php echo htmlentities($row['position']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                          
                            <td style="text-align:center;">   

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='view_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-search-plus' > View </i> </button>

                              <button type='button' id='<?php echo htmlentities($row['emp_id']);?>' class='edit_btn  btn-primary btn-sm'  title='Edit Record'><i class='fas fa-pencil-alt' > Edit </i> </button>
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

                  <!-- /.Leaves -->
                  <div class="tab-pane" id="leave">
 
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



<?php include 'includes/footer.php'; ?>
<script>
    $(document).on('click','#createUser',function(){ 
        window.location.replace("accountsCreateEmployee");
    });

    var id = '';
    $(document).on('click','.view_btn',function(){ 
        id=$(this).attr("id");
        // location.href = "accountsViewEmployees?id=" + id + " "; 
         window.open("accountsViewEmployees?id=" + id + " ", "_blank");
    });
 
     $(document).on('click','.edit_btn',function(){ 
        id=$(this).attr("id");
        location.href = "accountsEditEmployees?id=" + id + " "; 
    });
   
    $(document).on('click','#generateEmployee',function(){ 
        window.open("generateEmployeesDetails", "_blank");
    });

    $(document).on('click','#generateLeave',function(){ 
        window.open("generateallfiledLeave", "_blank");
    });
    
</script>