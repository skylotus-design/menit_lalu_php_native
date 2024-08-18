<?php include('../db/conn.php'); ?>
<?php include('../app/user.php'); ?>

<?php

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $nama_cover = $_FILES['cover']['name'];
    $cover = mt_rand(0000,9999) . "-" . preg_replace("/[()\s]/", "", $nama_cover);
    $tanggal = strtotime(date("Y-m-d h:i:sa"));
    $edit = 0;
    
    $stmt = $conn->prepare("INSERT INTO artikel(judul_artikel, isi_artikel, gambar_cover, tanggal_dibuat, is_edit, id_foreign_user) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssii", $judul, $isi, $cover, $tanggal, $edit, $id_user);
    $stmt->execute();
    
    if($stmt){
        $file_cover = $_FILES['cover']['tmp_name'];
        move_uploaded_file($file_cover, '../assets/img/cover/' . $cover);
        header("Location:../index.php");
    }

?>

<?php $conn->close(); ?>