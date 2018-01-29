<?php
    $conn = mysqli_connect("localhost", "root", "meek1012");
    mysqli_select_db($conn, "opentutorials");
    $sql = "delete from topic where id=".$_POST['id'];
    $result = mysqli_query($conn, $sql);
    header('Location: http://localhost/index.php');
?>