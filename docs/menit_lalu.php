<?php

    date_default_timezone_set("Asia/Jakarta");

    $tanggal = mktime(13,0,0,8,18,2024);  // jam,menit,detik,bulan,tanggal,tahun -> mktime menghasilkan unix

    $waktu_sekarang = time();

    $detik = $waktu_sekarang - $tanggal;
    $menit = floor($detik/60);
    $jam = floor($menit/60);

    echo $tanggal . "<br><br>"; // mktime menghasilkan unix

?>


<?php

    if($menit == 0){ 
        echo "Baru saja"; 
    } elseif ($menit < 60){ 
        echo $menit . " menit yang lalu";
    } elseif ($jam < 24){ 
        echo $jam . " jam yang lalu";
    } else { 
        echo date("d-m-Y h:i:sa", $tanggal);
    }
?>