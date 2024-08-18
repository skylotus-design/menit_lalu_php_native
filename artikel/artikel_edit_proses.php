<?php include('../db/conn.php'); ?>
<?php include('../app/user.php'); ?>

<?php
    $id_art = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $nama_cover = $_FILES['cover']['name'];
    $cover = mt_rand(0000,9999) . "-" . preg_replace("/[()\s]/", "", $nama_cover);
    $tanggal = strtotime(date("Y-m-d h:i:sa"));
    $edit = 1;
    
    $stmt = $conn->prepare("UPDATE artikel SET judul_artikel = ?, isi_artikel = ?, tanggal_dibuat = ?, is_edit = ? WHERE id_artikel = ?");
    $stmt->bind_param("sssii", $judul, $isi, $tanggal, $edit, $id_art);
    $stmt->execute();
    
    if($stmt){
        header("Location:artikel_detail.php?id_artikel={$id_art}");
    }

?>

<?php $conn->close(); ?>