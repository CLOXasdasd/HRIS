<title>Change Shift</title>
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
            <h1>Change Shift Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">     
                <li><a type="button" id='approve_selected' class="btn btn-success mr-1 btn_selected">Approve Selected</a> </li>
                <li><a type="button" id='reject_selected' class="btn btn-danger mr-1 btn_selected_Reject" >Reject Selected</a> </li>
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
               
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;"> </th>
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Category </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Date </th>
                    <th style="text-align:center;">Date Applied </th>
                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Date Filed </th>                    
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectCSRequestListhead($emp_id);     
                        while($row=mysqli_fetch_array($sql)){
                       ?>
                        <tr>
                            <td style="text-align:center;"><input type="checkbox" id="update[]" name="update[]" value="<?php echo htmlentities($row['changeshift_id']);?>"></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['changeshift_id']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['category']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['emp_name']);?></td>
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['filed_date']));?></td>                            
                            <td style="text-align:center;"><?php echo date("F d Y", strtotime($row['date_filed1']));?></td>   
                            <td style="text-align:center;"><?php echo htmlentities($row['reason']);?></td>     
                            <td style="text-align:center;"><?php echo date("F d Y", $row['dateFiled']);?></td>   
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>     
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['changeshift_id']);?>' class='approve_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >View</i> </button>

                            </td>                                  
                        </tr>
                    <?php }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- Actions -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Reject this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Position modal -->

        <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Approve this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="approveSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="selected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to confirm this request ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitSelected">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>    

    <div class="modal fade" id="reject_selected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    Do you really want to reject this request ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataRejectSelected">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
<script>
   var id="";

    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        location.href = "employeeChangeShiftInfo?id=" + id + " "; 
    });

    $(document).on('click','.btn_selected',function(){ 
        $("#selected").modal("show");
    });

    $(document).on('click','#dataSubmitSelected',function(){ 
        selected()  
    });

   function selected(){
        $("#dataSubmitSelected").attr("disabled", true); 
        let arr = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

        checkboxes.forEach((item)=>{
           arr.push(item.value)
        }) 

        var selected = arr;
       
        // alert(selected);
        var pick = '45';
        
        if(selected == '') {
            $.notify("Warning!, Nothing to approve");
            $("#dataSubmitSelected").attr("disabled", false); 
        } else {
            var fd = new FormData();    
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
                    if($.trim(result)!=0){
                        $.notify(" Request Approved", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Error! Please try again later", "error");
                        $("#dataSubmitSelected").attr("disabled", false);  
                    }
                }
            });         
        }
    }

    $(document).on('click','.btn_selected_Reject',function(){ 
        $("#reject_selected").modal("show");
    });
    
    $(document).on('click','#dataRejectSelected',function(){ 
        reject_selected()  
    });

   function reject_selected(){
        $("#dataRejectSelected").attr("disabled", true); 
        let arr = [];
        let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

        checkboxes.forEach((item)=>{
           arr.push(item.value)
        }) 

        var selected = arr;
        var pick = '48';
        
        if(selected == '') {
            $.notify("Warning!, Nothing to approve");
            $("#dataRejectSelected").attr("disabled", false); 
        } else {
            var fd = new FormData();    
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
                    if($.trim(result)!=0){
                        $.notify(" Request Approved", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Error! Please try again later", "error");
                        $("#dataRejectSelected").attr("disabled", false);  
                    }
                }
            });         
        }
    }
</script>