<?php
include("conexion.php");

$dni        = $_POST['dni'];
$nombres    = $_POST['nombres'];
$apellidos  = $_POST['apellidos'];
$fec_nac    = $_POST['fec_nac'];
$direccion  = $_POST['direccion'];
$telefono   = $_POST['telefono'];
$genero     = $_POST['genero'];

if (isset($_POST['registrar'])) {
    $sql = "INSERT INTO Alumno (AlumDNI, AlumNombres, AlumApellidos, AlumFecNac, AlumDireccion, AlumTelefono, AlumGenero)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params = array($dni, $nombres, $apellidos, $fec_nac, $direccion, $telefono, $genero);
    sqlsrv_query($conn, $sql, $params);
}

if (isset($_POST['eliminar'])) {
    $sql = "DELETE FROM Alumno WHERE AlumDNI = ?";
    $params = array($dni);
    sqlsrv_query($conn, $sql, $params);
}

if (isset($_POST['actualizar'])) {
    $sql = "UPDATE Alumno SET 
                AlumNombres = ?, AlumApellidos = ?, AlumFecNac = ?, AlumDireccion = ?, AlumTelefono = ?, AlumGenero = ?
            WHERE AlumDNI = ?";
    $params = array($nombres, $apellidos, $fec_nac, $direccion, $telefono, $genero, $dni);
    sqlsrv_query($conn, $sql, $params);
}

header("Location: registro.php"); // redireccionar para evitar reenvíos de formulario
exit;
?>

