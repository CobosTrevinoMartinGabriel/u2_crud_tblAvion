<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil id dari query string
    $id = $_POST['delete_id'];
    echo $id;
    // query hapus
    $sql = "DELETE FROM avion WHERE idAvion = $id";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./index.php?limpieza=exito');
    } else
        die('Location: ./index.php?limpieza=error');
} else
    die("akses dilarang...");
