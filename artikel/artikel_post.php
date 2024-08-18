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
        <div class="card">
            <div class="card-header bg-primary text-white">
            <h3>POSTING ARTIKEL</h3>
            </div>
            <form action="artikel_post_proses.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mt-2 mb-3">
                        <input type="text" name="judul" class="form-control" placeholder="Judul artikel">
                    </div>
                    <div class="mt-2 mb-4">
                        <textarea name="isi" class="form-control" rows="8">Isi Artikel...</textarea>
                    </div>
                    <div class="mt-2">
                        <label>Lampirkan Gambar Cover:</label><br><br>
                        <input type="file" name="cover" class="form-control" accept=".jpg, .jpeg, .png, .webp">
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