<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_informacion'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $idVuelo = $_POST['edit_idVuelo'];
    $Capacidad = $_POST['edit_capacidad'];
    $emision = $_POST['edit_emisionCarbono'];
    $nAsientos = $_POST['edit_nAsientos'];
    $aeropuerto = $_POST['edit_aeropuertoActual'];
    $velocidad = $_POST['edit_velocidad'];
    if(isset($_POST["edit_pantallas"]) and $_POST["edit_pantallas"]=="on"){
        $pantallas = 1;
    }else{
        $pantallas = 0;
    }


    // query idAvion, idVuelo, CapacidadCombus, emisionCarbono, nAsientos, AeropuertoActual,Velocidad,Pantallas
    $sql = "UPDATE avion SET idVuelo=$idVuelo, CapacidadCombus='$Capacidad', emisionCarbono='$emision', nAsientos=$nAsientos, AeropuertoActual='$aeropuerto',Velocidad='$velocidad',Pantallas=$pantallas WHERE idAvion = $id";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query){
        header('Location: ./index.php?actualizacion=exito');
    }else{
        header('Location: ./index.php?actualizacion=error');
    }
} 
// else
//     die("Akses dilarang...");
