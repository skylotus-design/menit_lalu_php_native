<div class="modal fade" id="myHapus">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="artikel_hapus_proses.php">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Ini Tidak Bisa Dibatalkan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <h5>Hapus Data Siswa?</h5>
                <input type="hidden" name="id_art" id="id_artikel_hapus" value="">
                <input type="hidden" name="cover_art" id="cover_hapus" value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">TIDAK</button>
                <input type="submit" value="IYA" name="send" class="btn btn-warning">
            </div>
        </form>

        </div>
    </div>
</div>