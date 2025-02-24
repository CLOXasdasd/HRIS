<?php
	$conn = mysqli_connect('192.168.11.213', 'root', '', 'hirs_db');

    $id = intval($_GET['id']);

        // fetch file to download from database
    $sql = "SELECT * FROM tbl_employeedocuments WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = 'C:/xampp/htdocs/hris/admin/pages/uploads/' . $file['document_description'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('C:/xampp/htdocs/hris/admin/pages/uploads/' . $file['document_description']));
        readfile('C:/xampp/htdocs/hris/admin/pages/uploads/' . $file['document_description']);
        exit;
    }
?>