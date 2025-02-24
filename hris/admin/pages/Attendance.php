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
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </section>
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                Dates
              </div>

              <div class="card-body">

                    <div class="row">
                        <div class="col-sm">
                            <h6>Start Date</h6>
                            <input type="date" id="startDate"  class="form-control">
                        </div>
                        <div class="col-sm">
                            <h6>End Date</h6>
                            <input type="date" id="endDate"  class="form-control">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-11">
                            <div class="form-group" >
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
 
                        </div>
                        <div class="col-sm-1">
                            <br>
                            <button type="button" class="btn btn-primary btnGenerate" >Generate</button>
                        </div>
                    </div>
                  
               </div>
            </div>
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
                  <th style="text-align:center;">ID </th>
                    <th style="text-align:center;">Date Issued </th>
                    <th style="text-align:center;">Name </th>

                    <th style="text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql=$fetchdata->fetch_Attendance();
                        while($row=mysqli_fetch_array($sql)){ ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'] ;?></td>
                            <td style="text-align:center;"><?php echo htmlentities(date("F d Y", strtotime($row['date']))) ;?></td>
                            <td style="text-align:center;"><?php echo $row['Firstname']. " ".$row['Lastname'] ;?></td>

                            <td style="text-align:center;">
                                <button type='button' id='<?php echo base64_encode($row['id']);?>' class='approve_btn  btn-primary btn-sm'  title='Edit Record'><i class='fa fa-edit' >View</i> </button>
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

 
<?php include 'includes/footer.php'; ?>
<script>
 
    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        location.href = "attendanceInfo?id=" + id + " "; 
    });

    $(document).on('click','.btnGenerate',function(){ 
        var startDate=$.trim(encodeURI($("#startDate").val()));
        var endDate=$.trim(encodeURI($("#endDate").val()));
        var employee_id=$.trim(encodeURI($("#employee_id").val()));
        var pick = '53';

        var fd = new FormData();    
        fd.append('employee_id', employee_id);
        fd.append('startDate', startDate);   
        fd.append('endDate', endDate);
        fd.append('pick', pick);

        if(startDate == '' || endDate == '' || employee_id == ''){
            $.notify("Fields Found Empty ","error");   
        } else if (endDate < startDate){
            $.notify("Invalid Dates ","error");              
        } else {
            $.notify("Success ","success");     
            window.open("generateDailyAttendance?startDate=" + startDate + "&endDate=" + endDate + "&emp_id=" +employee_id, "_blank");
          
        }
        
        
        // $.notify("Document Created Successfully ","success");   
        // location.href = "generateDailyAttendance?startDate=" + startDate + "&endDate=" + endDate + "&emp_id=" +employee_id ; 

   
    });

</script>