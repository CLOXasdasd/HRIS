<title>Applicant</title>
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
            <h1>Applicants </h1>
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

                    <th style="text-align:center;">Action </th>
                    <th style="text-align:center;">Firstname </th>
                    <th style="text-align:center;">Middlename </th>
                    <th style="text-align:center;">Lastname </th>
                    <th style="text-align:center;">Position</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->getApplicant($emp_id);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>                        
                            <td style="text-align:center;"><?php //echo htmlentities($row['id']);?>
                                 <button type='button' id='<?php echo base64_encode($row['id']);?>' class='approve_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' ></i> </button>
                            </td>
                            <td style="text-align:center;"><?php echo htmlentities($row['firstName']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['MiddleName']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['lastName']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['position_desc']);?></td>
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

    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
          location.href = "applicantView?id=" + id + " "; 
    });
</script>