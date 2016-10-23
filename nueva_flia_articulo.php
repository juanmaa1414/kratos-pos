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
    
    $fam_nombre = $bd->real_escape_string($_POST["fam_nombre"]);
    
    $sql_fam = "INSERT INTO familia_articulos (
                    fam_nombre)
                VALUES (
                    '{$fam_nombre}'
                    )";

    $insert_fam = $bd->query($sql_fam);
    if ( ! $insert_fam) {
        $msg = "Ocurrió un error al intentar guardar.";
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo '<script>
            alert("' . $msg . '");
            location.href = "nueva_flia_articulo.php";
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
    <form id="" action="nueva_flia_articulo.php" method="post">
        <h2>Nueva Familia de Articulo</h2>

        <label for="fam_nombre">Familia articulo:</label>
        <input name="fam_nombre" id="fam_nombre" type="text">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">
       
    </form>
</div>

<?php
include "piedepagina.php";
?>
