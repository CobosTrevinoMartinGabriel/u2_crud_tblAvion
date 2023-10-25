<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['Subir'])) {
    // ambil data dari form
    $idAvion = $_POST['idAvion'];
    $idVuelo = $_POST['idVuelo'];
    $Capacidad = $_POST['capacidad'];
    $emision = $_POST['emisionCarbono'];
    $nAsientos = $_POST['nAsientos'];
    $aeropuerto = $_POST['aeropuertoActual'];
    $velocidad = $_POST['velocidad'];
    if(isset($_POST["pantallas"]) and $_POST["pantallas"]=="on"){
        $pantallas = 1;
    }else{
        $pantallas = 0;
    }
    
    echo $pantallas;

    // query 
    $sql = "INSERT INTO avion( idVuelo, CapacidadCombus, emisionCarbono, nAsientos, AeropuertoActual,Velocidad,Pantallas) VALUES ( $idVuelo, '$Capacidad', '$emision', $nAsientos, '$aeropuerto','$velocidad',$pantallas)";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?estatus=exitoso');
    else
        header('Location: ./index.php?estatus=error');
} else
    die("Akses dilarang...");
