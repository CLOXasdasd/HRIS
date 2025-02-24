<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      margin-top: 50px;
    }

    body {
      background-image: url('dist/img/texwipe.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }

    .bodyposition{
      margin-top: 700px;
    }
    
    .button2 {
        background-color: #008CBA; 
        color: white; 
        border-radius: 50px;
        border: 2px solid #008CBA;
        padding: 20px 42px; 
        font-size: 25px;
    }

    .button3 {
        background-color: white;
        color: #4CAF50;
        border: 2px solid #4CAF50;
        border-radius: 50px;
        padding: 20px 42px; 
        font-size: 25px;
    }

    .button4 {
        background-color: white;
        color: #f44336;
        border: 2px solid #f44336;
        border-radius: 50px;
        padding: 20px 42px; 
        font-size: 25px;
    }


  </style>
</head>
<body>
  
  <div class="container text-center bodyposition">   
   <div class="row"> 
      <div class="col-sm-12">
        <button class="button button3">EMPLOYEE</button>
      </div>
    </div>
  </div>


  <div class="container text-center button1pos">   

      <div class="row">
      <div class="col-sm-6">
       <button class="button button2 ">VISITOR IN </button>
      </div>


      <div class="col-sm-6">
        <button class="button button4 ">VISITOR OUT</button>
      </div>
    </div>
  </div>

<footer class="container-fluid text-center">
  <a href="index.php">ADVANCE MOLDING CO. INC.</a>
</footer>
</body>
</html>

<script>
    $(document).on('click','.button2',function(){ 
        location.href = "test-visitorin.php "; 
    });

    $(document).on('click','.button3',function(){ 
         location.href = "test-attendance.php "; 
    });

    $(document).on('click','.button4',function(){ 
         location.href = "test-visitorout.php "; 
    });
</script>