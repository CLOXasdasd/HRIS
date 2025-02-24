<title>Visitor Logs</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Visitor Logs</h1>
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
                <h3 class="card-title">List of Recent Visitors</h3>
              </div>

              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Company </th>
                    <th style="text-align:center;">Contact Number </th>
                    <th style="text-align:center;">Emails </th>
                    <th style="text-align:center;">Purpose </th>
                    <th style="text-align:center;">Time In </th>
                    <th style="text-align:center;">Time Out </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllVisitor();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['name']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['company']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['number']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['email']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['visitDetails']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['timeIn']))); ?></td>   
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['timeOut']))); ?></td>   

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
<?php include 'includes/footer.php'; ?>