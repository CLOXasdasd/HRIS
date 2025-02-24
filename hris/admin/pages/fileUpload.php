<title>Batch Upload</title>
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
            <h1>File Batch Upload</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">

                    <div class="form-group">
                        <label><span style="color:red">*</span> Employee </label>
                        <select class="form-control" id="employee_id">
                            <option value=""  selected> Select Employee </option>
                            <?php
                            $sql=$fetchdata->selectEmployeeAccounts();
                            while($row=mysqli_fetch_array($sql)){ ?>
                                <option value="<?php echo $row['emp_id']?>"> <?php echo $row['Lastname'] . ", " . $row['Firstname']?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cars">Document type</label>
                        <select name="documents" id="documentTypes"  class="form-control .documents" >         
                            <?php
                                $sql=$fetchdata->selectDocument();
                                while($row=mysqli_fetch_array($sql)){ ?>
                                   <option value="<?php echo $row['description'];?>"><?php echo htmlentities($row['description']);?></option>
                                
                            <?php } ?>
                         </select>
               
                    </div>
                    <div class="form-group">
                       <label for="files" class="file-label">Select files:</label>
                       <input type="file" name="files[]" id="files" multiple class="form-control">
                       <br><br>
                       <button type="button" class="btn-primary" id="File_Upload">Upload Files</button>
                    </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Recent Upload</h3>
              </div>              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align:center;">Name</th>
                    <th style="text-align:center;">Document Type </th>
                    <th style="text-align:center;"> Document Name </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->selectTopUploads();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $row['Firstname'] . " " . $row['Middlename'] . " " . $row['Lastname'];?></td>
                            <td style="text-align:center;"><?php echo htmlentities($row['documentType']);?></td>
                          <td style="text-align:center;"><?php echo htmlentities($row['document_description']);?></td>                                              
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


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
        </div>
      </div>
    </section>
  </div>

  
<?php include 'includes/footer.php'; ?>


  <script>
       $(document).on('click','#File_Upload',function(){ 
            event.preventDefault(); // Prevent the default form submission

            var pick = "55";
            var files = document.getElementById('files').files;
            var documentTypes=$.trim(encodeURI($("#documentTypes").val()));
            var employee_id = document.getElementById('employee_id').value;
            var formData = new FormData();


            if(employee_id == "" || documentTypes == ""){
               $.notify('Please input employee and document type','error');
            } else {
                // Append user input to formData
                formData.append('pick', pick);
                formData.append('employee_id',employee_id);
                formData.append('documentTypes', documentTypes);
                // Append files to formData
                for (var i = 0; i < files.length; i++) {
                    formData.append('files[]', files[i]);
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../pages/codes/admin_control.php', true);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        $.notify(xhr.responseText,'success');
                        setTimeout(function() { location.reload(); }, 2000);
                    } else {
                         $.notify('Error: ' + xhr.statusText,'err');
                    }
                };

                xhr.send(formData);
            }

        });
    </script>