<?php 

    require_once 'codes/function.php';  
    $fetchdata=new admin_creation();
?>
<head>
  <meta charset="UTF-8">
    <meta name="description" content="Add a loading spinner to Datatables without AJAX" />
    <title>Time Out Attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>

<style type="text/css">
  #containerexample {display: none}
  #loadercontainer{
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

/*  .navbardesign{
    background-color: #4169e1;
  }*/

</style>
<body>

<nav class="navbar navbar-light justify-content-between navbardesign">
  <a class="navbar-brand"><img src="dist/img/texwipe.png" style="height: 100px;"></a>
  <form class="form-inline">
    <button class="btn btn-danger" type="button" id = "backButton">Back</button>
  </form>
</nav>


  <div id="containerexample" class="m-5">
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">Company</th>
            <th style="text-align:center;">Time In</th>
            <th style="text-align:center;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql=$fetchdata->selectAllVisitor();
          while($row=mysqli_fetch_array($sql)){ ?>
            <tr>
               <td style="text-align:center;"><?php echo htmlentities($row['name']);?></td>
               <td style="text-align:center;"><?php echo htmlentities($row['company']);?></td>
               <td style="text-align:center;"><?php echo date('H:i A',strtotime($row['timeIn']));?></td>
               <td style="text-align:center;">
                  <button type='button' id='<?php echo htmlentities($row['id']);?>' class='approve_btn  btn-success btn-sm'  title='Edit Record'><i class='fa fa-edit' >Time Out</i> </button>
                </td>
            </tr>
        <?php } ?>
        
        </tbody>
    </table>
  </div>
  <div id="loadercontainer">
  <div class="d-flex justify-content-center text-secondary" id="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="dist/notify/notify.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
 
</body>
</html>
<script>
    $(document).ready(function() {
      var table = $('#example').on( 'draw.dt', function () {
    $("#containerexample").attr("id", "container"); $("#loadercontainer").css("display","none");
    } ).DataTable( {
              lengthChange: false,
              buttons: [  'pdf' ],
                "scrollX": true,
                "paging": false,
                "order": [[ 3, "desc" ]]
          } );
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      } );

    $(document).on('click','.approve_btn',function(){ 
        id=$(this).attr("id");
        

        var pick = '2';
        var fd = new FormData();    
        fd.append('id', id);
        fd.append('pick', pick);
        $.ajax({
            url: "codes/admin_control.php",
            data: fd,
            processData: false,
            contentType: false,
            type:'POST',
            success:function(result){
                console.log(result);                                  
                if($.trim(result)==1){
                    $.notify("  Request Done", "success"); 
                    setTimeout(function() {  location.href = "test-index.php "; }, 2000);
                }else{
                    $.notify("Request was not Successfull ", "error");
                }
              
            }
        });
    });


    $(document).on('click','#backButton',function(){ 

      location.href = "test-index.php "; 
    });

  </script>


