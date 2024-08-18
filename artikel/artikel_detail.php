<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../db/conn.php'); ?>
    <?php include('../app/user.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/bootstrap.bundle.js"></script>
</head>
<body>
    <?php include('../template/nav-bar.php'); ?>
    <?php include('artikel_hapus.php'); ?>
    <div class="container mt-5">

    <?php
        $id_artikel = $_REQUEST['id_artikel'];
        $stmt = $conn->prepare("SELECT id_artikel, judul_artikel, isi_artikel, gambar_cover, tanggal_dibuat, is_edit FROM artikel WHERE id_artikel = ?");
        $stmt->bind_param("i", $id_artikel);
        $stmt->execute();
        $query = $stmt->get_result();
        $res = $query->fetch_array();
        $id_art = $res['id_artikel'];
        $judul = htmlspecialchars($res['judul_artikel']);
        $isi = nl2br(htmlspecialchars($res['isi_artikel']));
        $cover = $res['gambar_cover'];
        $tanggal = $res['tanggal_dibuat'];
        $isedit = $res['is_edit'];
    ?>

        <div class="card" style="overflow:hidden;">
            <div class="card-body cover" style="background:url(../assets/img/cover/<?=$cover?>);background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
        </div>
        <div class="card mt-2">
            <div class="card-header bg-primary text-white">
                <h2><?=$judul?></h2>
            </div>
            <div class="card-body">
                <div class="mt-2">
                    Diposting Oleh: <span class="user"><?=$username?></span> - 
                    <span class="diubah"><?=$isedit>0 ? "Diubah - ": ""?></span>
                    <span class="waktu"><?php include("../app/waktu_posting.php");?></span>
                </div>
                <div class="mt-2">
                    <p class="card-text">
                        <?=$isi?>
                    </p>
                </div>
                <div class="mt-5">
                    <form style="display:inline-block;" action="artikel_edit.php" method="post">
                        <input type="hidden" name="id_artikel" value="<?=$id_art?>">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                    <button onclick="myHps('<?=$id_art?>', '<?=$cover?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myHapus">Hapus</button>
                    <a href="../index.php" class="btn btn-primary">Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>
        <script>
            function myHps(id, cvr){
                    const id_art = document.getElementById('id_artikel_hapus');
                    const cover = document.getElementById('cover_hapus');
                    id_art.value = id;
                    cover.value = cvr;
                }
        </script>
</html>