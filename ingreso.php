<?php
session_start();

if (!isset($_SESSION['empleados'])) {
    $_SESSION['empleados'] = array(
        'Nombre' => array(),
        'Apellido' => array(),
        'Edad' => array(),
        'Estado Civil' => array(),
        'Sexo' => array(),
        'Sueldo' => array()
    );
}

if (isset($_POST['btn'])) {
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $edad = $_POST['txtEdad'];
    $estadoCivil = $_POST['txtEstadoCivil'];
    $sexo = $_POST['txtSexo'];
    $sueldo = $_POST['txtSueldo'];

    array_push($_SESSION['empleados']['Nombre'], $nombre);
    array_push($_SESSION['empleados']['Apellido'], $apellido);
    array_push($_SESSION['empleados']['Edad'], $edad);
    array_push($_SESSION['empleados']['Estado Civil'], $estadoCivil);
    array_push($_SESSION['empleados']['Sexo'], $sexo);
    array_push($_SESSION['empleados']['Sueldo'], $sueldo);

    // Incrementar el número de registros
    if (!isset($_SESSION['numRegistros'])) {
        $_SESSION['numRegistros'] = 0;
    }
    $_SESSION['numRegistros']++;

    // Si se llega a 5 registros, redirige al reporte
    if ($_SESSION['numRegistros'] >= 5) {
            header("Location: reporte.php");
            exit();
        } else {
    // Almacenar el mensaje en una variable de sesión
            $_SESSION['mensaje'] = "El registro número " . $_SESSION['numRegistros'] . " se ha guardado de forma temporal en la sesión actual.";
            // Redirige a la página principal
            header("Location: index.php");
            exit();
        }
}
?>