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
                <li><a type="button" class="btn btn-primary mr-1" data-toggle="modal" id="SetSecondInterview"> Set Interview </a></li>
                <li><a type="button" class="btn btn-info  mr-1" data-toggle="modal" id="AddApplicant"> Add Applicant</a></li>
                <li><a type="button" class="btn btn-danger  mr-1" data-toggle="modal" id="Btnback">Back</a></li>
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
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Desired Position <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="position" placeholder="Enter Position" value="<?php echo $row['position_desc'];?>" readonly>
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
					                <textarea class="form-control" id="completecurrentaddress" rows="2" cols="50" placeholder="Complete Current Address" readonly> <?php echo $row['completecurrentaddress'];?></textarea>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">Complete Provincial Address <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="completeprobaddress" rows="2" cols="50" placeholder="Complete Provincial Address" readonly> <?php echo $row['completeprobaddress'];?></textarea>
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

					        <h5>FAMILY BACKGROUND</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>RELATIONSHIP</center></th>
					                            <th><center>NAME</center></th>
					                            <th><center>DATE OF BIRTH</center></th>
					                            <th><center>AGE</center></th>
					                            <th><center>OCCUPATION/ COMPANY</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>


					                    	<?php 
 					                           $array = explode(",", $row['familyInfo']);
					                            $count = count($array) /5;
					                            $initialcount = (int)$count;
					                            for ($i = 1; $i <= $initialcount; $i++) { ?>
					                         <tr>
					                            <?php    
					                                for ($j = 1; $j <= 5; $j++) {
					                                $count = ($i - 1) * 5 + $j-1 ; ?>
					                                <td><center>
					                                	 <input type="text" class="form-control" id="immeditate_fam" placeholder="Language/Dialect Spoken" value="<?php echo $array[$count]; ?>" hidden>
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
                                	<?php echo str_replace('||',',',$array[$count]); ?>
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
                                	 <input type="text" class="form-control" id="educational" placeholder="Language/Dialect Spoken" value="<?php echo $array[$count]; ?>" hidden>
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


	<!-- 				                        <?php //for($i = 1; $i<=6 ; $i++) { ?>
					                        <tr>
					                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Topic"></td>
					                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Sponsoring Company"></td>
					                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Place"></td>
					                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Period"></td>
					                        </tr>
					                        <?php //} ?> -->
					                       
					                    </tbody>
					                </table>
					            </div>
					        </div>
					        <br>			

					        <h5>GOVERNMENT EXAMINATION TAKEN</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>NATURE OF EXAM</center></th>
					                            <th><center>DATE TAKEN</center></th>
					                            <th><center>RESULT/ RATING</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                       
					     <?php 
                            $array = explode(",", $row['governmentexamlist']);
                            $count = count($array) /3;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <tr>
                            <?php    
                                for ($j = 1; $j <= 3; $j++) {
                                $count = ($i - 1) * 3 + $j-1 ; ?>

                                <td><center>
                                	<?php if($array[$count] == "") { echo " "; } else { echo $array[$count]; }  ?>
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

					        <h5>CHARACTER REFERENCES (not related to you)</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>NAME</center></th>
					                            <th><center>ADDRESS</center></th>
					                            <th><center>TEL. OR CELLPHONE NO.</center></th>
					                            <th><center>OCCUPATION</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>
					     <?php 
                            $array = explode(",", $row['characterReference']);
                            $count = count($array) /4;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <tr>
                            <?php    
                                for ($j = 1; $j <= 4; $j++) {
                                $count = ($i - 1) * 4 + $j-1 ; ?>

                                <td><center>
                                	<?php if($array[$count] == "") { echo " "; } else { echo $array[$count]; }  ?>
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

					        <h5>PERSON KNOWN TO BE CONNECTED WITH TEXWIPE ASIA-ADVANCED MOLDING COMPANY, INC.</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <table>
					                    <thead>
					                        <tr>
					                            <th><center>NAME</center></th>
					                            <th><center>POSITION</center></th>
					                            <th><center>RELATIONSHIP</center></th>
					                        </tr>
					                    </thead>
					                    <tbody>
					     <?php 
                            $array = explode(",", $row['contactperson']);
                            $count = count($array) /3;
                            $initialcount = (int)$count;
                            for ($i = 1; $i <= $initialcount; $i++) { ?>
                         <tr>
                            <?php    
                                for ($j = 1; $j <= 3; $j++) {
                                $count = ($i - 1) * 3 + $j-1 ; ?>

                                <td><center>
                                	<?php if($array[$count] == "") { echo " "; } else { echo $array[$count]; }  ?>
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
					                <label for="firstName" class="col-sm col-form-label">SSS No.<span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="sss" placeholder="Enter SSS No."value="<?php echo $row['sss'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">TIN <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="tin" placeholder="Enter TIN"value="<?php echo $row['tin'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">PHILHEALTH NO:<span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="philhealth" placeholder="Enter SSS No."value="<?php echo $row['philhealth'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">PAG-IBIG NO: <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="pagibig" placeholder="Enter TIN"value="<?php echo $row['pagibig'];?>" readonly>
					            </div>
					        </div>
					        <br>			

					        <h5>PERSON TO CONTACT IN CASE OF EMERGENCY</h5>
					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">NAME:<span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="contactPersonRel" placeholder="Enter Relationship Name" value="<?php echo $row['contactPersonRel'];?>" readonly>
					            </div>
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">RELATIONSHIP: <span style="color:red;">*</span></label>
					                <input type="text" class="form-control" id="contactRelation" placeholder="Enter Relationship"value="<?php echo $row['contactRelation'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm-2">
					                <label for="firstName" class="col-sm col-form-label">Contact Number:<span style="color:red;">*</span></label>
					            </div>
					            <div class="col-sm-6">
					                <input type="text" class="form-control" id="contactContactnum" placeholder="Enter Contact Number (e.g 09XXXXXXX)"value="<?php echo $row['contactContactnum'];?>" readonly>
					            </div>
					        </div>			

					        <div class="form-group row">
					            <div class="col-sm">
					                <label for="firstName" class="col-sm col-form-label">ADDRESS: <span style="color:red;">*</span></label>
					                <textarea class="form-control" id="contactaddress" rows="2" cols="50" placeholder="Complete Current Address" readonly><?php echo $row['contactaddress'];?>"</textarea>
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



	                          if($scoreofExam == 100){ 

                                    $passed = 1;
                                ?>
                               
                                <h1 style='color:#39FF14;'> <center> Very Satisfied </center></h1>
                               
                            <?php  } else if($scoreofExam < 100 && $scoreofExam > 88  ){ 
                                 $passed = 1;?>
                               
                                <h1 style='color: #2E8B57;'> <center> Satisfied </center></h1>
                          
                            <?php  } else if($scoreofExam < 88 && $scoreofExam > 70  ){
                             $passed = 1; ?>
                               
                                <h1 style='color: #2E8B57;'> <center> Above Average </center></h1>
                                
                            <?php  } else if($scoreofExam < 70 && $scoreofExam > 49  ){ 
                                 $passed = 1;?>
                                
                                <h1 style='color:#043927;'> <center> Average </center></h1>
                       
                            <?php  } else {
                             $passed = 0; ?>
                               
                                <h1 style='color:#D22B2B;'> <center> Low Average </center></h1>
                                
                            <?php  }
	                      
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
							<input type="text" class="form-control" value="<?php echo $fetchdata->selectApprover( $row['interviewee']); ?>" readonly>
  					  	</div>	




								    <div class="form-group">
								        <label for="notes" class="form-label">HRD INITIAL INTERVIEW</label>
								        <textarea class="form-control" id="notes" rows="10" placeholder="Notes for Applicant" readonly <?php echo (($row['interviewee_status'] == 'Pending') ? "" : "readonly"); ?> ><?php echo htmlspecialchars($row['interviewerNote1']); ?></textarea>
								    </div>								

								    <div class="form-group text-center">
								        <h2 class="font-weight-bold">Recommendation <?php //echo $row['interviewee']; ?></h2>
								    </div>								





								    <div class="form-group d-flex justify-content-center">
										<div class="form-check me-4">
										    <input type="checkbox" id="checkbox1" class="form-check-input my-checkbox" value="Done" 
										        onclick="toggleCheckboxes(this, 'checkbox2')" disabled
										        <?php  if($row['interviewee_status'] == 'Done' ) {echo "Checked" ; }?>>
										    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Technical Interview</label>
										</div>								

										<div class="form-check">
										    <input type="checkbox" id="checkbox2" class="form-check-input my-checkbox" value="Cancelled" 
										        onclick="toggleCheckboxes(this, 'checkbox1')" disabled> 
										         <?php  if($row['interviewee_status'] == 'Cancelled' ) {echo "Checked" ; }?>
										    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
										</div>    
									</div>								

								</div>
								<br>
								<div class="card-body">

													 		<div class="form-group">
							<input type="text" class="form-control" value="<?php echo $fetchdata->selectApprover( $row['interviewer']); ?>" readonly>
  					  	</div>	



								    <div class="form-group">
								        <label for="notes" class="form-label">INTERVIEW: TECHNICAL SKILLS ASSESSMENT</label>
								        <textarea class="form-control" id="notes2" rows="10" placeholder="Notes for Applicant" disabled ><?php echo htmlspecialchars($row['interviewerNote2']); ?></textarea>
								    </div>								

								    <div class="form-group text-center">
								        <h2 class="font-weight-bold">Recommendation</h2>
								    </div>								

								    <div class="form-group d-flex justify-content-center">
										<div class="form-check me-4">
										    <input type="checkbox" id="checkbox3" class="form-check-input my-checkbox2" value="Done" 
										        onclick="toggleCheckboxes(this, 'checkbox4')"  disabled
										        <?php  if($row['interviewer_status'] == 'Done' ) {echo "Checked" ; }?>  >
										    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Final Interview</label>
										</div>								

										<div class="form-check">
										    <input type="checkbox" id="checkbox4" class="form-check-input my-checkbox2" value="Cancelled" 
										        onclick="toggleCheckboxes(this, 'checkbox3')" disabled
										        <?php  if($row['interviewer_status'] == 'Cancelled' ) {echo "Checked" ; }?>
										    >
										    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
										</div>    
									</div>								
								</div>

								<br>

																	<div class="card-body">

										<div class="form-group">
											<input type="text" class="form-control" value="<?php echo $fetchdata->selectApprover( $row['final_interviewer']); ?>" readonly>
				  					  	</div>	

									    <div class="form-group">
									        <label for="notes" class="form-label">APPROVAL FOR HIRING </label>
									        <textarea class="form-control" id="notes3" rows="10" placeholder="Notes for Applicant"readonly> <?php echo $row['final_note']; ?></textarea>
									    </div>								

									    <div class="form-group text-center">
									        <h2 class="font-weight-bold">Recommendation</h2>
									    </div>								

									    <div class="form-group d-flex justify-content-center">
											<div class="form-check me-4">
											    <input type="checkbox" id="checkbox6" class="form-check-input my-checkbox3" value="Done" 
											        onclick="toggleCheckboxes(this, 'checkbox5')" <?php  if($row['final_status'] == 'Done' ) {echo "Checked" ; }?> disabled >
											    <label class="form-check-label" for="checkbox1" style="font-size: 25px;">Refer for Hiring</label>
											</div>								

											<div class="form-check">
											    <input type="checkbox" id="checkbox5" class="form-check-input my-checkbox3" value="Cancelled" 
											        onclick="toggleCheckboxes(this, 'checkbox6')"    <?php  if($row['final_status'] == 'Cancelled' ) {echo "Checked" ; }?> disabled>
											    <label class="form-check-label" for="checkbox2" style="font-size: 25px;">Declined</label>
											</div>    
										</div>	
									</div>

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
<?php }  ?>
<?php include 'includes/footer.php'; ?>


  <!-- approve -->
    <div class="modal fade" id="getSecondInterview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Select Interviewer 1</label>
		 				<select name="cars" id="firstapprover" class="form-control">
		 					<option value="" selected> </option>
              			    <?php
                                $sql1=$fetchdata->getAllworkEmail();
                                while($r=mysqli_fetch_array($sql1)){ ?>
                                	<option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                            <?php } ?>
                        </select> 
                    </div>



                    <div class="form-group">
                        <label>Select Interviewer 2</label>
		 				<select name="cars" id="secondapprover" class="form-control">
		 					<option value="" selected> </option>
              			    <?php
                                $sql1=$fetchdata->getAllworkEmail();
                                while($r=mysqli_fetch_array($sql1)){ ?>
                                	<option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                            <?php } ?>
                        </select> 
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="setApplicant">Set</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>


  <!-- reject -->
    <div class="modal fade" id="rejectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Date Hired <span style="color:red;">*</span></label>
                     	<input type="date" class="form-control" id="date_hired">		    
                    </div>

                    <div class="form-group">
			            <label>Employee ID <span style="color:red;">*</span></label>
                     	<input type="text" class="form-control" id="employeeId" placeholder="Employee ID" >
                    </div>

                    <div class="form-group">
                       <label>Payroll Type (Monthly / Daily) <span style="color:red;">*</span></label>
                        <select class="form-control" id="emp_status_1">
                            <option value=""  selected> Select Status </option>
                            <option value="Monthly"  >Monthly</option>                           
                            <option value="Daily"  > Daily </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Employee Status (Probationary / Regular) <span style="color:red;">*</span></label>
                        <select class="form-control" id="emp_status_2">
                            <option value=""  selected> Select Status </option>
                            <option value="Probationary"  >Probationary</option>                           
                            <option value="Regular"  > Regular </option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    	<label>Gender <span style="color:red;">*</span></label>
                        <select class="form-control" id="gender">
                            <option value=""  selected> Select Gender </option>
                            <option value="Male"  >Male</option>                           
                            <option value="Female"  > Female </option>
                        </select>
                    </div>
                                       
                    <div class="form-group" >
                        <label>Position <span style="color:red;">*</span></label>
                        <input list="positions"  class="form-control" id="position" placeholder="Enter Employee Position" >
                        <datalist id="positions">
                          <?php
                              $sql=$fetchdata->selectPosition();
                              while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($row['position_desc']);?>">
                          <?php } ?>
                        </datalist>
                   
                        <label>Department <span style="color:red;">*</span></label>
                        <input list="departments"  class="form-control" id="department" placeholder="Enter Employee Department" >
                        <datalist id="departments">
                          <?php
                                $sql=$fetchdata->selectDepartment();
                               while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($row['dept_description']);?>">
                          <?php } ?>
                        </datalist>
                    </div>
          
                  	 <div class="form-group" >
                      <label>First Approver</label>
                        <select name="cars" id="firstapprover1" class="form-control">
                          <option value="" ><?php echo "";?></option>
                          <?php
                                $sql=$fetchdata->selectAllapprover();
                               while($r=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                          <?php } ?>
                        </select>
               
                        <label>Final Approver</label>
                        <select name="cars" id="finalapprover1" class="form-control">
                          <option value="" ><?php echo "";?></option>
                          <?php
                                $sql=$fetchdata->selectAllapprover();
                               while($r=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo htmlentities($r['emp_id']);?>"> <?php echo $r['Lastname'] . ", " . $r['Firstname'] ?></option>
                          <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="rejectSubmit">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

<script>

    $(document).on('click','.view_btn',function(){ 
        id=$(this).attr("id");
        window.open("examReview?id=" + id );
    });

    $(document).on('click','#SetSecondInterview',function(){ 
        $("#getSecondInterview").modal("show");
    });

    $(document).on('click','#setApplicant',function(){ 
    	$("#setApplicant").attr("disabled", true); 
    	var firstapprover=$.trim(encodeURI($("#firstapprover").val()));
    	var secondapprover=$.trim(encodeURI($("#secondapprover").val()));
     	var applicant_id='<?php echo $applicant_id; ?>';
     	var pick = '61';

        var fd = new FormData();  
        fd.append('firstapprover',firstapprover);
        fd.append('secondapprover',secondapprover);        
        fd.append('applicant_id',applicant_id);
        fd.append('pick',pick);

        $.ajax({
            url: "codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
	             console.log(result); 
	             if($.trim(result)==1){
	               $.notify("Request Submitted","success");   
	               setTimeout(function() { location.href = "applicants";  }, 2000);
	             }else{
	               $.notify("Problem Encountered Please try again later","error");                           
	               $("#setApplicant").attr("disabled", false); 
	             }                       
            }
        });

    });


    $(document).on('click','#AddApplicant',function(){ 
        id=$(this).attr("id");
        $("#rejectModal").modal("show");
    });


    $(document).on('click','#rejectSubmit',function(){ 
    	$("#rejectSubmit").attr("disabled", true); 
    	var pick = '62';
    	var employeeId=$.trim(encodeURI($("#employeeId").val()));
    	var firstName=$.trim(encodeURI($("#firstName").val()));
    	var MiddleName=$.trim(encodeURI($("#MiddleName").val()));
    	var lastName=$.trim(encodeURI($("#lastName").val()));
    	var dateHired=$.trim(encodeURI($("#date_hired").val()));
    	var emp_status_1=$.trim(encodeURI($("#emp_status_1").val()));
    	var emp_status_2=$.trim(encodeURI($("#emp_status_2").val()));
    	var civilstatus=$.trim(encodeURI($("#civilstatus").val()));
    	var gender=$.trim(encodeURI($("#gender").val()));
    	var birthday=$.trim(encodeURI($("#birthday").val()));
    	var phone=$.trim(encodeURI($("#phone").val()));
    	var contactPersonRel=$.trim(encodeURI($("#contactPersonRel").val()));
    	var contactContactnum=$.trim(encodeURI($("#contactContactnum").val()));
    	var contactRelation=$.trim(encodeURI($("#contactRelation").val()));
    	var sss=$.trim(encodeURI($("#sss").val()));
    	var tin=$.trim(encodeURI($("#tin").val()));
    	var philhealth=$.trim(encodeURI($("#philhealth").val()));
    	var pagibig=$.trim(encodeURI($("#pagibig").val()));
    	var completecurrentaddress=$.trim(encodeURI($("#completecurrentaddress").val()));
    	var completeprobaddress=$.trim(encodeURI($("#completeprobaddress").val()));
		var applicant_id = '<?php echo $applicant_id ; ?>';

        let sampletextBoxes = document.querySelectorAll('input[id="immeditate_fam"]'); // Adjust selector as needed
        let arrTextBox1 = [];
        var textBox = arrTextBox1;
        sampletextBoxes.forEach((textbox) => {
            arrTextBox1.push(textbox.value);
        });

        let educationalBoxes = document.querySelectorAll('input[id="educational"]'); // Adjust selector as needed
        let educationalBox1 = [];
        educationalBoxes.forEach((textbox) => {
            educationalBox1.push(textbox.value);
        });

    	var positions=$.trim(encodeURI($("#position").val()));
    	var departments=$.trim(encodeURI($("#department").val()));
    	var firstapprover=$.trim(encodeURI($("#firstapprover1").val()));
    	var finalapprover=$.trim(encodeURI($("#finalapprover1").val()));
    	
		if(employeeId == "" || dateHired == "" || emp_status_1 == "" || emp_status_2 == "" || gender == "" || positions == "" || departments == ""){		
	        $.notify("Field Found Empty","error");                           
	        $("#rejectSubmit").attr("disabled", false); 
		} else {
			var fd = new FormData();  
			fd.append('pick', pick);
			fd.append('employeeId', employeeId);
			fd.append('firstName', firstName);
			fd.append('MiddleName', MiddleName);
			fd.append('lastName', lastName);
			fd.append('dateHired', dateHired);
			fd.append('emp_status_1', emp_status_1);
			fd.append('emp_status_2', emp_status_2);
			fd.append('civilstatus', civilstatus);
			fd.append('gender', gender);
			fd.append('birthday', birthday);
			fd.append('phone', phone);
			fd.append('contactPersonRel', contactPersonRel);
			fd.append('contactContactnum', contactContactnum);
			fd.append('contactRelation', contactRelation);
			fd.append('sss', sss);
			fd.append('tin', tin);
			fd.append('philhealth', philhealth);
			fd.append('pagibig', pagibig);
			fd.append('completecurrentaddress', completecurrentaddress);
			fd.append('completeprobaddress', completeprobaddress);
			fd.append('arrTextBox1', arrTextBox1);
			fd.append('educationalBox1', educationalBox1);
			fd.append('applicant_id', applicant_id);



			fd.append('positions', positions);
			fd.append('departments', departments);
			fd.append('firstapprover', firstapprover);
			fd.append('finalapprover', finalapprover);


	        $.ajax({
	            url: "codes/admin_control.php",
	            data: fd,
	            processData: false,
	            contentType: false,
	            type:'POST',
	            success:function(result){
		             // console.log(result); 
		             if($.trim(result)==1){
		               $.notify("Request Submitted","success");   
		               setTimeout(function() { location.href = "applicants";  }, 2000);
		             }else{
		               $.notify("Problem Encountered Please try again later","error");                           
		               $("#rejectSubmit").attr("disabled", false); 
		             }                       
	            }
	        });

		}

    
    });


    $(document).on('click','#Btnback',function(){ 
    	window.location.href = "applicants";
    });

</script>

