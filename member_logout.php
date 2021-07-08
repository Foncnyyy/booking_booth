<?php
session_start();
session_destroy();
alert("ออกจากระบบเรียบร้อย");

function alert($msg) {
    echo    "<script type='text/javascript'>
                alert('$msg');
                window.location.href = 'web_booking.php';
            </script>";
}
?>