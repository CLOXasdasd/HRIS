<?php 

    require_once 'codes/function.php';  
    $fetchdata=new admin_creation();

    $basedate = date('y-m-d');
?>
<head>
  <meta charset="UTF-8">
    <meta name="description" content="Add a loading spinner to Datatables without AJAX" />
    <title>Canteen</title>

    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

  img {
    border-radius: 50%;
  }

  button{
    font-family: helvetica;
  }

  .button4 {
    background-color: white;
    color: #f44336;
    border: 2px solid #f44336;
    border-radius: 50px;
    padding: 5px 10px; 
    font-size: 20px;
  }

  .button3 {
    background-color: white;
    color: #4CAF50;
    border: 2px solid #4CAF50;
    border-radius: 50px;
    padding: 5px 20px; 
    font-size: 20px;
  }
/*  .navbardesign{
    background-color: #4169e1;
  }*/

</style>
<body>

<nav class="navbar navbar-light justify-content-between navbardesign">
  <a class="navbar-brand"><img src="dist/img/texwipe.png" style="height: 100px;"></a>
</nav>
  <div id="containerexample" class="m-5">
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>
            <th style="text-align:center;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql=$fetchdata->selectAllActiveEmployee();
            while($row=mysqli_fetch_array($sql)){ ?>
              <tr>
                  <td style="text-align:center;" width="10%"> <img src="<?php echo $fetchdata->getProfilePic($row['emp_id']);?>" width="100px" height ="100px" > </td>
                  <td style="text-align:center;"><?php echo $row['emp_id'];?></td>
                  <td style="text-align:center;"><?php echo $row['Firstname'] . " " .$row['Lastname'] ;?></td>
                  <td style="text-align:center;">
                      <button type='button' id='<?php echo base64_encode($row['emp_id']);?>' class='btn-success btn-sm  button3'  title='Edit Record'><i class='fa fa-edit' >Additionals</i> </button>

                  </td>
              </tr>
          <?php } ?>
        
        </tbody>
    </table>
  </div>



  <!-- modal -->

  <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="dataModalLabel">System Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div id="modalContent"></div>
              </div>
              <div class="modal-footer">
                          <button type="button" class="btn btn-primary createAccount" id="btnSaveChanges">Save</button>   
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div> 


<!-- Modal HTML -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your content here...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



  <div id="loadercontainer">
    <div class="d-flex justify-content-center text-secondary" id="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

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
                "scrollX": true,
                "paging": false
                // ,
                // "order": [[ 3, "desc" ]]
          } );
          table.buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      } );


    $(document).on('click','.button3',function(){ 
      id=$(this).attr("id");
         $('#myModal').modal('show'); // For Bootstrap 4 and below

    });
    

  </script>


