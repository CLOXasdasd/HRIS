<?php

    include 'includes/header.php'; 
    $fetchdata=new admin_creation();


    $trainingId = $_GET['id'];

 	$sql=$fetchdata->selectAllTrainginRegByID($trainingId);
    while($row=mysqli_fetch_array($sql)){ 
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
 
    </style>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Training Details </h1>
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
						 	<input type="text" class="form-control" placeholder="Job Title"  id="jobTitle" value="<?php echo $fetchdata->selectApprover($row['emp_id']); ?>" readonly>
						</div>
						<div class="col-sm">
						 	<label>Job Title</label>
						 	<input type="text" class="form-control" placeholder="Job Title"  id="jobTitle" value="<?php echo $row['description']; ?>" readonly>
						</div>
					</div>
			  
					<div class="row">
						<div class="col-sm">
						 	<label>Department</label>
						 	<input type="text" class="form-control" id="department" placeholder="Department" value="<?php echo $row['department']; ?>" readonly>
						</div>
						<div class="col-sm">
						 	<label>Current Position</label>
						 	<input type="text" class="form-control" id="position" placeholder="Position" value="<?php echo $row['position']; ?>" readonly>
						</div>
					</div>
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
								<input type="radio" name="checklist" id="training" value="On-Job-Training" placeholder="Position" <?php echo ($row['trainingType'] == 'On-Job-Training') ? "checked" : ""?> >
							  	<label>On-Job-Training</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="Cross Training" placeholder="Position" <?php echo ($row['trainingType'] == 'Cross Training') ? "checked" : ""?>  >
							  	<label>Cross Training</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="New Hired" placeholder="Position" <?php echo ($row['trainingType'] == 'New Hired') ? "checked" : ""?>  >
							  	<label>New Hired</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="Regular Employee" placeholder="Position" <?php echo ($row['trainingType'] == 'Regular Employe') ? "checked" : ""?>  >
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
								 	<input type="date" class="form-control" placeholder="Job Title" id="startDate" value="<?php echo $row['start']; ?>" readonly>
								</div>
							</div>
						</div>
						<div class="col-sm">

							<div class="row">
								<div class="col-sm-2">
						 			<label>Completion</label>
								</div>
								<div class="col-sm">
						 			<input type="date" class="form-control" placeholder="Job Title" id="completionDate"  value="<?php echo $row['completion']; ?>" readonly>
								</div>
							</div>
						</div>
					</div>


					<br>

					<table>
						<tr>
							<th><center> TRAINING REQUIRED </center></th>
							<th><center> FACILITATOR'S NAME  </center></th>
							<th><center> INCLUSIVE DATES </center></th>
							<th><center> REMARKS BY FACILITATOR </center></th>
						</tr>
						<tr style="background-color: #C0C0C0;">
							<td colspan="4"> GENRAL ORIENTATION </td>			
						</tr>
						<tr>
							<td> Company Overview / Policies & Procedure </td>							
							<td><center>  <?php echo $fetchdata->selectApprover($row['trainer1']); ?> </center></td>					
							<td><center>  </center> </td>					
							<td><center>  </center> </td>
						</tr>

						<tr>
							<td> Safety at the Workplace </td>							
							<td><center> <?php echo $fetchdata->selectApprover($row['trainer2']); ?> </center></td>					
							<td><center>  </center> </td>					
							<td><center>  </center> </td>		
						</tr>


						<tr>
							<td> Quality and Environmental Management System Awareness </td>							
							<td><center> <?php echo $fetchdata->selectApprover($row['trainer3']); ?> </center></td>					
							<td><center>  </center> </td>					
							<td><center>  </center> </td>		
						</tr>

						<tr>
							<td> Quality Process/ TMS/ Gowning Protocol / MSDS /Judgement Criteria /Safety and Housekeeping </td>							
							<td><center> <?php echo $fetchdata->selectApprover($row['trainer4']); ?> </center></td>					
							<td><center>  </center> </td>					
							<td><center>  </center> </td>
						</tr>
						
						<tr>
							<td> Job Description </td>							
							<td><center> <?php echo $fetchdata->selectApprover($row['trainer5']); ?>  </center></td>					
							<td><center>  </center> </td>					
							<td><center>  </center> </td>		
						</tr>
					</table>
					<br> <hr>
					<table>

						<tr style="background-color: #C0C0C0;">
							<td > FUNCTIONAL JOB-SKILL TRAINING </td>	
							<td><center> FACILITATOR'S NAME  </center></td>								
							<td ><center> Remarks  </center></td>	
						</tr>

						<tr>
							<td >Integration of Learning & Performance Evaluation (end of 30 days) </td>		
							<td></td>
							<td ></td>	
						</tr>


						<?php
							$search  = array(".||.", '&amp;');
								$replace = array(',', '&');
							$array = explode(",",$row['annexDesc']);
							$annexRemarks = explode(",",$row['annexRemarks']);
							$annexTrainer = explode(",",$row['annexTrainer']);
							for($i = 0; $i < count($array); $i++ ) {
						?>

							<tr>
								<td>  <?php 

								


									echo  str_replace($search, $replace, $array[$i]); 
								?>  </td>	
								<td> <center>  <?php echo $fetchdata->selectApprover($annexTrainer[$i]); ?> </center>  </td>							
								<td> <?php 
									echo  str_replace($search, $replace, $annexRemarks[$i]); 

								?></td>	
							</tr>

						<?php } ?>


					</table>



							<!--         <div class="row mb-2">
							          <div class="col-sm-6">
							          </div>
							          <div class="col-sm-6">
							            <ol class="breadcrumb float-sm-right">
							              <li><a type="button" class="btn btn-success mr-1" data-toggle="modal" id="btnSave"> Save </a></li>
							              <li><a type="button" class="btn btn-info mr-1 fa" data-toggle="modal" id="btnBack"> Back </a></li>
							            </ol>
							          </div>
							        </div> -->


			    </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card"> 	
		        <div class="card-body">
		        	<center><h3>OVERALL ASSESSMENT</h3></center>
		        	<hr>

					<div class="container">
						<div class="row">
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="1" placeholder="Position" <?php //echo ($row['trainingType'] == 'On-Job-Training') ? "checked" : ""?> >
							  	<label>Qualified / Passed Initial Training</label>
							</div>
							<div class="col-sm">
								<input type="radio" name="checklist" id="training" value="2" placeholder="Position" <?php //echo ($row['trainingType'] == 'Cross Training') ? "checked" : ""?>  >
							  	<label>For Re-Training</label>
							</div>
						</div>
					</div>
					<br>
					<label style="font-size: 25px;">Remarks / Comments </label> <label>(i.e trainee's attitude, overall capacity to perform function)</label>

					
						<textarea id="commentRem" name="commentRem"  class="form-control" rows="4" cols="50"></textarea>
					


			    </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php } ?>

  </div>

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


<?php include 'includes/footer.php'; ?>


  <!-- approve -->

<script>
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
        

        fd.append('Annex', Annex);

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

