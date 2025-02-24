<title>Applicant Exam</title>
<?php 
	$exam_id = base64_decode($_GET['id']);
    include 'includes/header.php'; 
    $fetchdata=new admin_creation();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Aplicant Exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><a type="button" class="btn btn-danger  fa fa-plus-square mr-2" data-toggle="modal" data-target="#CreateModal">Back </a></li> -->
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
                <h3 class="card-title">Exam Answer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				        
				        <div class="form-group row">
				            <div class="col-sm">
				                <label for="firstName" class="col-sm col-form-label">Exam ID <span style="color:red;">*</span></label>
				                <input type="text" class="form-control" id="examid" value="<?php echo $exam_id; ?>" readonly>
				            </div>
				            <div class="col-sm">
				                <label for="firstName" class="col-sm col-form-label">Position  <span style="color:red;">*</span></label>
				                <input type="text" class="form-control" id="position" placeholder="Expected Salary"  value="<?php echo $position; ?>" readonly>
				            </div>
				        </div>

				        <br>
				        	<?php  
				                 $y = 0;
				            $sql=$fetchdata->GetexamId($exam_id);
				            while($row=mysqli_fetch_array($sql)){ 
				                $examId = $row['examIdList'];

				                  $score = 0;
	                        $questionAnswer = explode(",", $row['exammAsnswerList']);
	                        $count = count($questionAnswer);
	                        $examineeAnswer = explode(",", $row['radioBox']);

	                        for ($a = 0; $a < $count; $a++){
	                            if($questionAnswer[$a] == $examineeAnswer[$a]) {
	                                $score++;
	                            }
	                        }

	                        $scoreofExam = ($score/$count)*100;
	                      
	                      	echo  "<div class='d-flex justify-content-center'> <h2>Result : </h2>". ($scoreofExam >= 50 ? "<h1 style='color:green;'> " . round($scoreofExam) : "<h1 style='color:red;'> " . round($scoreofExam)) . " % </h1>" . "</div>";
				   			     		$answerSystem = explode(",",$row['radioBox']);             
				                $answer = explode(",",$row['exammAsnswerList']);
				                $x = 0;
				                $answerEssay = explode(",",$row['essayAnswerList']);
				                $sql_exam = $fetchdata->examQuestion($examId);
				                while($rowExam=mysqli_fetch_array($sql_exam)){    
				   							$examCat =  $rowExam['examCat'];

				        ?>  

				        <hr>

						        <div class="form-group row" >
							        <div class="col-sm">
														            <!-- Exam description -->
														<!--             <input type="text" class="form-control" id="exammId" placeholder="Expected Salary"  value="<?php echo $rowExam['id'];?>" readonly hidden> 
														            <label style="font-size:30px; margin-left: 50px;"><?php echo $rowExam['examDescription'];?> -->

														                        <?php 

								                $exam_desc =  explode(".", $rowExam['examDescription']);

								                if($exam_desc[1] == "png" || $exam_desc[1] == "PNG" || $exam_desc[1] == "jpg" || $exam_desc[1] == "JPG" || $exam_desc[1] == "jpeg" || $exam_desc[1] == "JPEG"){


								                   $imagePath = '/hris/admin/pages/examUpload/' . $rowExam['examDescription'];
								                    echo "<label style='margin-left: 100px;'>". $count . "</label>";
								                   ?>
								                <img src=" <?php echo str_replace("%20", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ?>" alt='Option Image' class='img-fluid mt-2' style='height:125px; margin-left: 20px;'>

								            <?php } else { 
								                  echo "<label style='margin-left: 100px;'>". $count . "</label>";?>
								                    <label style="font-size:20px; margin-left: 50px;"><?php echo $rowExam['examDescription'];?></label>    
								            <?php } ?>
							            	

							            	<?php
							            		if( $examCat != "3"){
								            		if($answerSystem[$y] == $answer[$y]){
								            			echo "<label style='font-size:25px; margin-left: 50px; color: green;'> Correct </label>";
								            		} else {
								            			echo "<label style='font-size:25px; margin-left: 50px; color: red;'> Wrong </label>";
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
								                                <label class='form-check-label' style='font-size:28px;'  for='answer$i'>".$answerSet[$i] ." </label>
								                              </div>";
								                    }
								                } else if($rowExam['examCat'] == "2") {                
								                    echo '<label>Choices </label> '; 
								                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $rowExam['examAnswer'] ."' readonly hidden>" ;           
								                    for ($i = 0; $i < count($answerSet); $i++) {
								                        $selected = ($i == $answer[$y]) ? "checked" : ""; // Use "checked" for radio buttons                                                 
								                        echo "<div class='form-group'>
								                              <input type='radio' id='answer$i' name='answer' value='".$i."'  style='margin-top:50px;'  class='form-check-input'  " .$selected. " >";
								                        if (!empty($answerSet[$i])) {
								                            $imagePath = '/hris/admin/pages/examUpload/' . $answerSet[$i]; // Adjust this path as needed
								                            echo "<img src='". str_replace(" ", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ."' alt='Option Image' class='img-fluid mt-2' style='height:100px;'>" ; 
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
										<hr>

								        <?php } ?>
								    <?php } ?>


	       

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   

  </div>




<?php include 'includes/footer.php'; ?>
