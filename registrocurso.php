<?php
 include("conexion.php");
 

 //  Captura de datos del formulario
 $CursCodigo = $_POST['CursCodigo'];
 $CursNombre = $_POST['CursNombre'];
 $CursHorario = $_POST['CursHorario'];
 $CursCreditos = $_POST['CursCreditos'];
 $CursCarrera = $_POST['CursCarrera'];
 

 //  Validación (¡Importante!)
 if (empty($CursCodigo) || empty($CursNombre)) {
  die("Error: El código y el nombre del curso son obligatorios.");
 }
 

 //  Consulta SQL INSERT
 $sql = "INSERT INTO Cursos (CursCodigo, CursNombre, CursHorario, CursCreditos, CursCarrera)
         VALUES (?, ?, ?, ?, ?)";
 $params = array($CursCodigo, $CursNombre, $CursHorario, $CursCreditos, $CursCarrera);
 

 //  Ejecutar la consulta
 $stmt = sqlsrv_query($conn, $sql, $params);
 

 //  Manejo de errores
 if ($stmt === false) {
  die(print_r(sqlsrv_errors(), true));
 } else {
  echo "<div class='alert alert-success' role='alert'>Curso registrado exitosamente.</div>";
  echo "<a href='registrocurso.html' class='btn btn-primary mt-3'>Registrar Otro Curso</a>";
 }
 

 sqlsrv_close($conn);
 ?>
 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">