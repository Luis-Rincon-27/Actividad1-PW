<?php
session_start();

if (!isset($_SESSION['empleados'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['reset']) && $_GET['reset'] == 1) {
    session_unset();  // Desactivar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: index.php");
    exit();
}

// Función para calcular la edad promedio de los hombres
function calcularEdadPromedioHombres($edades, $sexos) {
    $totalEdad = 0;
    $totalHombres = 0;
    for ($i = 0; $i < count($edades); $i++) {
        if ($sexos[$i] == "Masculino") {
            $totalEdad += $edades[$i];
            $totalHombres++;
        }
    }
    return ($totalHombres > 0) ? ($totalEdad / $totalHombres) : 0;
}

$edades = $_SESSION['empleados']['Edad'];
$sexos = $_SESSION['empleados']['Sexo'];
$sueldos = $_SESSION['empleados']['Sueldo'];


// Calcular el total de empleados del sexo femenino
if (!empty(array_count_values($sexos)['Femenino'])) {
    $totalMujeres = array_count_values($sexos)['Femenino'];
} else {
    $totalMujeres = 0;
}
// Calcular el total de hombres casados que ganan más de 2500 Bs.
$totalHombresCasados = 0;
foreach ($sexos as $key => $sexo) {
    if ($sexo == "Masculino" && $_SESSION['empleados']['Estado Civil'][$key] == "Casado(a)" && $sueldos[$key] == "Más de 2500 Bs.") {
        $totalHombresCasados++;
    }
}

// Calcular el total de mujeres viudas que ganan más de 1000 Bs.
$totalMujeresViudas = 0;
foreach ($sexos as $key => $sexo) {
    if ($sexo == "Femenino" && $_SESSION['empleados']['Estado Civil'][$key] == "Viudo(a)" && $sueldos[$key] == "Entre 1000 y 2500 Bs." && "Más de 2500 Bs.") {
        $totalMujeresViudas++;
    }
}

// Calcular la edad promedio de los hombres
$edadPromedioHombres = calcularEdadPromedioHombres($edades, $sexos);

$_SESSION = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/styles/materialize.min.css" media="screen,projection">
</head>
<body>
    <div class="container">
        <h2>Resultados</h2>
        <p>Total de empleados del sexo femenino: <?php echo $totalMujeres; ?></p>
        <p>Total de hombres casados que ganan más de 2500 Bs.: <?php echo $totalHombresCasados; ?></p>
        <p>Total de mujeres viudas que ganan más de 1000 Bs.: <?php echo $totalMujeresViudas; ?></p>
        <p>Edad promedio de los hombres: <?php echo $edadPromedioHombres; ?></p>
        <a href="index.php?" class="btn">Volver al formulario</a>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    </div>
</body>
</html>