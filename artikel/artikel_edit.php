<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../db/conn.php'); ?>
    <?php include('../app/user.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.js"></script>
</head>
<body>
    <?php include('../template/nav-bar.php'); ?>
    <div class="container mt-5">

    <?php
        $id_artikel = $_POST['id_artikel'];
        $stmt = $conn->prepare("SELECT id_artikel, judul_artikel, isi_artikel, gambar_cover, tanggal_dibuat FROM artikel WHERE id_artikel = ?");
        $stmt->bind_param("i", $id_artikel);
        $stmt->execute();
        $query = $stmt->get_result();
        $res = $query->fetch_array();
        $id_art = $res['id_artikel'];
        $judul = $res['judul_artikel'];
        $isi = $res['isi_artikel'];
        $cover = $res['gambar_cover'];
        $tanggal = $res['tanggal_dibuat'];
    ?>

        <div class="card">
            <div class="card-header bg-primary text-white">
            <h3>POSTING ARTIKEL</h3>
            </div>
            <form action="artikel_edit_proses.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_artikel" value="<?=$id_art?>">
                <div class="card-body">
                    <div class="mt-2 mb-3">
                        <input type="text" name="judul" class="form-control" value="<?=$judul?>">
                    </div>
                    <div class="mt-2 mb-4">
                        <textarea name="isi" class="form-control" rows="8"><?=$isi?></textarea>
                    </div>
                    <div class="mt-4">
                        <input type="submit" value="POSTING" name="kirim" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>