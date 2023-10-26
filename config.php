<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "volaris";

$db = mysqli_connect($server, $user, $password, $nama_database);
$db -> set_charset("utf8mb4");

if (!$db)
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
