<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 0);


    if( $_GET['id'] == "") {
        $exam_id = date('dmY').rand(1,100);
    } else {
        $exam_id = $_GET['id'];
    }
    // $position = $_GET['position'];
  
    // include 'pages/codes/function.php';
    // $fetchdata=new admin_creation();

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
                            <th><h2 class="text-center">Application</h2></th>
                            <th style="width: 35%"><center> <img src="dist/img/texwipe.png" width="50%"></center></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm"hidden>
                <label for="firstName" class="col-sm col-form-label">Exam ID <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="examid" value="<?php echo $exam_id; ?>" readonly>
            </div>

            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Category <span style="color:red;">*</span></label>
                <select  class="form-control" id="category" placeholder="Category">
                  <option value="Operator">Operator</option>
                  <option value="Support">Support</option>
                </select>
            </div>

            <div class="col-sm">
                <label class="col-sm col-form-label">Position  <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="position" placeholder="Possition"  >
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">First Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="firstName" placeholder="Firstname">
            </div>

            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Last Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="lastName" placeholder="Lastname">
            </div>

            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Middle Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="middleName" placeholder="Middlename">
            </div>
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