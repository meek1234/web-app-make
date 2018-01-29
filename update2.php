<?php
    $conn = mysqli_connect("localhost", "root", "meek1012");
    mysqli_select_db($conn, "opentutorials");
    $sql = 'update topic set title="' . $_POST['title'] . '", description="' . $_POST['description'] . '" where id = ' . $_POST['id'];
    $result = mysqli_query($conn, $sql);
    header('Location: http://localhost/index.php');
?>