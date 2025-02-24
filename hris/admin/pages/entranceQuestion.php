<title>Assets</title>
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
            <h1>Open Question </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a type="button" class="btn btn-primary  fa fa-plus-square mr-1" data-toggle="modal" data-target=".bd-example-modal-lg"> Create</a></li>
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

                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Option </th>
                    <th style="text-align:center;">Type </th>
                    <th style="text-align:center;">Status </th>
                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectAllQuestion();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>  
                            <td style="text-align:center;"><?php echo htmlentities($row['description']);?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['options']);?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['questionType']);?></td> 
                            <td style="text-align:center;"><?php echo htmlentities($row['status']);?></td>
                            <td style="text-align:center;">
                                <button type='button' id='<?php echo base64_decode($row['id']);?>' class='approve_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >Edit</i> </button>
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

    <!-- Department modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                <div class="card-body">

                    <div class="form-group" >
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Question </label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" placeholder="Enter Question">
                            </div>


                            <div class="form-group" >
                                <div>
                                  <label for="type">Type:</label>
                                   <select id="type" name="type"  class="form-control" required>
                                       <option value="text">Text</option>
                                       <option value="dropdown">Dropdown</option>
                                   </select>
                                </div>
                                <div id="options-container" style="display: none;">

                                    <button type="button" onclick="addOption()" class="btn-primary">Add Option</button><br>
                                    <label>Options:</label><br>
                                    <div id="options"></div>
                                </div>
                            </div>

                        </div>
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
                        <label>Do you want to Reject this Request ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
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
 
    $(document).on('click','.createDepartment',function(){ 
        $(".createDepartment").attr("disabled", true); 

        var date_filed=$.trim(encodeURI($("#date_filed").val()));
        var type=$.trim(encodeURI($("#type").val()));
        var status = "Open";
        var pick="52";

        let OptionText = document.querySelectorAll('input[id="input-option"]');
        let optionsSelect = [];
        OptionText.forEach((textbox) => {
            optionsSelect.push(textbox.value);
        });

        if(date_filed == "" ){
            $.notify("Some of the important fields are empy", "error");
            $(".createDepartment").attr("disabled", false);       
        } else {
            var fd = new FormData();    
            fd.append('date_filed',date_filed);
            fd.append('status',status);

            fd.append('type',type);
            fd.append('optionsSelect',optionsSelect);
            
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



    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        location.href = "assetEdit?id=" + id + " "; 
    });


         document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('question-form');
            const typeSelect = document.getElementById('type');
            const optionsContainer = document.getElementById('options-container');

            typeSelect.addEventListener('change', function() {
                if (this.value === 'dropdown') {
                    optionsContainer.style.display = 'block';
                } else {
                    optionsContainer.style.display = 'none';
                }
            });
        });

        function addOption() {
            const optionsContainer = document.getElementById('options');
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('option-container');

            const input = document.createElement('input');
            input.type = 'text';
            input.id = 'input-option';
            input.name = 'options[]';
            input.placeholder = 'Enter option';
            input.classList.add('option', 'form-control');
            optionDiv.appendChild(input);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.classList.add('remove-option', 'btn-danger');
            removeButton.addEventListener('click', function() {
                optionDiv.remove();
            });
            optionDiv.appendChild(removeButton);

            optionsContainer.appendChild(optionDiv);
        }

        function clearOptions() {
            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = ''; // Clear all option inputs
        }
</script>