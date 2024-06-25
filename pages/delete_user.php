<?php
// Koneksi ke database
require_once(__DIR__ . '/../route/conn.php');
session_start();


// Memeriksa apakah permintaan POST berisi lend_id
if (isset($_POST['user_id'])) {
    $userID = $_POST['user_id'];


    // Menghapus data berdasarkan lend_id
    $deleteQuery = mysqli_query($conn, "DELETE FROM user WHERE user_id = '$userID'");
    if ($deleteQuery) {
        echo "success"; // Mengirimkan respons sukses ke permintaan AJAX
    } else {
        echo "error"; // Mengirimkan respons gagal ke permintaan AJAX
    }
}
?>
