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

        input[type=radio] {
             

    width: 100%;
    height: 2em;
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
                            <th><h2 class="text-center">Applicant Exam</h2></th>
                            <th style="width: 35%"><center> <img src="dist/img/texwipe.png" width="50%"></center></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <h2 class="text-center">Applicant Profile Sheet</h2> -->
                <br>
  

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

 <h3> PLEASE FILL UP ALL THE NECESSARY DETAILS OR FIND THE FIGURE THAT WILL COMPLETE THE SERIES, SELECT YOUR CHOSEN ANSWER.</h3>
        <br>


           
        <hr>
        <?php  

            $count = 1;
            $sql=$fetchdata->examType($position);
            while($row=mysqli_fetch_array($sql)){ 


        ?>
        <div class="form-group row">
         <div class="col-sm">
            <!-- Exam description -->
            <input type="text" class="form-control" id="exammId" placeholder="Expected Salary"  value="<?php echo $row['id'];?>" readonly hidden> 


            <?php 

                $exam_desc =  explode(".", $row['examDescription']);

                if($exam_desc[1] == "png" || $exam_desc[1] == "PNG" || $exam_desc[1] == "jpg" || $exam_desc[1] == "JPG" || $exam_desc[1] == "jpeg" || $exam_desc[1] == "JPEG"){


                   $imagePath = '/hris/admin/pages/examUpload/' . $row['examDescription'];
                    echo "<label style='margin-left: 100px;'>". $count . "</label>";
                   ?>
                <img src=" <?php echo str_replace("%20", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ?>" alt='Option Image' class='img-fluid mt-2' style='height:125px; margin-left: 20px;'>

            <?php } else { 
                  echo "<label style='margin-left: 100px;'>". $count . "</label>";?>
                    <label style="font-size:20px; margin-left: 50px;"><?php echo $row['examDescription'];?></label>    
            <?php } ?>
            
          </div>
        </div>

        <div class="form-group row">
           <div class="col-sm">
            <?php 
                $answerSet = explode(",", $row['examAnswerSet']);
                if ($row['examCat'] == "1") {
                    echo '<label>Choices </label> ';
                    echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $row['examAnswer'] ."' readonly hidden>" ; 
                    for ($i = 0; $i < count($answerSet); $i++) {
                        $selected = ($i == $row['examAnswer']) ? "checked" : "";
                        echo "<div class='form-check'>
                                <input type='radio' id='answer$count' name='correctAnswer$count' style='margin-top:17px;' value='".$i."' class='form-check-input' style='height:100px;'>
                                <label class='form-check-label' style='font-size:28px;'  for='answer$i'>".$answerSet[$i]."</label>
                              </div>";
                    }
                } else if($row['examCat'] == "2") {                
                 
                    // echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $row['examAnswer'] ."' readonly hidden>" ;           

                    // echo "<div class='container'>
                    //             <div class='row'>";

                    // for ($i = 0; $i < count($answerSet); $i++) {
                    //     echo  "<div class='col-sm'>";
                    //     $selected = ($i == $row['examAnswer']) ? "checked" : ""; // Use "checked" for radio buttons                                                 
                    //     echo "<div class='form-group' > <div class=row'>
                    //          ";
                    //     if (!empty($answerSet[$i])) {
                    //         $imagePath = '/hris/admin/pages/examUpload/' . str_replace(' ','',$answerSet[$i]) ; // Adjust this path as needed
                    //         echo "

                                  
                    //         <div class='col-sm'>
                    //              <input type='radio' id='answer$count' name='answer$count' value='".$i."'  class='form-check-input' style=' margin-top: 110px;margin-left: -40px;' >
                    //              <img src='". str_replace("%20", "",stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ."' alt='Option Image' class='img-fluid mt-2' style='height:100px;'>
                    //         </div>"  ;
                    //     }   

                    //      echo "</div>";          
                    //     echo "</div>"; 
                    //    echo "</div>";  
                    // }
                  

                  echo "<input type='text' class='form-control' id='exammAsnswer' placeholder='Expected Salary'  value='". $row['examAnswer'] ."' readonly hidden>";

echo "<div class='container'>
        <div class='row'>";

for ($i = 0; $i < count($answerSet); $i++) {
    // Start a new row for every two images
    if ($i % 2 == 0 && $i != 0) {
        echo "</div><div class='row'>";
    }
    
    echo "<div class='col-sm-6'>"; // Two columns per row
    $selected = ($i == $row['examAnswer']) ? "checked" : ""; // Use "checked" for radio buttons
    echo "<div class='form-group'>
            <div class='row'>";

    if (!empty($answerSet[$i])) {
        $imagePath = '/hris/admin/pages/examUpload/' . str_replace(' ', '', $answerSet[$i]); // Adjust this path as needed
        echo "<div class='col-sm-12'>
                <input type='radio' id='answer$count' name='answer$count' value='".$i."' class='form-check-input' style='margin-top: 20px;'>
                <img src='". str_replace("%20", "", stripslashes(htmlentities(htmlspecialchars(urldecode($imagePath))))) ."' alt='Option Image' class='img-fluid mt-2' style='height:100px;'>
              </div>";
    }   

    echo "</div>";          
    echo "</div>"; 
    echo "</div>";  
}

echo "</div>"; // Close the last row
echo "</div>"; // Close the container


                } else {
                    echo "<textarea class='form-control' id='essayAnswer' rows='7' cols='50' placeholder='Please fill here your answer!' ></textarea>";
                }
            ?>
            </div>
        </div>
        <br>
        <hr>

        <?php $count ++; } ?>
    </div>
</div>

         <div class="form-group row justify-content-center">
            <div class="col-sm-8 text-center">
                  <button type="submit" class="btn btn-success" id="btnSubmit">Finish Exam</button>
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
    
    $(document).on('click','#btnSubmit',function(){   
        $("#editModal").modal("show");
    });


    $(document).on('click','#dataSubmit',function(){ 
        // $("#dataSubmit").attr("disabled", true); 
        var pick = '52';

        var examid =$.trim(encodeURI($("#examid").val()));
        var position =$.trim(encodeURI($("#position").val()));

        let examId = document.querySelectorAll('input[id="exammId"]');
        let examIdList = [];
        examId.forEach((textbox) => {
            examIdList.push(textbox.value);
        });

        let radioBox = [];
        let radioBoxes = document.querySelectorAll("input[type='radio']:checked");
        radioBoxes.forEach((radio) => {
           radioBox.push(radio.value);
        });

        let exammAsnswer = document.querySelectorAll('input[id="exammAsnswer"]');
        let exammAsnswerList = [];
        exammAsnswer.forEach((textbox) => {
            exammAsnswerList.push(textbox.value);
        });

        let essayAnswer = document.querySelectorAll('textarea[id="essayAnswer"]');
        let essayAnswerList = [];       
        essayAnswer.forEach((textarea) => {
            let modifiedValue = textarea.value.replace(/,/g, "||");
            essayAnswerList.push(modifiedValue);
        });

        var fd = new FormData(); 
        fd.append('pick',pick);

        fd.append('examid',examid);
        fd.append('position',position);
        fd.append('examIdList',examIdList);
        fd.append('radioBox',radioBox);
        fd.append('exammAsnswerList',exammAsnswerList);
        fd.append('essayAnswerList',essayAnswerList);

        $.ajax({
            url: "pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                if($.trim(result)!=0){
                    $.notify("Application sent to Human Resources","success");   
                     setTimeout(function() { 
                        window.location.href = "applicantReview?id=" + examid + "&position=" + position  ;
                       }, 1000);
                }else{
                    $.notify(" Credentials Not Recognize ","error");                           
                    $("#dataSubmit").attr("disabled", false); 
                  
                }
            }
        });

    });
</script>