<title>Training List</title>
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
              <h1>Training List </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <li><a type="button" class="btn btn-primary" id="btn_Addtraining" data-toggle="modal" data-target=".bd-example-modal-lg"> Add Training</a></li>
            </ol>
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
                    <th style="text-align:center;">Action </th>
                    <th style="text-align:center;">Employee </th>
                    <th style="text-align:center;">Training </th>
                    <th style="text-align:center;">Job Title </th>
                    <th style="text-align:center;">Status </th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllTrainginReg();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                           <td style="text-align:center;">   
                                  <button type='button' id='<?php echo htmlentities($row['id']);?>' class='view_btn  btn-primary btn-sm'  title='Edit Record'>View </button>
                                  <button type='button' id='<?php echo htmlentities($row['id']);?>' class='edit_btn  btn-warning btn-sm'  title='Edit Record'>Edit</button></td>
                            <td style="text-align:center;"><?php echo $fetchdata->selectApprover($row['emp_id']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['trainingType']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['description']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>

                                                            
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
                    <div class="form-group">
                        <label>Training And Evaluation</label>
                        <select name="cars" id="TrainingEval"  class="form-control emp_id">
          <option value="Internal Training"> Internal Training </option>
                            <option value="External Training"> External Training </option>
                        </select>
                    </div>
             </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btnTraining" >Create</button>         
          <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/footer.php'; ?>
<script>
 
    var id = '';
    $(document).on('click','.view_btn',function(){ 
        id=$(this).attr("id");
        // location.href = "accountsViewEmployees?id=" + id + " "; 
         window.location.href ="Trainingview?id=" + id;
    });
 
    $(document).on('click','#btn_Addtraining',function(){ 
      $("#CreateDocumentType").modal("show");
    });

    $(document).on('click','.btnTraining',function(){ 
              var TrainingEval=$.trim(encodeURI($("#TrainingEval").val()));
                       window.location.href ="TraininingsAndEval?type=" + TrainingEval;
    });

    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 
    });

</script>