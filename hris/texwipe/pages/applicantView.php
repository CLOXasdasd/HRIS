<title>Applicants View</title>
<?php 
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
	$applicant_id = base64_decode($_GET['id']);
	
    $sql=$fetchdata->GetApplicationByID($applicant_id);
    while($row=mysqli_fetch_array($sql)){ 
 	$uniqId = $row['uniqueId'];

?>
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
    .form-label {
        font-weight: bold;
    }
    .form-check {
        margin-right: 20px;
        font-size: 20px; /* Set font size */
    }
    .form-check-input {
        width: 1em; /* Adjust checkbox size */
        height: 1em; /* Adjust checkbox size */
        margin-right: 5px; /* Space between checkbox and label */
    }
    .btn {
        padding: 10px 20px;
        font-size: 18px;
    }
</style>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Applicant Details</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><a type="button" class="btn btn-danger mr-1 Btnback" data-toggle="modal" id="Btnback">Back</a></li>
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
                <h3 class="card-title">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"> Applicant Employee </a></li>
                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab"> Exam Result </a></li>
                        <li class="nav-item"><a class="nav-link" href="#interview" data-toggle="tab"> Interview Process </a></li>
                    </ul> 
                </h3>
              </div>       	

	            <div class="card-body">
		            <div class="tab-content">
		                <div class="active tab-pane" id="profile">
 							<div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <tbody>
					                        <tr>
					                            <th><h5 class="text-center">Applicant Profile Sheet</h5></th>
					                        </tr>
					                    </tbody>
					                </table>
					            </div>
					        </div>

					        <br>
					        
					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Date <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="date" value="<?php echo $row['date'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Expected Salary <span style="color:red;">*</span></label>
					                <input type="number" class="form-control" id="expectedsalary" placeholder="Expected Salary" value="<?php echo $row['expectedsalary'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Position <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="position" placeholder="Enter Position" value="<?php echo $row['position'];?>" readonly>
					            </div>
					        </div>			
				
					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">First Name <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $row['firstName'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Middle Name </label>
					                <input type="text" class="form-control" id="MiddleName" placeholder="Middle Name" value="<?php echo $row['MiddleName'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Last Name <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="lastName" placeholder="Last Name" value="<?php echo $row['lastName'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Complete Current Address <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="completecurrentaddress" rows="2" cols="50" placeholder="Complete Current Address"> <?php echo $row['completecurrentaddress'];?></textarea>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Complete Provincial Address <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="completeprobaddress" rows="2" cols="50" placeholder="Complete Provincial Address"> <?php echo $row['completeprobaddress'];?></textarea>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <label for="phone" class="col-sm-3 col-form-label">Telephone/Contact Number <span style="color:red;">*</span></label>
					            <div class="col-sm-9">
					               <input type="tel" class="form-control" id="phone" placeholder="Telephone/Contact Number" value="<?php echo $row['phone'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Date of Birth <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="birthday" placeholder="First Name" value="<?php echo $row['birthday'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Age <span style="color:red;">*</span></label>
					                <input type="number" class="form-control" id="age" placeholder="Age" value="<?php echo $row['age'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Place of Birth <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="placeofbirth" placeholder="Place of Birth" value="<?php echo $row['placeofbirth'];?>" readonly>
					            </div>
					        </div>			

					       	<div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Civil Status <span style="color:red;">*</span></label>
					                <select class="form-control" id="civilstatus" readonly>
					             		 <option value="Single "><?php echo $row['civilstatus'];?> </option>
					                    <option value="Single ">Single </option>
					                    <option value="Married ">Married </option>
					                    <option value="Widowed ">Widowed </option>
					                    <option value="Separated ">Separated </option>
					                </select>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Religion <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="religion" placeholder="Religion" value="<?php echo $row['religion'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Nationality <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="nationality" placeholder="Nationality" value="<?php echo $row['nationality'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Language/Dialect Spoken <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="language" placeholder="Language/Dialect Spoken" value="<?php echo $row['language'];?>" readonly>
					            </div>
					        </div>
					        <br>						
		
					        <h5>EMPLOYMENT HISTORY (FROM PRESENT WORK TO PREVIOUS WORK)</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>COMPANY NAME</center></th>
					                            <th><center>POSITION HELD</center></th>
					                            <th style="width: 100px;"><center>FROM</center></th>
					                            <th style="width: 100px;"><center>TO</center></th>
					                            <th><center>LAST SALARY</center></th>
					                            <th><center>REASON FOR LEAVING</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>

					                    		                    	        <?php 
                            $array = explode(",", $row['employmentHist']);
                            $count = count($array) /6;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <tr>
                            <?php    
                                for ($j = 1; $j <= 6; $j++) {
                                $count = ($i - 1) * 6 + $j-1 ; ?>

                                <td><center>
                                	<?php echo $array[$count]; ?>
                                </center>
                                </td>
                          
                            <?php           
                                }
                                ?>
                                </tr>
                            <?php }
                            ?>
		
					                       
					                    </tbody>
					                </table>
					            </div>
					        </div>
					        <br>			

					        <h5>EDUCATIONAL BACKGROUND</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>schoolDetails
					                        <tr>
					                            <th><center>LEVEL</center></th>
					                            <th><center>SCHOOL ATTENDED</center></th>
					                            <th style="width: 100px;"><center>FROM</center></th>
					                            <th style="width: 100px;"><center>TO</center></th>
					                            <th><center>COURSE / COMPLETED DEGREE / HONORS RECIEVED</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>


					                    				                    		                    	        <?php 
                            $array = explode(",", $row['schoolDetails']);
                            $count = count($array) /5;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <tr>
                            <?php    
                                for ($j = 1; $j <= 5; $j++) {
                                $count = ($i - 1) * 5 + $j-1 ; ?>

                                <td><center>
                                	<?php echo $array[$count]; ?>
                                </center>
                                </td>
                          
                            <?php           
                                }
                                ?>
                                </tr>
                            <?php }
                            ?>
					                 
					                       
					                    </tbody>
					                </table>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Skills <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="skills" rows="2" cols="50" placeholder="Enter Skills"></textarea>
					            </div>
					        </div>
					        <br>			

					        <h5>TRAININGS/SEMINARS ATTENDED </h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>TITLE/TOPIC</center></th>
					                            <th><center>SPONSORING COMPANY</center></th>
					                            <th><center>PLACE</center></th>
					                            <th><center>PERIOD</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>


									     <?php 
				                            $array = explode(",", $row['traininglist']);
				                            $count = count($array) /4;
				                            $initialcount = (int)$count;
				                            for ($i = 1; $i <= $initialcount; $i++) { ?>
				                         <tr>
				                            <?php    
				                                for ($j = 1; $j <= 4; $j++) {
				                                $count = ($i - 1) * 4 + $j-1 ; ?>

				                                <td><center>
				                                	<?php echo $array[$count]; ?>
				                                </center>
				                                </td>
				                          
				                            <?php           
				                                }
				                                ?>
				                                </tr>
				                            <?php }
				                            ?>
					                    </tbody>
					                </table>
					            </div>
					        </div>
					        <br>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Skills <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="skills" rows="2" cols="50" placeholder="Enter Skills" readonly><?php echo $row['skills'];?></textarea>
					            </div>
					        </div>									

	            		</div>
						<div class="tab-pane" id="documents">

					       <div class="card-body">
				        
		

								        <br>
								        	<?php  
								                 $y = 0;
								            $sql1=$fetchdata->GetexamId($uniqId);
								            while($row1=mysqli_fetch_array($sql1)){ 
								                $examId = $row1['examIdList'];

								                  $score = 0;
					                        $questionAnswer = explode(",", $row1['exammAsnswerList']);
					                        $count = count($questionAnswer);
					                        $examineeAnswer = explode(",", $row1['radioBox']);

					                        for ($a = 0; $a < $count; $a++){
					                            if($questionAnswer[$a] == $examineeAnswer[$a]) {
					                                $score++;
					                            }
					                        }

					                        $scoreofExam = ($score/$count)*100;
					                      
					                      	echo  "<div class='d-flex justify-content-center'> <h2>Result : </h2>". ($scoreofExam >= 50 ? "<h1 style='color:green;'> " . round($scoreofExam) : "<h1 style='color:red;'> " . round($scoreofExam)) . " % </h1>" . "</div>";
								   			     		$answerSystem = explode(",",$row1['radioBox']);             
								                $answer = explode(",",$row1['exammAsnswerList']);
								                $x = 0;
								                $answerEssay = explode(",",$row1['essayAnswerList']);
								                $sql_exam = $fetchdata->examQuestion($examId);
								                while($rowExam=mysqli_fetch_array($sql_exam)){    
								   							$examCat =  $rowExam['examCat'];

								        ?>  

						        <br>

										        <div class="form-group row" >
											        <div class="col-sm">
																		            <!-- Exam description -->
																		<!--             <input type="text" class="form-control" id="exammId" placeholder="Expected Salary"  value="<?php echo $rowExam['id'];?>" readonly hidden> 
																		            <label style="font-size:30px; margin-left: 50px;"><?php echo $rowExam['examDescription'];?> -->

													<?php 

												                $exam_desc =  explode(".", $rowExam['examDescription']);

												                if($exam_desc[1] == "png" || $exam_desc[1] == "PNG" || $exam_desc[1] == "jpg" || $exam_desc[1] == "JPG" || $exam_desc[1] == "jpeg" || $exam_desc[1] == "JPEG"){


												                   $imagePath = '/hris/admin/pages/examUpload/' . $rowExam['examDescription'];
												                    echo "<label style='margin-left: 100px;' hidden>". $count . "</label>";
												                   ?>
												                <img src=" <?php echo str_replace("%20", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ?>" alt='Option Image' class='img-fluid mt-2' style='height:125px; margin-left: 20px;' hidden>

												            <?php } else { 
												                  echo "<label style='margin-left: 100px;'>". $count . "</label>";?>
												                    <label style="font-size:20px; margin-left: 50px;"><?php echo $rowExam['examDescription'];?></label>    
												            <?php } ?>
											            	

											            	<?php
											            		if( $examCat != "3"){
												            		if($answerSystem[$y] == $answer[$y]){
												            			echo "<label style='font-size:25px; margin-left: 50px; color: green;' hidden> Correct </label>";
												            		} else {
												            			echo "<label style='font-size:25px; margin-left: 50px; color: red;' hidden> Wrong </label>";
												            		}					            			
											            		}
											            	?>
											            </label>    
											        </div>
											           	<div class="col-sm">
												            <?php
												                $answerSet = explode(",", $rowExam['examAnswerSet']);
												                if ($rowExam['examCat'] == "1") {
												                    echo '<label>Choices </label> ';
												                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $rowExam['examAnswer'] ."' " .$selected. "readonly hidden>" ; 
												                    for ($i = 0; $i < count($answerSet); $i++) {
												                        $selected = ($i == $answer[$y]) ? "checked" : "";
												                        echo "<div class='form-check'>
												                                <input type='radio' id='answer$i' name='correctAnswer' style='margin-top:17px;' value='".$i."' class='form-check-input'  " .$selected. " >
												                                <label class='form-check-label' style='font-size:28px;'  for='answer$i'hidden>".$answerSet[$i] ." </label>
												                              </div>";
												                    }
												                } else if($rowExam['examCat'] == "2") {                
												                    echo '<label hidden>Choices </label> '; 
												                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $rowExam['examAnswer'] ."' readonly hidden>" ;           
												                    for ($i = 0; $i < count($answerSet); $i++) {
												                        $selected = ($i == $answer[$y]) ? "checked" : ""; // Use "checked" for radio buttons                                                 
												                        echo "<div class='form-group' hidden>
												                              <input type='radio' id='answer$i' name='answer' value='".$i."'  style='margin-top:50px;'  class='form-check-input'  " .$selected. " hidden >";
												                        if (!empty($answerSet[$i])) {
												                            $imagePath = '/hris/admin/pages/examUpload/' . $answerSet[$i]; // Adjust this path as needed
												                            echo "<img src='". str_replace(" ", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ."' alt='Option Image' class='img-fluid mt-2' style='height:100px;'hidden>" ; 
												                        }                   
												                        echo "</div>"; 
												                    }
												                } else {
												                    echo "<label>Fill Up</label> ";
												                    echo "<textarea class='form-control' id='essayAnswer' rows='7' cols='50' placeholder='Please fill here your answer!' readonly> " . str_replace("||", ",", $answerEssay[$x]) .  "</textarea>";
												                    $x++;
												                }
												                $y++;
												            ?>
											            </div>
										        </div>
													

										<?php } ?>
									<?php } ?>
				              </div>
						</div>
		
						<div class="tab-pane" id="interview">
								<div class="card-body">
								    <div class="form-group">
								        <label for="notes" class="form-label">HRD INITIAL INTERVIEW</label>
								        <textarea class="form-control" id="notes" rows="10" placeholder="Notes for Applicant" <?php echo (($row['interviewee_status'] == 'Pending') ? "" : "readonly"); ?> ><?php echo htmlspecialchars($row['interviewerNote1']); ?></textarea>
								    </div>								

								    <div class="form-group text-center">
								        <h2 class="font-weight-bold">Recommendation</h2>
								    </div>								

								    <div class="form-group d-flex justify-content-center">
										<div class="form-check me-4">
										    <input type="checkbox" id="checkbox1" class="form-check-input my-checkbox" value="Done" 
										        onclick="toggleCheckboxes(this, 'checkbox2')" 
										        <?php 
										            echo ($row['interviewee_status'] == 'Pending') ? '' : 'disabled'; 								

										        ?> 								

										        <?php  if($row['interviewee_status'] == 'Done' ) {echo "Checked" ; }?>
										    >
										    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Technical Interview</label>
										</div>								

										<div class="form-check">
										    <input type="checkbox" id="checkbox2" class="form-check-input my-checkbox" value="Cancelled" 
										        onclick="toggleCheckboxes(this, 'checkbox1')" 
										        <?php 
										            // Disable checkboxes based on interviewee status
										            echo ($row['interviewee_status'] == 'Pending') ? '' : 'disabled'; 
										            // Check the checkbox if the status is 'Cancelled'
										            // echo ($row['interviewee_status'] == 'Cancelled') ? 'Checked' : ''; 
										        ?> 
										         <?php  if($row['interviewee_status'] == 'Cancelled' ) {echo "Checked" ; }?>
										    >
										    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
										</div>    
									</div>								

									<?php if($row['interviewee_status'] == 'Pending') {?>
									    <div class="form-group text-center mt-4">
									        <button type="submit" class="btn btn-primary btn-lg" id="btnSubmit">Submit</button>
									    </div>
								    <?php } ?>
								</div>
								<br>
								<div class="card-body">
								    <div class="form-group">
								        <label for="notes" class="form-label">INTERVIEW: TECHNICAL SKILLS ASSESSMENT </label>
								        <textarea class="form-control" id="notes2" rows="10" placeholder="Notes for Applicant" <?php echo (($row['interviewee_status'] == 'Done' && $row['interviewer_status'] == 'Pending') ? "" : "readonly"); ?> ><?php echo htmlspecialchars($row['interviewerNote2']); ?></textarea>
								    </div>								

								    <div class="form-group text-center">
								        <h2 class="font-weight-bold">Recommendation</h2>
								    </div>								

								    <div class="form-group d-flex justify-content-center">
										<div class="form-check me-4">
										    <input type="checkbox" id="checkbox3" class="form-check-input my-checkbox2" value="Done" 
										        onclick="toggleCheckboxes(this, 'checkbox4')" 

										         <?php 
										            echo ($row['interviewer_status'] == 'Pending') ? '' : 'disabled'; 								

										        ?> 								

										        <?php  if($row['interviewer_status'] == 'Done' ) {echo "Checked" ; }?>
										      
										    >
										    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Final Interview</label>
										</div>								

										<div class="form-check">
										    <input type="checkbox" id="checkbox4" class="form-check-input my-checkbox2" value="Cancelled" 
										        onclick="toggleCheckboxes(this, 'checkbox3')" 
										      
										          <?php 
										            echo ($row['interviewer_status'] == 'Pending') ? '' : 'disabled'; 								

										        ?> 								

										        <?php  if($row['interviewer_status'] == 'Cancelled' ) {echo "Checked" ; }?>
										    >
										    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
										</div>    
									</div>								

									<?php if($row['interviewee_status'] == 'Done' && $row['interviewer_status'] == 'Pending') {?>
									    <div class="form-group text-center mt-4">
									        <button type="submit" class="btn btn-primary btn-lg" id="btnFinal">Submit</button>
									    </div>
								    <?php } ?>
								</div>


								<?php if($fetchdata->GetFinalAssessmentByID($applicant_id, $emp_id) == '1') { ?>
									<div class="card-body">
									    <div class="form-group">
									        <label for="notes" class="form-label">APPROVAL FOR HIRING </label>
									        <textarea class="form-control" id="notes3" rows="10" placeholder="Notes for Applicant"></textarea>
									    </div>								

									    <div class="form-group text-center">
									        <h2 class="font-weight-bold">Recommendation</h2>
									    </div>								

									    <div class="form-group d-flex justify-content-center">
											<div class="form-check me-4">
											    <input type="checkbox" id="checkbox6" class="form-check-input my-checkbox3" value="Done" 
											        onclick="toggleCheckboxes(this, 'checkbox5')" 

											      
											    >
											    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Hiring</label>
											</div>								

											<div class="form-check">
											    <input type="checkbox" id="checkbox5" class="form-check-input my-checkbox3" value="Cancelled" 
											        onclick="toggleCheckboxes(this, 'checkbox6')" 
											      
											       
											    >
											    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
											</div>    
										</div>								

										
										    <div class="form-group text-center mt-4">
										        <button type="submit" class="btn btn-primary btn-lg" id="btnLast">Submit</button>
										    </div>
									   
									</div>

								<?php } ?>
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
<?php }  ?>
<?php include 'includes/footer.php'; ?>



    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Are you done with the interview ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="finalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Are you done with the interview ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="finalSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="lastModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Approve?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="LastSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>


<script>

	function toggleCheckboxes(checkedCheckbox, otherCheckboxId) {
        const otherCheckbox = document.getElementById(otherCheckboxId);
        if (checkedCheckbox.checked) {
            otherCheckbox.checked = false; // Uncheck the other checkbox
        }
    }


    $(document).on('click','#Btnback',function(){ 
        id=$(this).attr("id");
        window.location.href = "applicant";
    });

    $(document).on('click','#btnSubmit',function(){   
        $("#editModal").modal("show");
    });

    $(document).on('click','#dataSubmit',function(){ 
        $("#dataSubmit").attr("disabled", true); 
        var pick = '53';
        var app_id = '<?php echo $applicant_id; ?>';
        var notes =$.trim(encodeURI($("#notes").val()));


        let arrCheckbox = [];
		let checkboxes = document.querySelectorAll("input[type='checkbox'].my-checkbox:checked");

		checkboxes.forEach((item)=>{
		   arrCheckbox.push(item.value);
		}) 

        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('app_id',app_id);
        fd.append('notes',notes);
        fd.append('arrCheckbox',arrCheckbox);
        $.ajax({

            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
            	console.log(result);
                if($.trim(result)!=0){
                                            $.notify("Request Updated Successfully ","success");   
                             setTimeout(function() { window.location="applicant"; }, 2000);
                }else{
                    $.notify(" Problem Encountered, Please try again later !! ","error");                           
                    $("#dataSubmit").attr("disabled", false); 
                  
                }
            }
        });
    });

    $(document).on('click','#btnFinal',function(){   
        $("#finalModal").modal("show");
    });

    $(document).on('click','#finalSubmit',function(){ 
        $("#finalSubmit").attr("disabled", true); 
        var pick = '54';
        var app_id = '<?php echo $applicant_id; ?>';
        var notes2 =$.trim(encodeURI($("#notes2").val()));


        let arrCheckbox = [];
		let checkboxes = document.querySelectorAll("input[type='checkbox'].my-checkbox2:checked");

		checkboxes.forEach((item)=>{
		   arrCheckbox.push(item.value);
		}) 

        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('app_id',app_id);
        fd.append('notes2',notes2);
        fd.append('arrCheckbox',arrCheckbox);
        $.ajax({

            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
            	console.log(result);
                if($.trim(result)!=0){
                                            $.notify("Request Updated Successfully ","success");   
                             setTimeout(function() { window.location="applicant"; }, 2000);
                }else{
                    $.notify(" Problem Encountered, Please try again later !! ","error");                           
                    $("#dataSubmit").attr("disabled", false); 
                  
                }
            }
        });
    });



     $(document).on('click','#btnLast',function(){   
        $("#lastModal").modal("show");
    });

    $(document).on('click','#LastSubmit',function(){ 
        $("#LastSubmit").attr("disabled", true); 
        var pick = '55';
        var app_id = '<?php echo $applicant_id; ?>';
        var notes3 =$.trim(encodeURI($("#notes3").val()));


        let arrCheckbox2 = [];
		let checkboxes2 = document.querySelectorAll("input[type='checkbox'].my-checkbox3:checked");

		checkboxes2.forEach((item)=>{
		   arrCheckbox2.push(item.value);
		}) 

        var fd = new FormData(); 
        fd.append('pick',pick);
        fd.append('app_id',app_id);
        fd.append('notes3',notes3);
        fd.append('arrCheckbox2',arrCheckbox2);
        $.ajax({

            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
            	console.log(result);
                if($.trim(result)!=0){
                                            $.notify("Request Updated Successfully ","success");   
                             setTimeout(function() { window.location="applicant"; }, 2000);
                }else{
                    $.notify(" Problem Encountered, Please try again later !! ","error");                           
                    $("#LastSubmit").attr("disabled", false); 
                  
                }
            }
        });
    });
</script>