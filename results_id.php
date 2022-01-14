<?php
include('nav/config.php'); 

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    // fetch file to download from database
    $sql = "SELECT * FROM results WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'adminpanale/results/' . $file['name'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('adminpanale/results/' . $file['name']));
        readfile('adminpanale/results/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE results SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    }

}
?>