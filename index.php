<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('db/conn.php'); ?>
    <?php include('app/user.php'); ?>
    <?php include('app/timezone.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Dasboard</a></li>
            <li class="nav-item"><a class="nav-link" href="artikel/artikel_post.php">Posting</a></li>
        </ul>
    </nav>
    <div class="container mt-5">

        <h1>DAFTAR ARTIKEL</h1><br>

        <?php
            $sql = "SELECT id_artikel, judul_artikel, isi_artikel, tanggal_dibuat, gambar_cover, is_edit FROM artikel";
            $query = $conn->query($sql);

            while($artikel = $query->fetch_array()){
                
                $id_art = $artikel['id_artikel'];
                $judul = htmlspecialchars($artikel['judul_artikel']);
                $isi = htmlspecialchars($artikel['isi_artikel']); //nl2br harus setelah htmlspecialchars
                $cover = $artikel['gambar_cover'];
                $tanggal = $artikel['tanggal_dibuat'];
                $isedit = $artikel['is_edit'];
        ?>
            <div class="card mt-2">
                <div class="card-body">

                    <h3 class="card-title judul"><?=$judul?></h3>

                    Diposting Oleh: <span class="user"><?=$username?></span> - 
                    <span class="diubah"><?=$isedit>0 ? "Diubah - ": ""?></span>
                    <span class="waktu"><?php include("app/waktu_posting.php");?></span><hr>

                    <p class="card-text">
                        <?php if($isi >= 400):?>
                            <?=substr($isi, 0, 400);?> ... <a href="artikel/artikel_detail.php?id_artikel=<?=$id_art?>">Lanjut</a>
                        <?php else: ?>
                            <?=$isi?> ... <a href="artikel/artikel_detail.php?id_artikel=<?=$id_art?>">Lanjut</a>
                        <?php endif; ?>
                    </p>

                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>