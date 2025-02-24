<title>User Accounts</title>
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
            <h1>Deparment and Postion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDepartment"> Create Department </a></li>
              <li><a type="button" class="btn btn-info  fa fa-plus-square" data-toggle="modal" data-target="#CreatePosition"> Create Position </a></li>
            </ol>
          </div>
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
                <h3 class="card-title">Department List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Department </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectDepartment();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['dept_description']);?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['dept_id']);?>' class='delete_btn  btn-danger btn-sm'  title='Edit Record'><i class='fa fa-edit' >Delete</i> </button>
                            </td>                                                 
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center;">Department </th>
                    <th style="text-align:center;">Action</th>
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
