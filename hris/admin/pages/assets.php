<title>Assets</title>
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
            <h1>Assets Issuance </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create</a></li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Date Issued </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Asset No. </th>
                    <th style="text-align:center;">Asset Description </th>
                    <th style="text-align:center;">Location</th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllAsset();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", $row['date_issued'])) ;?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['employee']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['asset_no']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['item_desc']);?></td>   
                            <td style="text-align:center;"><?php echo htmlentities($row['location']);?></td>                         
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='approve_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >Edit</i> </button>
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
    </section>
  </div>

    <!-- Department modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                <div class="card-body">

                    <div class="form-group" hidden>
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Date Applicable</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span> Employee </label>
                        <select class="form-control" id="employee_id">
                            <option value=""  selected> Select Employee </option>
                            <?php
                            $sql=$fetchdata->selectEmployeeAccounts();
                            while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>                                 
                            <?php } ?>
                        </select>
                    </div>
        
                    <div class="form-group" >
                        <label><span style="color:red">*</span> Location</label>
                        <input list="departments"  class="form-control" id="department" placeholder="Enter Asset Location" >
                        <datalist id="departments">
                            <option value="Admin - Server Room (Bldg 1)">
                            <option value="Admin - Server Room (Bldg 2)">
                            <option value="Admin - Conference Room">
                            <option value="Admin - Office (Accounting)">
                            <option value="Admin - Office (Controller)">
                            <option value="Admin - Office (HR)">
                            <option value="Admin - Office (Purchasing)">
                            <option value="Admin - Office (Executive)">
                            <option value="Admin - Office (Tech Manager)">
                            <option value="Admin - Office (Tech Engr)">
                            <option value="Admin - Office (ImpEx)">
                            <option value="Admin - Office (Production)">
                            <option value="Admin - Office (CS / Warehouse)">
                            <option value="Admin - Office (IT)">
                            <option value="Admin - Canteen">
                            <option value="Admin - Collaboration Area">
                            <option value="Admin - Pantry">
                            <option value="Admin - Training / PDE Room">
                            <option value="Admin - Lobby">
                            <option value="Admin - Clinic">
                            <option value="Admin - Stockroom">
                            <option value="Quality - Office">
                            <option value="Quality - Laboratory">
                            <option value="Facility - Tool Room">
                            <option value="Facility - Office">
                            <option value="Facility - Gen Set/ Air Compressor Area">
                            <option value="Warehouse - Office">
                            <option value="Warehouse - Bldg 1 (Racks Area)">
                            <option value="Warehouse - Bldg 2 (Racks Area)">
                            <option value="Warehouse - Bldg 2 extension">
                            <option value="Production - Sterile (Mezzanine)">
                            <option value="Production - Head Forming 1">
                            <option value="Production - Head Forming 2">
                            <option value="Production - Cleanroom 1">
                            <option value="Production - Cleanroom 2">
                            <option value="Production - Thermal Bonding">
                            <option value="Production - Boxing | Label Room">
                            <option value="Production - Boxing | Wiper">
                            <option value="Production - TOC Washer">
                            <option value="Production - Swab Washing">
                            <option value="Production - RODI">
                            <option value="Production - Strip Cutting">
                            <option value="Production - Cold Cutting Area (Bldg 2)">
                            <option value="Production - Laser Cutting Area (Bldg 2)">
                            <option value="Production - Injection (Bldg 2)">
                            <option value="Loading Bay">    
                        </datalist>
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span> Asset Tag</label>
                        <input type="text" name="date_filed" id="assetTag" class="form-control" placeholder="Enter Asset Tag">
                    </div>

                    <div class="form-group" >
                        <label><span style="color:red">*</span> Asset Description</label>
                        <textarea  class="form-control" id="assetDesc" placeholder="Enter Asset Description"></textarea>
                    </div>


                </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary createDepartment" >Create</button>	      	
	        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>
	      </div>
	    </div>
	  </div>
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
<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 

        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var department=$.trim(encodeURI($("#department").val()));
        var assetTag=$.trim(encodeURI($("#assetTag").val()));
        var assetDesc=$.trim(encodeURI($("#assetDesc").val()));
        var pick="47";


        if(date_filed == "" ||employee_id == "" ||department == "" ||assetTag == "" ||assetDesc == "" ){
            $.notify("Some of the important fields are empy", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('date_filed',date_filed);
            fd.append('employee_id',employee_id);
            fd.append('department',department);
            fd.append('assetTag',assetTag);
            fd.append('assetDesc',assetDesc);
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
                        $.notify(" Request Created Successfully", "success"); 
                        setTimeout(function() { location.reload(); }, 2000);
                    }else{
                        $.notify("Account Request was not Successfull ", "error");
                        $("#dataSubmitEdit").attr("disabled", false);   
                    }
                    return false;
                }
            });           
        }
    });



    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        location.href = "assetEdit?id=" + id + " "; 
    });



</script>