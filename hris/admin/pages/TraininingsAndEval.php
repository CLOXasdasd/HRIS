<?php

    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
	$type =  $_GET['type'];

?>

<title>Applicants View</title>

    <style>
        .profile-sheet {
            max-width: 1500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-sheet h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }

                table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

          .card-body {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
 

 .btn-center {
  display: block;
  margin: 0 auto;
}
    </style>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Training Details</h1>
          </div>
           <div class="col-sm-6">
           
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
<!-- 
            	<div class="card-header">
				  <h3 class="card-title">

				  </h3>
            	</div>   -->     	




		        <div class="card-body">
					<div class="row">
						<div class="col-sm">
						 	<label>Trainee Name</label>
						 	<select class="form-control" id="employee_id" onchange="getMaintenance()">
						 	    <option value=""  selected> Select Employee </option>
	                            <?php
	                            $sql=$fetchdata->selectEmployeeProbi();
	                            while($row=mysqli_fetch_array($sql)){ ?>
	                                <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>                                 
	                            <?php } ?>
                        	</select>
						</div>
						<div class="col-sm">
						 	<label>Job Title</label>
						 	<input type="text" class="form-control" placeholder="Job Title"  id="jobTitle" >
						</div>
					</div>
			  
<!-- 					<div class="row">
						<div class="col-sm">
						 	<label>Department</label>
						 	<input type="text" class="form-control" id="department" placeholder="Department" disabled>
						</div>
						<div class="col-sm">
						 	<label>Current Position</label>
						 	<input type="text" class="form-control" id="position" placeholder="Position" disabled>
						</div>
					</div> -->
			    </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <?php// if($type == "Training Plan") { ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card"> 	
		        <div class="card-body">

					<div class="container">
						<div class="row">
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="On-Job-Training" placeholder="Position" >
							  	<label>On-Job-Training</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="Cross Training" placeholder="Position" >
							  	<label>Cross Training</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="New Hired" placeholder="Position" >
							  	<label>New Hired</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="Regular Employee" placeholder="Position" >
							  	<label>Regular Employee</label>
							</div>
						</div>
					</div>
					
					<hr>
					<br>

					<div class="row">
						<div class="col-sm-2">
						 	<label>TARGET DATE OF TRAINING</label>
						</div>
						<div class="col-sm">
							<div class="row">
								<div class="col-sm-2">
								 	<label>Start</label>
								</div>
								<div class="col-sm">
								 	<input type="date" class="form-control" placeholder="Job Title" id="startDate">
								</div>
							</div>
						</div>
						<div class="col-sm">

							<div class="row">
								<div class="col-sm-2">
						 			<label>Completion</label>
								</div>
								<div class="col-sm">
						 			<input type="date" class="form-control" placeholder="Job Title" id="completionDate">
								</div>
							</div>
						</div>
					</div>


					<br>

					<table>
						<tr>
							<th><center> TRAINING REQUIRED </center></th>
							<th><center> FACILITATOR'S NAME  </center></th><!-- 
							<th><center> INCLUSIVE DATES </center></th>
							<th><center> REMARKS BY FACILITATOR </center></th> -->
						</tr>
						<tr style="background-color: #C0C0C0;">
							<td> GENRAL ORIENTATION </td>							
							<td></td>		
						</tr>
						<tr>
							<td> Company Overview / Policies & Procedure </td>							
							<td>						 	
								<select class="form-control" id="trainer1">
							 	    <option value=""  selected> Select Employee </option>
		                            <?php
		                            $sql1=$fetchdata->selectEmployeeTrainger();
		                            while($row1=mysqli_fetch_array($sql1)){ ?>
		                                <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row1['Firstname']?> </option>                                 
		                            <?php } ?>
	                        	</select>
                        	</td>				
						</tr>

						<tr>
							<td> Safety at the Workplace </td>							
							<td>						 	
								<select class="form-control" id="trainer2">
							 	    <option value=""  selected> Select Employee </option>
		                            <?php
		                            $sql1=$fetchdata->selectEmployeeTrainger();
		                            while($row1=mysqli_fetch_array($sql1)){ ?>
		                                <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row1['Firstname']?> </option>                                 
		                            <?php } ?>
	                        	</select>
                        	</td>			
						</tr>


						<tr>
							<td> Quality and Environmental Management System Awareness </td>							
							<td>						 	
								<select class="form-control" id="trainer3">
							 	    <option value=""  selected> Select Employee </option>
		                            <?php
		                            $sql1=$fetchdata->selectEmployeeTrainger();
		                            while($row1=mysqli_fetch_array($sql1)){ ?>
		                                <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row1['Firstname']?> </option>                                 
		                            <?php } ?>
	                        	</select>
                        	</td>			
						</tr>

						<tr>
							<td> Quality Process/ TMS/ Gowning Protocol / MSDS /Judgement Criteria /Safety and Housekeeping </td>							
							<td>						 	
								<select class="form-control" id="trainer4">
							 	    <option value=""  selected> Select Employee </option>
		                            <?php
		                            $sql1=$fetchdata->selectEmployeeTrainger();
		                            while($row1=mysqli_fetch_array($sql1)){ ?>
		                                <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row1['Firstname']?> </option>                                 
		                            <?php } ?>
	                        	</select>
                        	</td>		
						</tr>
						
						<tr>
							<td> Job Description </td>							
							<td>						 	
								<select class="form-control" id="trainer5">
							 	    <option value=""  selected> Select Employee </option>
		                            <?php
		                            $sql1=$fetchdata->selectEmployeeTrainger();
		                            while($row1=mysqli_fetch_array($sql1)){ ?>
		                                <option value="<?php echo $row1['emp_id']?>"> <?php echo $row1['Lastname'] . ", " . $row1['Firstname']?> </option>                                 
		                            <?php } ?>
	                        	</select>
                        	</td>			
						</tr>

					
					</table>


					<table  id="inputTable">
						<tr style="background-color: #C0C0C0;">
							<td> FUNCTIONAL JOB-SKILL TRAINING </td>	
														<td><center> FACILITATOR'S NAME  </center></td>						
							<td>  <center>  <button onclick="addRow()" class="btn btn-primary">Add Row</button> </center></td>	
						</tr>
							<tr>
								<td colspan="3">Integration of Learning & Performance Evaluation (end of 30 days) </td>		
			
							</tr>
						<tbody>

						</tbody>




					</table>



        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-success mr-1" data-toggle="modal" id="btnSave"> Save </a></li>
              <li><a type="button" class="btn btn-info mr-1 fa" data-toggle="modal" id="btnBack"> Back </a></li>
            </ol>
          </div>
        </div>


			    </div>




            </div>




          </div>
        </div>
      </div>
    </section>


     <div class="modal fade" id="saveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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



    <?php// } ?>

  </div>

<?php include 'includes/footer.php'; ?>


  <!-- approve -->

<script>
	function addRow() {
	    const table = document.getElementById("inputTable").getElementsByTagName("tbody")[0];
	    const newRow = table.insertRow();

	    // Create cells for name, email, and actions
	    const annexCell = newRow.insertCell(0);
	    const employeeCell = newRow.insertCell(1);
	    const actionCell = newRow.insertCell(2);

	    // Add input fields to annex cell
	    annexCell.innerHTML = `
	        <input type="text" class="form-control" id="Annex" name="name[]" placeholder="Enter Annex Desc">
	        <input type="text" class="form-control" id="AnnexRemarks" name="name[]" placeholder="Enter Annex Remarks" hidden>
	    `;

	    // Add dropdown to employee cell
	    employeeCell.innerHTML = `
	        <select class="form-control" id="Appointed">
	            <option value="" selected>Select Employee</option>
	            <?php
	            $sql1 = $fetchdata->selectEmployeeTrainger();
	            while ($row1 = mysqli_fetch_array($sql1)) { ?>
	                <option value="<?php echo $row1['emp_id'] ?>">
	                    <?php echo $row1['Lastname'] . ", " . $row1['Firstname'] ?>
	                </option>
	            <?php } ?>
	        </select>
	    `;
	    actionCell.innerHTML = '<button onclick="removeRow(this)" class="btn btn-danger btn-center ">Remove</button>';
	}

    function removeRow(button) {
        // Remove the row containing the clicked button
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    $(document).on('click','#btnBack',function(){ 
        location.href = "trainingList";
    });

    $(document).on('click','#btnSave',function(){ 
        $("#saveModal").modal("show");
    });

    $(document).on('click','#dataSubmitSelected',function(){ 

        // $("#dataSubmitSelected").attr("disabled", "disabled");
    		var pick = '64';

        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var jobTitle=$.trim(encodeURI($("#jobTitle").val()));


        let training = [];
		let radioBox = document.querySelectorAll("input[type='radio']:checked");

		radioBox.forEach((item)=>{
            training.push(item.value);
		}) 



        var startDate=$.trim(encodeURI($("#startDate").val()));
        var completionDate=$.trim(encodeURI($("#completionDate").val()));

        var trainer1=$.trim(encodeURI($("#trainer1").val()));
        var trainer2=$.trim(encodeURI($("#trainer2").val()));
        var trainer3=$.trim(encodeURI($("#trainer3").val()));
        var trainer4=$.trim(encodeURI($("#trainer4").val()));
        var trainer5=$.trim(encodeURI($("#trainer5").val()));
        var Annex=$.trim(encodeURI($("#Annex").val()));


        // let AnnexDesc = [];
        // let textboxes = document.querySelectorAll("input[id='Annex']");
		// textboxes.forEach((textbox) => {
		//   AnnexDesc.push(textbox.value);
		// });


		let AnnexDesc = [];
		let textboxes = document.querySelectorAll("input[id='Annex']");		

		textboxes.forEach((textbox) => {
		  let replacedValue = textbox.value.replace(/,/g, ".||.");
		  AnnexDesc.push(replacedValue);
		});


		let AnnexComment = [];
        let textboxe1 = document.querySelectorAll("input[id='AnnexRemarks']");
		textboxe1.forEach((textbox) => {
		  AnnexComment.push(textbox.value);
		});



		let AnnexTrain = [];
		let selects = document.querySelectorAll("select[id='Appointed']");
		selects.forEach((select) => {
		  AnnexTrain.push(select.value);
		});

        var fd = new FormData();    
        fd.append('pick', pick);

        fd.append('employee_id', employee_id);
        fd.append('jobTitle', jobTitle);
        fd.append('training', training);


        fd.append('startDate', startDate);
        fd.append('completionDate', completionDate);
        
        fd.append('trainer1', trainer1);
        fd.append('trainer2', trainer2);
        fd.append('trainer3', trainer3);
        fd.append('trainer4', trainer4);
        fd.append('trainer5', trainer5);
        fd.append('Annex', AnnexDesc);
        fd.append('AnnexComment', AnnexComment);
        fd.append('AnnexTrain', AnnexTrain);




            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    console.log(result);
                    // alert(result);
                                                    
                        if($.trim(result)!=0){
                            $.notify("Successfully Submitted Request!!! ", "success"); 
                            setTimeout(function() { window.location.href = "trainingList"; }, 2000);
                        }else{
                            $.notify("Error while creating a request ", "error");
                                    $("#AQApproved").attr("disabled", false);  
                        }
        
                }
            });

    });



</script>

