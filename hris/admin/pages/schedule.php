<title>Employee Attendance</title>
<?php include 'includes/header.php';

   require_once 'codes/injection_function.php';  
    $fetchdata = new injection_creation();

 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Attendance</h1>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employees List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center; width: 150px;">SAP Production Order</th>
                    <th style="text-align:center; width: 150px;">Product</th>
                    <th style="text-align:center; width: 150px;">Machine Number</th>
                    <th style="text-align:center;">Name</th>                    
                    <th style="text-align:center; width: 250px;">Start Session </th>                  
                    <th style="text-align:center; width: 250px;">End Session</th>      
                    <th style="text-align:center; width: 250px;">1st Break Start </th>                  
                    <th style="text-align:center; width: 250px;">1st Break End</th>    
                    <th style="text-align:center; width: 250px;">2nd Break Start </th>                  
                    <th style="text-align:center; width: 250px;">2nd Break End</th>                          
                    <th style="text-align:center; width: 125px;">Total Hours</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->getDailySchedule();
  
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['ihp_no']);?></td>
                            <td style="text-align:center;  "><?php echo htmlentities($row['prod_desc']);?></td>
                            <td style="text-align:center;  "><?php echo htmlentities($row['machine_no']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['firstname']);?></td>
               							<td style="text-align:center;"><?php echo htmlentities($row['time_in']);?></td>
               							<td style="text-align:center;"><?php echo htmlentities($row['time_out']);?></td> 	
                            <td style="text-align:center;"><?php echo htmlentities($row['break_in']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['break_out']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['break_in1']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['break_out1']);?></td>  				
               							<td style="text-align:center;">
                                              <?php 
                                                  if($row['time_out'] == "") {
                                                      echo "Ongoing";
                                                  } else {
                                                      $breakin = strtotime($row['break_in']);
                                                      $breakout = strtotime($row['break_out']) ;

                                                      $timein = strtotime($row['time_in']);
                                                      $timeout = strtotime($row['time_out']) ; 

                                                      $timein1 = strtotime($row['break_in1']);
                                                      $timeinout1 = strtotime($row['break_out1']);

                                                      $hour2 = abs($timeinout1 - $timein1)/(60*60);
                                                      $hour = abs($timeout - $timein)/(60*60);
                                                      $break = abs($breakout - $breakin)/(60*60);

                                                      $total_hours = $break - $hour;
                                                      $total_hours2 = $total_hours - $hour2; 
                                                      $total = abs($total_hours2);

                                                      echo round($total, 2) . " hour(s)";
                                                  }
                                              ?>
               							</td>                                                 
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center; width: 150px;">SAP Production Order</th>
                    <th style="text-align:center; width: 150px;">Product</th>
                    <th style="text-align:center; width: 150px;">Machine Number</th>
                    <th style="text-align:center;">Name</th>                    
                    <th style="text-align:center; width: 250px;">Start Session </th>                  
                    <th style="text-align:center; width: 250px;">End Session</th>      
                    <th style="text-align:center; width: 250px;">1st Break Start </th>                  
                    <th style="text-align:center; width: 250px;">1st Break End</th>    
                    <th style="text-align:center; width: 250px;">2nd Break Start </th>                  
                    <th style="text-align:center; width: 250px;">2nd Break End</th>                          
                    <th style="text-align:center; width: 125px;">Total Hours</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include 'includes/footer.php'; ?>
