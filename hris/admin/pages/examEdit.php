<title>Edit Question</title>
<?php
	$qid = base64_decode($_GET['id']);
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
				  <li><a type="button" class="btn btn-success mr-1" id="btnSave"> Save</a></li>
				   <li><a type="button" class="btn btn-danger mr-1" id="btnBack"> Back</a></li>
	            </ol>
	          </div>
	        </div>
	      </div>
	    </section>	


		<?php 
		    $sql=$fetchdata->GetQuestion($qid);
		    while($row=mysqli_fetch_array($sql)){ 
		?>
	    <section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-12">
	            <div class="card">
	              <div class="card-header">	
	              		<h4>Question</h4>
	              </div>	
	              <div class="card-Body">	

    	              	<div class="row">
    					    <div class="col-sm">
    					    	<br>
    					    	<textarea style="margin-left: 20px ; margin-right: 20px ; margin-bottom: 20px; height: 150px;"class="form-control"  id="Question" placeholder="Enter Question" ><?php echo $row['examDescription']; ?></textarea>
    					    </div>
    					    <div class="col-sm" style="margin-left:20px; margin-top: 20px; height: 200px;">

    					    	  <input type="text" name="mc_options[]" id="type" class="form-control" placeholder="Option 1" value="<?php echo $row['examCat']; ?>" readonly hidden>
    					     	<?php if ($row['examCat'] == "1") {
								    $answerSet = explode(",", $row['examAnswerSet']);								

								    for ($i = 0; $i < count($answerSet); $i++) {
								        // Check if the current option is the selected one
								        $selected = ($i == $row['examAnswer']) ? "checked" : ""; // Use "checked" for radio buttons								

								        echo "<input type='radio' id='answer$i' name='correctAnswer' value='".$answerSet[$i]."' ".$selected.">  

								          <input type='text' name='mc_options[]' id='Answers' class='form-control' placeholder='Option 1' value=".$answerSet[$i]." style='width:500px;'>"; 
								    }
								} else if($row['examCat'] == "2" ) {
    					


    							   $answerSet = explode(",", $row['examAnswerSet']);								

								    for ($i = 0; $i < count($answerSet); $i++) {
								        // Check if the current option is the selected one
								        $selected = ($i == $row['examAnswer']) ? "checked" : ""; // Use "checked" for radio buttons								

								        echo "<input type='radio' id='answer$i' name='answer' value='".$answerSet[$i]."' ".$selected.">  

								          <input type='file' name='mc_options[]' id='Answers' class='form-control' placeholder='Option 1' value=".$answerSet[$i]." style='width:500px;'>"; 
								    }

    					     	} ?>
    					    </div>
    					</div>
    					
	              </div>	


	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    <?php } ?>
	</div>

	<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="dataModalLabel">System Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                		<label> Do you want to save changes?</label>
              </div>
              <div class="modal-footer">
                          <button type="button" class="btn btn-primary createAccount" id="btnEditDocuments">Save</button>   
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div> 
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
	$(document).on('click','#btnBack',function(){ 
       window.location.href = 'exam';
    });

	$(document).on('click','#btnSave',function(){ 
		$('#dataModal').modal('show');
    });

	$(document).on('click','#btnEditDocuments',function(){ 

        var pick = "60";
        var id = '<?php echo $qid; ?>';
        var Question = $.trim(encodeURI($("#Question").val()));
        
        var type = $.trim(encodeURI($("#type").val()));

        let answerBoxes = document.querySelectorAll('input[id="Answers"]');
        let answerBox = [];
        answerBoxes.forEach((textbox) => {
           answerBox.push(textbox.value);
        });

        let radioBox = [];
        let radioBoxes = document.querySelectorAll("input[type='radio']:checked");
        radioBoxes.forEach((radio) => {
           radioBox.push(radio.value);
        });



        var fd = new FormData(); 
        fd.append('pick', pick);        
        fd.append('id', id);
        fd.append('question', Question);
        fd.append('type', type);

        // fd.append('answerImageBox', answerImageBox);

        fd.append('answerBox', answerBox);
        fd.append('radioBox', radioBox);
  

        $.ajax({
            url: "../pages/codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                        
                if($.trim(result)=='1'){
                    $.notify("Successfully Changed", "success"); 
                    setTimeout(function() {  window.location.href = 'exam';}, 2000);
                }else{
                    $.notify(result, "error");
                    $("#btnEditDocuments").attr("disabled", false);   
                }
            }
        });



    });
</script>