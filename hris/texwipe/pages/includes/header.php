<?php   
    session_start();

    
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    require_once 'codes/function.php';  
    


    $user = new admin_creation();
    $emp_id = $_SESSION['emp_id'];
    $name = $_SESSION['name'];
    $department = $_SESSION['department'];
    $position = $_SESSION['position'] ;

    // session_name($name);
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <style>
    div.dataTables_wrapper {
        margin: 0 auto;
    }
  </style>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
          <div class="dropdown-divider"></div>
        </div>
      </li>

    </ul>
  </nav>
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
                <p>  HRIS EMPLOYEE </p>
              </center>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="employeeInfomation" class="nav-link">
              <i class="nav-icon  fas fa-user-alt"></i>
              <p> Employee Profile </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="employeeDocuments" class="nav-link">
              <i class="nav-icon    far fa-folder-open"></i>
              <p> Employee Documents </p>
            </a>
          </li>

               <li class="nav-item">
                 <a href="assets" class="nav-link">
                     <i class="nav-icon  fas fas fa-tv"></i>
                  <p>Assets Issued</p>
                </a>
              </li>

               <li class="nav-item">
                 <a href="material" class="nav-link">
                     <i class="nav-icon   fas fa-hard-hat"></i>
                  <p>Materials Issued</p>
                </a>
              </li>

              <?php if($user->getifinterviewer($emp_id) > 0) { ?>
                <li class="nav-item">
                  <a href="applicant" class="nav-link">
                    <i class="nav-icon  fas fa-user-friends"></i>
                    <p> Applicant </p>
                  </a>
                </li>
              <?php } ?>

              <li class="nav-item">
                <a href="employeeLeave" class="nav-link">
                  <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                  <p> Leave </p>
                </a>
              </li>
                           
              <li class="nav-item">
                <a href="employeeChangeShift" class="nav-link">
                  <!-- <i class="nav-icon fas fa-sync-alt"></i> -->
                  <p> Change Shift </p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="employeeOvertime" class="nav-link">
                  <!-- <i class="nav-icon far fa-clock"></i> -->
                  <p> Overtime </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="employeeOfficialBusiness" class="nav-link">
                  <!-- <i class="nav-icon fa fa-briefcase"></i> -->
                  <p> Official Bussiness</p>
                </a>
              </li>

              <li class="nav-item" >
                <a href="employeeNotificationPass" class="nav-link">
                  <p> Nofication Pass</p>
                </a>
              </li>
          <!--   </ul>
          </li> -->

     


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Employee Approval
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

          <?php if($user->checkPosition($position) == "yes"){?>
              <li class="nav-item">
                <a href="employeeLeaveApproval" class="nav-link">
                  <p> Leave Approval </p>
                  <ol class=" float-sm-right">
                    <?php echo $user->selectallLeaveRequestdepartment($emp_id); ?>
                  </ol>
                </a>
              </li>
                           
              <li class="nav-item">
                <a href="employeeChangeShiftApproval" class="nav-link">
                  <p> Change Shift Approval <?php echo $user->getemployeeDept($emp_id); ?></p> 
                   <ol class=" float-sm-right">
                    <?php echo $user->selectallchangedepartment($emp_id); ?>
                  </ol>

                </a>
              </li>
             
              <li class="nav-item">
                <a href="employeeOvertimeApproval.php" class="nav-link">
                  <p> Overtime Approval </p>
                  <ol class=" float-sm-right">
                    <?php echo $user->selectallovertimedepartment($emp_id); ?>
                  </ol>
                </a>
              </li>

    
              <li class="nav-item">
                <a href="employeeOfficialBusinessApproval" class="nav-link">
                  <p> Official Business</p>
                  <ol class="float-sm-right">
                           <?php 
                            // echo $_SESSION['position'];

                           if( $_SESSION['position'] == 'Business Unit Manager'){ 

                            echo $user->selectallOfficialdepartmentAdmin(); 

                             } else { 
                              echo $user->selectallOfficialdepartment($emp_id);
                        }
                              ?> 


                    <?php //echo $user->selectallOfficialdepartment($emp_id); ?>
                  </ol>
                </a>
              </li>

              <?php } ?>
       
              <li class="nav-item">
                <a href="employeeNotificationPassApproval" class="nav-link">
                  <p> Notification Pass</p>
                                    <ol class="float-sm-right">
                    <?php echo $user->selectallNotification($emp_id); ?>
                  </ol>
                </a>
              </li>


            <?php if($position == 'Business Unit Manager'){?>
              <li class="nav-item">
                <a href="checkAllLeaved" class="nav-link">
                  <p> Approved Leave</p>
                                    <ol class="float-sm-right">
                  
                  </ol>
                </a>
              </li>
            <?php } ?>
            </ul>
          </li>


    

            <?php// if($_SESSION['emp_id']=='699') { ?>
              <li class="nav-item">
                <a href="ITConcern" class="nav-link">
                  <i class="nav-icon fas fa-laptop-house"></i>
                  <p> IT Concern </p>
                </a>
              </li>
            <?php //}?>
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