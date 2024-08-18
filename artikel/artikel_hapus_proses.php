<?php include("../db/conn.php"); ?>

<?php

    $id = $_POST['id_art'];
    $cover = $_POST['cover_art'];

    $sql = "DELETE FROM artikel WHERE id_artikel = '$id'";
    $query = $conn->query($sql);

    if($query===true){
        unlink('../assets/img/cover/' . $cover);
        header("Location:../index.php");
    }
?>

<?php $conn->close(); ?>