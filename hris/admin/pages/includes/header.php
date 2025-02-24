<?php   
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'codes/function.php';  
    
    $user = new admin_creation();
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
        $account = $_SESSION['account_type'];

    // session_name($username);
    if (!$user->get_session() ){
      header("Location:../index");  
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header ("Location: ../index");  
    }
  

          // Arrays for search and replace
    $search = ['&amp;#039;', '&amp;quot;', '&amp;amp;'];
    $replace = ["'", '"','&'];
  

  
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="../dist/img/texwipe.png">

   <link rel="stylesheet" id="ChesterAllanCustodio">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.3.2/css/searchPanes.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.5/css/select.dataTables.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <style>
    div.dataTables_wrapper {
        margin: 0 auto;
    }
  </style>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"> <?php echo $_SESSION['name'];?></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="accountprofile" class="dropdown-item" onclick="profile()">
            <i class="fas fa-users mr-2"></i> Account Information 
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="test()">
            <i class="fas fa-power-off mr-2"></i>  Log Out
          </a>
          
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: white;">
      <img src="../dist/img/texwipe.png" alt="AdminLTE Logo" style="opacity: .8" width="100%">
      
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          

                              <li class="nav-item">
            <a class="nav-link"> 
              <center>
                <p>  HRIS ADMIN </p>
              </center>
            </a>
          </li>


          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>

          <?php if($account == "Admin" || $account == "Human Resources" ) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Accounts 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="accountsAdmin" class="nav-link">
                <p> Admin Accounts </p>
              </a>
              </li>

              <li class="nav-item">
               <a href="accountsEmployee" class="nav-link">
                <p> Employees Accounts </p>
              </a>
              
<!-- 
              <li class="nav-item">
               <a href="applicants" class="nav-link">
                <p> Applicants  </p>
              </a> -->

              </li>
            </ul>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Applicants 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
               <a href="applicants" class="nav-link">
                <p> Applicants  </p>
              </a>

              <li class="nav-item">
               <a href="trainingList" class="nav-link">
                <p> Training  </p>
              </a>


              </li>
            </ul>
          </li>

  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Employee Request
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($account == "Admin" || $account == "Human Resources" ) { ?>
              <li class="nav-item">
                <a href="employeeHRLeaveApproval" class="nav-link">
                  <p> HR Final Leave  Approval</p>
                </a>
              </li>
            <?php } ?>
              <li class="nav-item" >
                <a href="employeeLeave" class="nav-link">
                  <p hide> Filed Leave </p>
                </a>
              </li>
                           
              <li class="nav-item">
                <a href="employeeChangeShift" class="nav-link">
                  <p> Filed Change Shift </p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="employeeOvertime" class="nav-link">
                  <p> Filed Overtime </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="employeeOfficialBusiness" class="nav-link">
                  <p> Filed Official Business</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="employeeNotificationPass" class="nav-link">
                  <p> Filed Notification Pass</p>
                </a>
              </li>
              
            </ul>
          </li>

        <?php if($account == "Admin" || $account == "Human Resources" ) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fas fa-barcode"></i>
              <p>
                Accountability
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="assets" class="nav-link">
                  <p>Assets Issuance</p>
                </a>
              </li>     

               <li class="nav-item">
                 <a href="material" class="nav-link">
                  <p>Material Issuance</p>
                </a>
              </li>  
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              


                  <li class="nav-item">
                    <a href="exam" class="nav-link">
                      <p> Exam</p>
                    </a>
                  </li> 
              

              
              <li class="nav-item">
                 <a href="Visitor" class="nav-link">
                  <p> Visitor</p>
                </a>
              </li>

              <li class="nav-item" hidden>
                <a href="schedule" class="nav-link">
                  <!-- <i class="nav-icon fas fa-laptop-house"></i> -->
                  <p>Injection Attendance</p>
                </a>
              </li>


              <li class="nav-item" >
                <a href="ITConcern" class="nav-link">
                  <!-- <i class="nav-icon fas fa-laptop-house"></i> -->
                  <p>IT Concern</p>
                </a>
              </li>
             
              <li class="nav-item">
                 <a href="announcement" class="nav-link">
                  <p> Announcement</p>
                </a>
              </li>

              <li class="nav-item">
                 <a href="accountDesignation" class="nav-link">
                  <p> Department and Position</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="documentTypes" class="nav-link">
                  <p> Document Types</p>
                </a>
              </li>

              <li class="nav-item">
                 <a href="leaveTypes" class="nav-link">
                  <p> Leave Types</p>
                </a>
              </li>

              

                <li class="nav-item">
                    <a href="Attendance" class="nav-link">
                      <p> Attendance and Payroll </p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="entranceQuestion" class="nav-link">
                      <p> Entrance Questionaire</p>
                    </a>
                  </li>
              

                  <li class="nav-item">
                    <a href="fileUpload" class="nav-link">
                      <p> File Upload</p>
                    </a>
                  </li> 

   
            </ul>
          </li>
        <?php } ?>  
          <li class="nav-item">
            <a href="reports" class="nav-link">
              <i class="nav-icon  fas fa-file"></i>
              <p> Reports </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    function profile(){
      window.location.href = 'profile';
    }

    function test(){
      var name = '<?php echo $_SESSION['name']; ?>'
      var pick = '00';
      var fd = new FormData();    
      // fd.append('name', name);
      // fd.append('pick', pick);     
      //       $.ajax({
      //           url: "../pages/codes/admin_control.php",
      //           data: fd,
      //           processData: false,
      //           contentType: false,
      //           type:'POST',
      //           success:function(result){
      
                    window.location.href = '?q=logout';
                       
            //     }
            // });
    }
  </script>