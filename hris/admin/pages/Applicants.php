<title>Applicants</title>
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
               <h1>Applicant List </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                    <th style="text-align:center;">Actions </th>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Position</th>                                  
                    <th style="text-align:center;">First Interview</th>       
                    <th style="text-align:center;">Second Interview</th>                    
                    <th style="text-align:center;">Final Interview</th>                      
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                        $sql=$fetchdata->selectallappicants();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                        	<td style="text-align:center;">   
                              <button type='button' id='<?php echo base64_encode($row['id']);?>' class='view_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-search-plus' > View </i> </button>
                            </td> 
                            <td style="text-align:center;"><?php echo $row['firstName'] . " " . $row['MiddleName'] . " " .$row['lastName'];?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['position']);?></td>                    
        

                            <td style="text-align:center;"><?php 

                                      if ($row['interviewee_status'] == 'Pending') {
                                          $statusMessage = "Pending";
                                      } elseif ($row['interviewee_status'] == 'Done') {
                                          $statusMessage = "Endorsed";
                                      } else {
                                          $statusMessage = "Rejected";
                                      }

                                      echo $statusMessage;
                            ?></td>
                            
                            <td style="text-align:center;"><?php 

                                    if ($row['interviewer_status'] == 'Pending') {
                                        $statusMessage = "Pending";
                                    } elseif ($row['interviewer_status'] == 'Done') {
                                        $statusMessage = "Endorsed";
                                    } else {
                                        $statusMessage = "Rejected";
                                    }                                   
                                    echo $statusMessage;
                            ?></td>            

                            
                            <td style="text-align:center;"><?php 

                                    if ($row['final_status'] == 'Pending' ) {
                                        $statusMessage = "Pending";
                                    } else if ($row['final_status'] == 'Done') {
                                        $statusMessage = "For Medical";
                                    } else {
                                        $statusMessage = "Rejected";
                                    }                                   
                                    echo $statusMessage;
                            ?></td>                                                                                                                                                          
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
  </div>

<?php include 'includes/footer.php'; ?>
<script>
 
    var id = '';
    $(document).on('click','.view_btn',function(){ 
        id=$(this).attr("id");
        // location.href = "accountsViewEmployees?id=" + id + " "; 
         window.location.href ="applicantview?id=" + id;
    });
 

</script>