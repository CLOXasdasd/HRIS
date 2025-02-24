<title>Leave List</title>
<?php
    include 'includes/header.php';
    $id = $_GET['id'];
    $fetchdata = new admin_creation();

    $sql=$fetchdata->getEmployeeInformation($id);
    while($row=mysqli_fetch_array($sql)){ 
?>

<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-info  fa fa-plus-square mr-1" data-toggle="modal" id="createUser"> Add Leave</a></li>
               <li><a type="button" class="cancel btn btn-danger  fas fa-times-circle mr-1" data-toggle="modal" id="<?php echo $id; ?>"> Back</a></li>
            </ol>
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
                   <h3 class="card-title">Available Leave List</h3>
                </h3>
              </div>

                    <div class="card-body">

                     
                      <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="text-align:center;" width="100px"> </th>
                          <th style="text-align:center;">Description</th>
                          <th style="text-align:center;">Count</th>                                   
                          <th style="text-align:center;">Earnable</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                         
                              $sql=$fetchdata->selectLeaveDesignation();
                              while($row=mysqli_fetch_array($sql)){ ?>
                              <tr>
                                   <td style="text-align:center;"><input type="checkbox" id="update[]" name="update[]" value="<?php echo htmlentities($row['id']);?>" <?php echo $fetchdata->checkleave($row['id'], $id); ?>></td> 

                                  <td style="text-align:center;"><?php echo htmlentities($row['leave_description']);?></td>          
                                  <td style="text-align:center;"><?php echo htmlentities($row['leave_count']);?></td>  
                                  <td style="text-align:center;"><?php echo htmlentities($row['earned']);?></td>                          
                                            
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
        </div>
      </div>
    </section>
  </div>

      <div class="modal fade" id="resetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Save Request?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datareset">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>


          <div class="modal fade" id="cancelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to go back to previous page?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="cancelrequest">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
<?php }  include 'includes/footer.php'; ?>

<script type="text/javascript">
  
    var id="";
    $(document).on('click','.cancel',function(){ 
        id=$(this).attr("id");
        location.href = "accountsViewEmployees?id=" + id + " "; 
    });

    $(document).on('click','#createUser',function(){ 
        $("#resetModal").modal("show");
    });


    $(document).on('click','#datareset',function(){ 
      let arr = [];
      let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

      checkboxes.forEach((item)=>{
         arr.push(item.value)
      }) 
      
      var id = "<?php echo $id;?>";
      var selected = arr;
      var pick = '20';
      var fd = new FormData();    

      fd.append('emp_id', id);
      fd.append('selected', selected);
      fd.append('pick', pick);
      $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                        
                    if($.trim(result)==1){
                        $.notify(" Leave Saved ", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#datareact").attr("disabled", false);   
                    }
                    return false;
            }
        });
    });



</script>