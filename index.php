<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Datos volaris_vuelo</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Volaris</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah avion -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Negocio Volaris</h3>
                <p class="card-text">Realizado por: Martin Gabriel Cobos Treviño</p>
                <p class="card-text" >grado y grupo: 5-I</p>
                <p class="card-text" >Tabla avion</p>

                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['estatus'])) : ?>
                    <?php
                    if ($_GET['estatus'] == 'exitoso')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> ¡Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Error al agregar datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="insertar.php" method="POST">

                    <div class="col-md-4">
                        <label for="idVuelo" class="form-label">Id del vuelo</label>
                        <input type="number" name="idVuelo" class="form-control" placeholder="189" required>
                    </div>

                    <div class="col-md-4">
                        <label for="capacidad" class="form-label">Capacidad de Combustible</label>
                        <input type="text" name="capacidad" class="form-control" placeholder="323,546 litros" required>
                    </div>
                    <div class="col-md-3">
                        <label for="emision" class="form-label">Emision de carbono</label>
                        <input type="text" name="emisionCarbono" class="form-control" placeholder="161 kg" required>
                    </div>
                    <div class="col-md-2">
                        <label for="nAsientos" class="form-label">Numero de asientos</label>
                        <input type="number" name="nAsientos" class=" form-control" placeholder="300" required>
                    </div>
                    <div class="col-md-5">
                        <label for="aeropuertoActual" class="form-label">Aeropuerto en el que se encuentra actualmente</label>
                        <input type="text" name="aeropuertoActual" class=" form-control" placeholder="aeropuerto Internacional Abraham González" required>
                    </div>
                    <div class="col-md-2">
                        <label for="velocidad" class="form-label">Velocidad</label>
                        <input type="text" name="velocidad" class=" form-control" placeholder="400 km/h" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-check-label" for="pantallas">Tiene pantallas?</label>
                        <input class="form-check-input" type="checkbox" name="pantallas">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="Subir" name="Subir"><i class="fa fa-plus"></i><span class="ms-2">Agregar datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Lista de registro de aviones</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Numero de registros</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['limpieza'])) : ?>
            <?php
            if ($_GET['limpieza'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no se pudieron eliminar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['actualizacion'])) : ?>
            <?php
            if ($_GET['actualizacion'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso</strong> ¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no se pudieron actualizar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>idAvion</th>";
            echo "<th scope='col'>idVuelo</th>";
            echo "<th scope='col'>CapacidadCombus</th>";
            echo "<th scope='col'>emisionCarbono</th>";
            echo "<th scope='col'>nAsientos</th>";
            echo "<th scope='col'>AeropuertoActual</th>";
            echo "<th scope='col'>Velocidad</th>";
            echo "<th scope='col'>Tiene pantallas?</th>";
            echo "<th scope='col' class='text-center'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_principal = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM avion");
            $registro = mysqli_num_rows($data);
            $total_halaman = ceil($registro / $limite);

            $sql = mysqli_query($db, "SELECT * FROM avion LIMIT $pagina_principal, $limite");
            $no = $pagina_principal + 1;

            // $sql = "SELECT * FROM avion";
            // $query = mysqli_query($db, $sql);




            while ($avion = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td class='text-center'>" . $avion['idAvion'] . "</td>";
                echo "<td>" . $avion['idVuelo'] . "</td>";
                echo "<td>" . $avion['CapacidadCombus'] . "</td>";
                echo "<td>" . $avion['emisionCarbono'] . "</td>";
                echo "<td>" . $avion['nAsientos'] . "</td>";
                echo "<td>" . $avion['AeropuertoActual'] . "</td>";
                echo "<td>" . $avion['Velocidad'] . "</td>";
                echo "<td>" . $avion['Pantallas'] . "</td>";
                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($registro == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total de entradas: $registro</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_halaman) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos avion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM avion";
                    $query = mysqli_query($db, $sql);
                    $resultado = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="idVuelo" class="form-label">Id del vuelo</label>
                                <input type="number" name="edit_idVuelo" class="form-control" placeholder="189" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="capacidad" class="form-label">Capacidad de Combustible</label>
                                <input type="text" name="edit_capacidad" class="form-control" placeholder="323,546 litros" required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="emision" class="form-label">Emision de carbono</label>
                                <input type="text" name="edit_emisionCarbono" class="form-control" placeholder="161 kg" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nAsientos" class="form-label">Numero de asientos</label>
                                <input type="number" name="edit_nAsientos" class=" form-control" placeholder="300" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="aeropuertoActual" class="form-label">Aeropuerto en el que se encuentra actualmente</label>
                                <input type="text" name="edit_aeropuertoActual" class=" form-control" placeholder="aeropuerto Internacional Abraham González" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="velocidad" class="form-label">Velocidad</label>
                                <input type="text" name="edit_velocidad" class=" form-control" placeholder="400 km/h" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-check-label" for="edit_pantallas">Tiene pantallas?</label>
                                <input class="form-check-input" type="checkbox" name="edit_pantallas">
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='submit' name='edit_informacion' class='btn btn-primary'>Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id' >
                            
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Confirmar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                //$('#edit_idVuelo').val(data[2]);
                //$('#edit_capacidad').val(data[3]);
                //$('#edit_emisionCarbono').val(data[4]);
                // jenis kelamin checked

                //$('#edit_nAsientos').val(data[5]);
                //$('#edit_aeropuertoActual').val(data[6]);
                //$('#edit_velocidad').val(data[7]);
                //$('#edit_pantallas').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>
