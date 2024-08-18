<?php
    $waktu_sekarang = time();

    $detik = $waktu_sekarang - $tanggal; //$tanggal dari database
    $menit = floor($detik/60);
    $jam = floor($menit/60);

?>

<?php

    if($menit == 0){ 
        echo "Baru saja"; 
    } elseif ($menit < 60){ 
        echo $menit . " menit yang lalu";
    } elseif ($jam < 24){ 
        echo $jam . " jam yang lalu";
    } else { 
        echo date("d-m-Y", $tanggal);
    }
?>