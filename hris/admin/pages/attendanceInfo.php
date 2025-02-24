<title>Employee Information</title>
<?php
    include 'includes/header.php';
    $id = base64_decode($_GET['id']);
    $fetchdata = new admin_creation();

    $sql=$fetchdata->checkAttendanceRecord($id);
    while($row=mysqli_fetch_array($sql)){ 
?>

<style>
    th{
        text-align: center;
    }

    td{
        text-align: center;
    }
</style>
<div class="content-wrapper h-100 w-auto p-3">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance Detail </h1>
          </div>
           <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #1AE5E3;">
              </div>

              <div class="card-body">
            
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Name</label>
                                <input type="text" name="date_filed" id="id" class="form-control" value="<?php echo $row['Firstname'] . " " . $row['Lastname']; ?>" disabled>
                            </div>
                        </div>
                     
                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Date</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo htmlentities(date("F d Y", strtotime($row['date'])));?>" disabled>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group" >
                                <label><span style="color:red">*</span> Out Remarks</label>
                                <input type="text" name="date_filed" id="date_filed" class="form-control" value="<?php echo $row['Firstname'] . " " . $row['Lastname'];?>" disabled>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">

                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Time In</th>
                                <th scope="col">Time Out</th>
                                <th scope="col">Time In</th>
                                <th scope="col">Time Out</th>
                                <th scope="col">Time In</th>
                                <th scope="col">Time Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['timeIn1'] ; ?></td>
                                    <td><?php echo $row['timeOut1'] ; ?></td>
                                    <td><?php echo $row['timeIn2'] ; ?></td>
                                    <td><?php echo $row['timeOut2'] ; ?></td>
                                    <td><?php echo $row['timeIn3'] ; ?></td>
                                    <td><?php echo $row['timeOut3'] ; ?></td>
                                </tr>
                            </tbody>
                            </table>
                    </div>

                    <div class="form-group" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                            $queryQuestions=$fetchdata->fetchDataQuestions($row['question']);
                                            for ($i = 0; $row1 = mysqli_fetch_assoc($queryQuestions); $i++){ 
                                                echo "<tr>";
                                                echo  "<td>" .$row1['description'] ." </td><td style='text-align: center;'> " . $fetchdata->fetchDataAnswers($i, $id)  . "</td>";
                                                echo "</tr>";
                                            }?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>  
    
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
 
        <!-- Start Edit Modal -->
    <div class="modal fade" id="reactivateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to Save request account ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="datareact">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>


<script type="text/javascript">
      var id="";
    $(document).on('click','.react_btn',function(){ 
        $("#reactivateModal").modal("show");
    });

    $(document).on('click','#datareact',function(){ 
      $("#datareact").attr("disabled", true); 
      var id=$.trim(encodeURI($("#id").val()));
      var status=$.trim(encodeURI($("#status").val()));
      var resolution=$.trim(encodeURI($("#resolution").val()));
      var pick = "46";

      if(status == ""){
          $.notify("Status is null ","error");                           
          $("#datareact").attr("disabled", false);
      } else{
            var fd = new FormData();    
            fd.append('id', id);         
            fd.append('status', status); 
            fd.append('resolution', resolution); 
            fd.append('pick',pick);

            $.ajax({
                url: "codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
      
                        if($.trim(result)==1){
                            $.notify("Document Created Successfully ","success");   
                             setTimeout(function() { location.href="ITConcern"; }, 2000);
                        } else {
                            $.notify("Problem Encountered Upon Request","error");                           
                            $("#datareact").attr("disabled", false);
                        }                       
                        return false;

                }
            });    
      }

    });
</script>


