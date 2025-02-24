<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> -->
   <link rel="icon" type="image/x-icon" href="dist/img/texwipe.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <!-- <a href="index.php" class="h1"><b>Admin</b>LTE</a> -->

      <img src="dist/img/texwipe.png" width="100%">
    </div>
    <div class="card-body">
      <h4 class="login-box-msg">HRIS EMPLOYEE PORTAL</h4>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="emp_id" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="social-auth-links text-center mt-2 mb-3">
          <button class="btn btn-block btn-primary" id="sign-in" onclick="test()">Login</button>
          <!-- <button class="btn btn-block btn-success" id="btnAdd" >Add Employee</button> -->
        </div>


        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="applicant">APPLICANT</a>
        </div>

      </form>

    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/notify/notify.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>


<script type="text/javascript">
  function test(){
        $("#sign-in").attr("disabled", true);  
        $("#sign-in").html('Signing-In');
        var uname=$.trim(encodeURI($("#emp_id").val()));
        var upass=$.trim(encodeURI($("#password").val()));
        var pick="1";



        if(uname=="" || upass==""){
            $.notify(" Some Fields Are Empty ","warning");  
            $("#sign-in").attr("disabled", false);  
            $("#sign-in").html('Login'); 
        } else {

           // $.notify(" working ","success");  
            var fd = new FormData();    
            fd.append('uname', uname);
            fd.append('upass',upass);
            fd.append('pick',pick);

            $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    // window.location.href = "includes/admin_control.php";

                    console.log(result);                   
                            $("#sign-in").removeAttr("disabled");
                        if($.trim(result)!=0){
                            // $("#sign-in").attr("disabled", true);  
                            $.notify("Login Success ","success");   
                             setTimeout(function() { window.location.href = "pages/dashboard"; }, 1000);
                        }else{
                            $.notify(" Credentials Not Recognize ","error");                           
                            $("#sign-in").attr("disabled", false);  
                            $("#sign-in").html('Login');
                          
                        }                       
                        return false;
                }
            });
        }    
  }


      $(document).on('click','#btnAdd',function(){ 
            window.location.replace("employmentdetails");
    });
</script>