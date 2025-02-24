<?php
    $exam_id = $_GET['id'];
    $position = $_GET['position'];
  
    include 'pages/codes/function.php';
    $fetchdata=new admin_creation();

    date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile Sheet</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    </style>
</head>
<body>
    <div class="container profile-sheet">
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <tbody>
                        <tr>
                            <th><h2 class="text-center">Applicant Exam Result</h2></th>
                            <th style="width: 35%"><center> <img src="dist/img/texwipe.png" width="50%"></center></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
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
        <hr>
        <?php  
                 $y = 0;
            $sql=$fetchdata->GetexamId($exam_id);
            while($row=mysqli_fetch_array($sql)){ 
                $examId = $row['examIdList'];



                $answer = explode(",",$row['radioBox']);
                $x = 0;
                $answerEssay = explode(",",$row['essayAnswerList']);
                $sql_exam = $fetchdata->examQuestion($examId);
                while($rowExam=mysqli_fetch_array($sql_exam)){    
   
          
        ?>  
        <div class="form-group row" hidden>
         <div class="col-sm">
            <!-- Exam description -->
            <input type="text" class="form-control" id="exammId" placeholder="Expected Salary"  value="<?php echo $rowExam['id'];?>" readonly hidden> 
            <label style="font-size:30px; margin-left: 50px;"><?php echo $rowExam['examDescription'];?></label>    
          </div>
           <div class="col-sm">
            <?php 
                          

                echo $rowExam['essayAnswerList'];
                $answerSet = explode(",", $rowExam['examAnswerSet']);
                if ($rowExam['examCat'] == "1") {
                    echo '<label>Choices </label> ';
                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $rowExam['examAnswer'] ."' " .$selected. "readonly hidden>" ; 
                    for ($i = 0; $i < count($answerSet); $i++) {
                        $selected = ($i == $answer[$i]) ? "checked" : "";
                        echo "<div class='form-check'>
                                <input type='radio' id='answer$i' name='correctAnswer' style='margin-top:17px;' value='".$i."' class='form-check-input'  " .$selected. " >
                                <label class='form-check-label' style='font-size:28px;'  for='answer$i'>".$answerSet[$i] ." " . $answer[$x]. "</label>
                              </div>";
                    }
                } else if($rowExam['examCat'] == "2") {                
                    echo '<label>Choices </label> '; 
                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $rowExam['examAnswer'] ."' readonly hidden>" ;           
                    for ($i = 0; $i < count($answerSet); $i++) {
                        $selected = ($i == $answer[$i]) ? "checked" : ""; // Use "checked" for radio buttons                                                 
                        echo "<div class='form-group'>
                              <input type='radio' id='answer$i' name='answer' value='".$i."'  style='margin-top:50px;'  class='form-check-input'  " .$selected. " >";
                        if (!empty($answerSet[$i])) {
                            $imagePath = '/hris/admin/pages/examUpload/' . $answerSet[$i]; // Adjust this path as needed
                            echo "<img src='". str_replace("%20", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ."' alt='Option Image' class='img-fluid mt-2' style='height:100px;'>";
                        }                   
                        echo "</div>"; 
                    }
                } else {
                    echo "<label>Fill Up</label> ";
                    echo "<textarea class='form-control' id='essayAnswer' rows='7' cols='50' placeholder='Please fill here your answer!' > " . str_replace("||", ",", $answerEssay[$x]) .  "</textarea>";
                    $x++;
                }

            ?>
            </div>
        </div>

        <?php
                } ?>
         
                <div class="d-flex justify-content-center">
                    <?php
                
                            $score = 0;

                            if($row['examCat'] != 3 ||$row['examCat'] != "3" ) { 
                            $questionAnswer = explode(",", $row['exammAsnswerList']);
                            $count = count($questionAnswer);
                            $examineeAnswer = explode(",", $row['radioBox']);

                            for ($a = 0; $a < $count; $a++){
                                if($questionAnswer[$a] == $examineeAnswer[$a]) {
                                    $score++;
                                }
                            }

                            $scoreofExam = ($score/$count)*100;
                            if($scoreofExam == 100){ 

                                    $passed = 1;
                                ?>
                               
                                <h1 style='color:#39FF14;'>Very Satisfied</h1>
                               
                            <?php  } else if($scoreofExam < 100 && $scoreofExam > 88  ){ 
                                 $passed = 1;?>
                               
                                <h1 style='color: #2E8B57;'>Satisfied</h1>
                          
                            <?php  } else if($scoreofExam < 88 && $scoreofExam > 70  ){
                             $passed = 1; ?>
                               
                                <h1 style='color: #2E8B57;'>Above Average</h1>
                                
                            <?php  } else if($scoreofExam < 70 && $scoreofExam > 49  ){ 
                                 $passed = 1;?>
                                
                                <h1 style='color:#043927;'>Average</h1>
                       
                            <?php  } else {
                             $passed = 0; ?>
                               
                                <h1 style='color:#D22B2B;'>Low Average</h1>
                                
                            <?php  } } ?> 
              

                </div>
                <div class="d-flex justify-content-center">
                     <?php
                    
                            echo "<div >". ($scoreofExam >= 50 ? "<h1 style='color:green;'>" . round($scoreofExam) : "<h1 style='color:red;'>" . round($scoreofExam)) . " %</h1></div>";
                           if( $passed != 0){
                            echo "<h2> Please wait for Human Resources for your next step. </h2>"; 
                        }
                    ?>


                </div>
        <?php     
            }
        ?>

        <br><br>
        <div class="d-flex justify-content-center">
            
                <?php  

                  
                          if($fetchdata->countReExam($exam_id) < 3 || $passed == "0" ||  $passed = 0){  ?>
                    <button type="submit" class="btn btn-success" id="btnRetake"> Retake Exam </button>

                  
                <?php  } else { ?>

                    <button type="submit" class="btn btn-primary" id="btnSubmit"> Done </button>
         
                <?php  }  ?> 
        </div>


       
    </div>

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Are you done with the exam ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>

    <div class="modal fade" id="retakeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Re-Take exam ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataRetake">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/notify/notify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">


    $(document).on('click','#btnRetake',function(){   
        $("#retakeModal").modal("show");
    });

    $(document).on('click','#dataRetake',function(){   
        var examid =$.trim(encodeURI($("#examid").val()));
        var position =$.trim(encodeURI($("#position").val()));
         window.location.href = "applicantExam?id=" + examid + "&position=" + position;
    });
    
    $(document).on('click','#btnSubmit',function(){   
         window.location.href = "index";
    });
</script>