<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>
<?php

if ($_POST) {
    // Guardamos valores de inputs con escape de caracteres raros y/o sospechosos.

    $pvta_nombre = $bd->real_escape_string($_POST["pvta_nombre"]);
    $pvta_numero = $bd->real_escape_string($_POST["pvta_numero"]);
    // Nos olvidamos de valores y caracteres raros y/o sospechosos. Previene de un ataque.
    $sql_pvta = "INSERT INTO punto_ventas (
    pvta_nombre,
    pvta_numero)
    VALUES (
    '{$pvta_nombre}',
    '{$pvta_numero}'
    )";

    $insert_pvta = $bd->query($sql_pvta);
    if ( ! $insert_pvta) {
        $msg = "Ocurrió un error al intentar guardar.";
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo '<script>
    alert("' . $msg . '");
    location.href = "nuevo_punto_venta.php";
    </script>';

    // Una vez que hicimos "echo" de la redirección con JS, detenemos
    // toda la ejecución de éste archivo php.
exit;
}
?>
<?php
            # Comienza la carga de la página.
            ##################################################

include "parte-superior.php";
?>

<div id="contenido">
    <form id="" action="nuevo_punto_venta.php" method="post">
        <h2>Nuevo Punto de Ventas</h2>

        <label for="pvta_nombre">Nombre Punto de venta:</label>
        <input name="pvta_nombre" id="pvta_nombre" type="text">
        <br><br>
        <label for="pvta_numero">Numero del Punto de venta:</label>
        <input name="pvta_numero" id="pvta_numero" type="text">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">

    </form>
</div>

<?php
include "piedepagina.php";
?>
