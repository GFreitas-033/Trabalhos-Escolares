<?php
    session_start();
    include 'connection/crud.php';

    $id = $_SESSION['usuario'];

    $sql = "DELETE FROM ecommerce.usuario WHERE iduser='$id'";
    $res = mysqli_query($con, $sql);

    header('location:login/login.html');
?>