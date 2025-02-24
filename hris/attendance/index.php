<title>Attendance</title>

<?php   
    require_once 'codes/function.php';  
    $fetchdata=new admin_creation();
          $date = date("Y-m-d");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="dist/img/texwipe.png">
  <link rel="stylesheet" id="ChesterAllanCustodio">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<style type="text/css">
  .content{
    background-color: #ADD8E6;


  }

</style>
<body class="hold-transition sidebar-mini layout-fixed">
    

<nav class="navbar navbar-light justify-content-between navbardesign">
  <a class="navbar-brand"><img src="dist/img/texwipe.png" style="height: 100px;"></a>
  <form class="form-inline">
    <button class="btn btn-danger" type="button" id = "backButton" onclick="backRequest()">Back</button>
  </form>
</nav>

  <div id="containerexample" class="m-5">

    <section class="content">
    <br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title">List of Filed Leave <?php echo  $date; ?></h3>                
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> Name</th>
                    <th style="text-align:center;">Leave </th>
                    <th style="text-align:center;">Start  </th>
                    <th style="text-align:center;">End </th>
                                        <th style="text-align:center;">Time </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php    
                        $sql=$fetchdata->selectEmployeeonLeave($date);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row['lastname'] . "," . $row['firstname'] . " " .$row['middlename'];?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['leaveRequest']);?></td>           
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['startDate']));?></td>  
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['endDate']));?></td>     
                            <td style="text-align:center;"><?php

                                  $array = explode("-", $row['time_Filed']);

                                  echo date('h:i A', strtotime($array[0])) . " - " . date('h:i A', strtotime($array[1]));

                                  ?>        
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
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title">List of Filed Change Shift </h3>                
                </div>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> Name</th>
                    <th style="text-align:center;">Date Filed </th>
                    <th style="text-align:center;">Start  </th>
                    <th style="text-align:center;">End </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php    
                        $sql=$fetchdata->selectEmployeeCS($date);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row['lastname'] . "," . $row['firstname'] . " " .$row['middlename'];?></td> 
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['filed_date']));?></td>           
                            <td style="text-align:center;"><?php echo $row['shift_start'];?></td>  
                            <td style="text-align:center;"><?php echo $row['shift_end'];?></td>                          
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title"> List of Filed Official Business </h3>                
                </div>

                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> Name</th>
                    <th style="text-align:center;">Date Filed </th>
                    <th style="text-align:center;">Destination  </th>
                    <th style="text-align:center;">Start  </th>
                    <th style="text-align:center;">End </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php    
                        $sql=$fetchdata->selectEmployeeOB($date);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row['lastname'] . "," . $row['firstname'] . " " .$row['middlename'];?></td> 
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['date']));?></td>           
                            <td style="text-align:center;"><?php echo $row['destination'];?></td>  
                            <td style="text-align:center;"><?php echo $row['time_in'];?></td>  
                            <td style="text-align:center;"><?php echo $row['time_out'];?></td>                          
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <h3 class="card-title"> List of Filed Notification Pass</h3>                
                </div>
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> Name</th>
                    <th style="text-align:center;">Date Filed </th>
                    <th style="text-align:center;">Destination  </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php    
                        $sql=$fetchdata->selectEmployeeNF($date);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row['lastname'] . "," . $row['firstname'] . " " .$row['middlename'];?></td> 
                            <td style="text-align:center;"><?php echo date("F d Y H:i A", strtotime($row['date']));?></td>           
                            <td style="text-align:center;"><?php echo $row['notif_desc'];?></td>                 
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
  <div id="loadercontainer">
  <div class="d-flex justify-content-center text-secondary" id="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/notify/notify.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({ 
      "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false, 
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    

    $("#example2").DataTable({ 
      "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false, 
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $("#example3").DataTable({ 
      "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    

    $("#example4").DataTable({ 
      "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
      function backRequest(){
         location.href = "test-index.php "; 
    }

</script>
</body>
</html>
