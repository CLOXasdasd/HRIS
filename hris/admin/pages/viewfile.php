<?php
    $conn = mysqli_connect('192.168.11.213', 'root', '', 'hirs_db');

    $id = intval($_GET['id']);

        // fetch file to download from database
    $sql = "SELECT * FROM tbl_employeedocuments WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = 'C:/xampp/htdocs/hris/admin/pages/uploads/' . $file['document_description'];
    

// $name_file = $_SESSION['session_name'];
if (mime_content_type($filepath) == 'application/pdf')
  {

    define('WP_USE_THEMES', false); // These lines I add only in WP script file

    // Header content type
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filepath . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Read the file
    readfile($filepath);
  }
?>