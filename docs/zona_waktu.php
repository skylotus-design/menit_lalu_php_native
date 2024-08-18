<?php
    $time_in_jakarta = new DateTime("now", new DateTimeZone("Asia/Jakarta"));
    $time_in_user_timezone = $time_in_jakarta->setTimezone(new DateTimeZone($user_timezone));

    echo "Waktu di Jakarta: " . $time_in_jakarta->format('Y-m-d H:i:s');
    echo "Waktu lokal Anda: " . $time_in_user_timezone->format('Y-m-d H:i:s');
?>