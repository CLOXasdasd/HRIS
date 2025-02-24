<title>Exam</title>
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
            <h1>Exam and Answers </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create Exam</a></li>
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
                    <th style="text-align:center;">Category</th>
                    <th style="text-align:center;">Question </th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectquestion();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo htmlentities($row['examType']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['examDescription']);?></td>                     
                            <td style="text-align:center;"><?php echo ($row['examCat'] == '1') 
                                    ? "Multiple Choice" 
                                    : (($row['examCat'] == '2') 
                                        ? "Multiple Choice (with Image)" 
                                        : "Essay type"); ?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo base64_encode($row['id']);?>' class='btn_edit  btn-warning btn-sm'  title='Edit Record'><i class='fa fa-edit'> Edit</i> </button>
                                <button type='button' id='<?php echo htmlentities($row['id']);?>' class='btn_delete  btn-danger btn-sm'  title='Delete Record'><i class='fa fa-trash'> Delete</i> </button>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">System Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    
                     <div class="form-group mb-3">
                         <label for="examType">Exam Type</label>
                         <select id="examType" name="exam_type" class="form-control">
                             <option value="Support">Support</option>
                             <option value="Operator">Operator</option>
                         </select>
                     </div>           

                     <div class="form-group mb-3">
                         <label for="questionType">Question Type</label>
                         <select id="questionType" name="question_type" class="form-control">
                             <option value="0">Select an Option</option>
                             <option value="1">Multiple Choice</option>
                             <option value="2">Multiple Choice (with Image)</option>
                             <option value="3">Essay Type</option>
                         </select>
                     </div>           

                     <!-- Multiple Choice Question -->
                     <div id="multipleChoice" class="hidden">
                         <label>Multiple Choice Question</label>
                         <textarea class="form-control mb-3" name="mc_question" id="question" placeholder="Enter your question"></textarea>
                         
                         <label>Options</label>
                         <div id="mc-options">
                             <div class="input-group mb-2">
                                 <input type="text" name="mc_options[]" id="Answers" class="form-control" placeholder="Option 1">
                                 <input type="radio" name="mc_correct" value="0"  id="correctAnswer" class="form-check"> Correct Answer
                             </div>
                         </div>
                         <button type="button" class="btn btn-primary" onclick="addMCOption()">Add Option</button>
                     </div>           

                     <!-- Multiple Choice with Images -->
                     <div id="multipleChoiceImage" class="hidden">
                         <label>Multiple Choice Image Question</label>
                         <textarea class="form-control mb-3" name="mc_image_question" placeholder="Enter your question"></textarea>
                         
                         <label>Options (Images)</label>
                         <div id="mc-image-options">
                             <div class="input-group mb-2">
                                 <input type="file" name="mc_image_options[]" id="mc_image_options" class="form-control" accept="image/*"multiple>
                                 <input type="radio" name="mc_image_correct" value="0" id="correctAnswer"  class="form-check"> Correct Answer
                             </div>
                         </div>
                         <button type="button" class="btn btn-primary" onclick="addMCImageOption()">Add Option</button>
                     </div>           

                     <!-- Essay Question -->
                     <div id="essayType" class="hidden">
                         <label>Essay Question</label>
                         <textarea class="form-control mb-3" name="essay_question" id="questionEssay" placeholder="Enter essay question"></textarea>
                     </div>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary createAnswers">Create</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
                        <label>Do you want to Delete this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataDelete">Yes</button>
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
    document.getElementById('questionType').addEventListener('change', function () {
        var selectedValue = this.value;

        // Hide all sections
        document.getElementById('multipleChoice').classList.add('hidden');
        document.getElementById('multipleChoiceImage').classList.add('hidden');
        document.getElementById('essayType').classList.add('hidden');

        // Show relevant section
        if (selectedValue == '1') {
            document.getElementById('multipleChoice').classList.remove('hidden');
        } else if (selectedValue == '2') {
            document.getElementById('multipleChoiceImage').classList.remove('hidden');
        } else if (selectedValue == '3') {
            document.getElementById('essayType').classList.remove('hidden');
        }
    });

    function addMCOption() {
        const optionIndex = document.getElementById('mc-options').childElementCount;
        const newOption = `
            <div class="input-group mb-2"> <input type="text" name="mc_options[]" class="form-control" id="Answers" placeholder="Option ${optionIndex + 1}"> <input type="radio" name="mc_correct" value="${optionIndex + 1 }" id="correctAnswer" class="form-check"> Correct Answer </div>
        `;
        document.getElementById('mc-options').insertAdjacentHTML('beforeend', newOption);
    }

    function addMCImageOption() {
        const optionIndex = document.getElementById('mc-image-options').childElementCount;
        const newImageOption = `<div class="input-group mb-2"><input type="file" name="mc_image_options[]" class="form-control" id="mc_image_options" accept="image/*" multiple><input type="radio" name="mc_image_correct" value="${optionIndex}" id="correctAnswer" class="form-check"> Correct Answer</div>
        `;
        document.getElementById('mc-image-options').insertAdjacentHTML('beforeend', newImageOption);
    }

    $(document).on('click','.createAnswers',function(){
        
        var pick = "58";
        var examType = $.trim(encodeURI($("#examType").val()));
        var questionType = $.trim(encodeURI($("#questionType").val()));
        var question = $.trim(encodeURI($("#question").val()));
        var questionEssay = $.trim(encodeURI($("#questionEssay").val()));

        let answerBoxes = document.querySelectorAll('input[id="Answers"]');
        let answerBox = [];
        answerBoxes.forEach((textbox) => {
           answerBox.push(textbox.value);
        });

        let answerImageBoxes = document.querySelectorAll('input[id="AnswersImage"]');
        let answerImageBox = [];

        answerImageBoxes.forEach((textbox) => {
           answerImageBox.push(textbox.value);
        });

        let radioBox = [];
        let radioBoxes = document.querySelectorAll("input[type='radio']:checked");
        radioBoxes.forEach((radio) => {
           radioBox.push(radio.value);
        });

        var fd = new FormData();    
        let imageBoxes = document.querySelectorAll('input[id="mc_image_options"]');
        let imageFiles = [];       

        // Collect files from all input fields
        imageBoxes.forEach((fileInput, index) => {
            let files = fileInput.files;
            for (let i = 0; i < files.length; i++) {
                imageFiles.push(files[i]);
                fd.append(`file${index}-${i}`, files[i]); // Add each file to FormData
            }
        });

        fd.append('pick', pick);        
        fd.append('examType', examType);
        fd.append('questionType', questionType);
        fd.append('question', question);
        fd.append('answerBox', answerBox);
        fd.append('answerImageBox', answerImageBox);
        fd.append('radioBox', radioBox);
        fd.append('questionEssay', questionEssay);
        fd.append('imageFiles', imageFiles);
        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                        
                if($.trim(result)=='Successfully Added!'){
                    $.notify(result, "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify(result, "error");
                    $(".createAnswers").attr("disabled", false);   
                }
            }
        });     

    });


   var id="";
    $(document).on('click','.btn_delete',function(){ 
        id=$(this).attr("id");
        $("#editModal").modal("show");
    });


    $(document).on('click','#dataDelete',function(){ 
        var pick = "59";
        var fd = new FormData(); 

        fd.append('pick', pick);
        fd.append('id', id);

        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                        
                if($.trim(result)==1){
                    $.notify("Question Deleted!", "success"); 
                    setTimeout(function() { location.reload(); }, 2000);
                }else{
                    $.notify("Account Request was not Successfull ", "error");
                    $("#dataDelete").attr("disabled", false);   
                }
            }
        });
    });


    $(document).on('click','.btn_edit',function(){ 
        id=$(this).attr("id");

        window.location.href = 'examEdit?id=' + id;
    });

</script>

<style>
    .hidden {
        display: none;
    }
</style>