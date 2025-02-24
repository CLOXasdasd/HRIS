<title>Norification Pass Type</title>
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
            <h1>IT Concern Request </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target="#CreateDocumentType"> Create Ticket </a></li>
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
                    <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Name </th>
                    <th style="text-align:center;">Date Filed </th>
                    <th style="text-align:center;">Department </th>
                    <th style="text-align:center;">Concern </th>
                    <th style="text-align:center;">Date Finished </th>
                    <th style="text-align:center;">Status </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllNotifRequest($emp_id);
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['ITConcernID']);?></td>
                            <td style="text-align:center;"><?php echo $row['Firstname'] . " " . $row['Lastname'];?></td>
                            <td style="text-align:center;"><?php echo date("F d Y",$row['dateFiled']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['department']);?></td>     
                            <td style="text-align:center;"><?php echo htmlentities(str_ireplace($search,$replace,$row['description']));?></td>                             
                            <td style="text-align:center;"><?php if($row['datefinished'] == '' ){echo "";} else { echo date("F d Y",$row['datefinished']); } ?></td>
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

    <!-- Department modal -->
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

                    <div class="form-group" hidden>
                        <label><span style="color:red">*</span>Date </label>
                        <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo strtotime(date("Y-m-d h:i")); ?>">
                    </div>

                    <div class="form-group" hidden>
                        <label><span style="color:red">*</span>Employee </label>
                        <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $emp_id; ?>">
                    </div>
                    
                    <div class="form-group" >
                        <label><span style="color:red">*</span>Department </label>
                        <input type="text" name="department" id="department" class="form-control" value="<?php echo $department; ?>" disabled>
                    </div>
                    
                    <div class="form-group" >
                        <label><span style="color:red">*</span>Raised Concern</label>
                        <textarea  class="form-control" id="concern" placeholder="Enter Raised IT Concern"></textarea>
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

<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 

        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var department=$.trim(encodeURI($("#department").val()));
        var concern=$.trim(encodeURI($("#concern").val()));
        var pick="22";

        if(concern == "" ){
            $.notify("Please Enter A concern ", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('date_filed', date_filed);
            fd.append('employee_id', employee_id);
            fd.append('department', department);
            fd.append('concern', concern);
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
</script>