<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
    <link rel="stylesheet" href="assets\styles\materialize.min.css" media="screen,projection">
</head>
<body>
    <div class="container">
        <h2>Ingrese los datos del empleado</h2>
        <form action="ingreso.php" method="post">
            <label for=" ">Nombre</label>
            <input type="text" name="txtNombre" id="" required>
            <label for=" ">Apellido</label>
            <input type="text" name="txtApellido" id="" required>
            <label for=" ">Edad</label>
            <input type="text" name="txtEdad" id="" placeholder="18-99" pattern="^[0-9]+([,]?[0-9]+)*$" required><br>
            
            <label for=" ">Caracteristicas</label>
            <select class="browser-default" name="txtEstadoCivil" id="">
                <option value="Soltero(a)">Soltero(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Viudo(a)">Viudo(a)</option>
            </select>

            <div class="input-field col s6">
                <select class="browser-default" name="txtSexo" id="">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="input-field col s6">
                <select class="browser-default" name="txtSueldo" id="">
                    <option value="Menos de 1000 Bs.">Menos de 1000 Bs.</option>
                    <option value="Entre 1000 y 2500 Bs.">Entre 1000 y 2500 Bs.</option>
                    <option value="Más de 2500 Bs.">Más de 2500 Bs.</option>
                </select>
            </div>

            <br><input class="btn" type="submit" value="Registrar" name="btn">
            <a href="reporte.php" class="btn">Reporte</a>
        </form>
        <script type="text/javascript" src="assets\js\materialize.js"></script>
    </div>
</body>
</html>
