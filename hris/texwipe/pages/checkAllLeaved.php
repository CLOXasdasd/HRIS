<title>Assets</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();

    $year = date("Y");
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assets Accountable <?php echo $year; ?> </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <!-- <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create</a></li> -->
            </ol>
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
                <h3 class="card-title">Change Shift List</h3>
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> </th>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Category </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Start Date </th>
                    <th style="text-align:center;">End Date </th>
                    <th style="text-align:center;">Number of Days</th>    
                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Approver 1 </th>
                    <th style="text-align:center;">Approver 2 </th>
                    <!-- <th style="text-align:center;">Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->HRselectLEAVERequest($year);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>                            
                            <td style="text-align:center;"><?php if($row['status'] == 'Pending') {?><input type="checkbox" id="update[]" name="update[]" value="<?php echo htmlentities($row['leave_id']);?>"><?php }?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['leave_id']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['leaveRequest']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y",strtotime($row['startDate'])));?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['endDate'])));?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['days']);?></td>  
                            <td style="text-align:center;"><?php echo htmlentities($row['reason']);?></td>     
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>                             
                            <td style="text-align:center;"><?php echo htmlentities($row['status1']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status2']);?></td>
                <!--             <td style="text-align:center;">
                                <?php if($row['status'] == 'Pending') {?>
                                    <button type='button' id='<?php //echo htmlentities($row['leave_id']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Approve</i> </button>
                                    <button type='button' id='<?php //echo htmlentities($row['leave_id']);?>' class='reject_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Reject</i> </button>
                                <?php }?>
                            </td>  -->
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
