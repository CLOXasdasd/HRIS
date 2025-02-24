<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = $_SESSION['emp_id'];

    $fetchdata = new admin_creation();

?>

<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Documents </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                </h3>
              </div>

              <div class="card-body">

                  <!-- /.Profile -->
                  <div class="tab-pane" id="documents">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
	                        <tr>
	                           	<th style="text-align:center;">Document </th>
	                           	<th style="text-align:center;">Description</th>                                
	                            <th style="text-align:center;">Action</th> 
	                        </tr>
                        </thead>
                        <tbody>
                          <?php
                              $sql=$fetchdata->selectDocumentEmployee($id);
                              while($row1=mysqli_fetch_array($sql)){ ?>
                              <tr>
                                  <td style="text-align:center;"><?php echo htmlentities($row1['documentType']);?></td>
                                  <td style="text-align:center;"><?php echo htmlentities(str_ireplace($search,$replace,$row1['document_description']));?></td>
                                  <td style="text-align:center;">
                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='delete_btn  btn-info btn-sm  mr-1'  title='Edit Record'><i class="fa fa-search-plus mr-1"> View</i> </button>
                                        <button type='button' id='<?php echo $row1['doc_id'];?>' class='download_btn  btn-primary btn-sm  mr-1'  title='Edit Record'><i class='fa fa-download mr-1' > Download</i> </button>
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
        </div>
      </div>
    </section>

  </div>

<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
	$(document).on('click','.download_btn',function(){ 
        id=$(this).attr("id");
        location.href = "downloadfile?id=" + id + " "; 
    });


    $(document).on('click','.delete_btn',function(){ 
        id=$(this).attr("id");
        window.open("viewfile?id=" + id );
    });
</script>



