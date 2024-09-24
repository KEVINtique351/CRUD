<?php
include("../config/Conexion.php");
$conexionDam = new Conexion();
$conexion = $conexionDam->conectar();

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$tipoDeDocumento = $_POST['tipoDeDocumento'];
$documento = $_POST['documento'];
$estado = $_POST['estado'];
$edad = $_POST['edad'];

$sql = "UPDATE pacientes SET nombres='$nombres', apellidos='$apellidos', id_tipoDocumento='$tipoDeDocumento', documento='$documento', id_estado='$estado', edad='$edad' WHERE id_paciente='$id'";

if ($resultado = $conexion->query($sql)) {
    header('Location: ../index.php');
} else {
    echo 'Error al editar datos';
}