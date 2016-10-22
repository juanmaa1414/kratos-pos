<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>
<?php
            # Procesamos los datos enviados por el formulario de éste archivo.
            # (Solamente si hubo un envío)
            ##################################################
if ($_POST) {
    // Guardamos valores de inputs con escape de caracteres raros y/o sospechosos.

    $loc_nombre = $bd->real_escape_string($_POST["loc_nombre"]);
    // Nos olvidamos de valores y caracteres raros y/o sospechosos. Previene de un ataque.
    $sql_loc = "INSERT INTO localidades (
    loc_nombre)
    VALUES (
    '{$loc_nombre}'
    )";

    $insert_loc = $bd->query($sql_loc);
    if ( ! $insert_loc) {
        $msg = "Ocurrió un error al intentar guardar: " . $bd->error;
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo "<script>
    alert('" . addslashes($msg) . "');
    location.href = 'nueva_localidad.php';
</script>";

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
    <form id="" action="nueva_localidad.php" method="post">
        <h2>Nueva Localidad</h2>

        <label for="loc_nombre">Nombre de la Localidad:</label>
        <input name="loc_nombre" id="loc_nombre" type="text">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">

    </form>
</div>

<?php
include "piedepagina.php";
?>
