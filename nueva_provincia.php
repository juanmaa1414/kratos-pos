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
    
    $prov_nombre = $bd->real_escape_string($_POST["prov_nombre"]);
    
    $sql_prov = "INSERT INTO provincias (
                    prov_nombre)
                VALUES (
                    '{$prov_nombre}'
                    )";

    $insert_prov = $bd->query($sql_prov);
    if ( ! $insert_prov) {
        $msg = "Ocurrió un error al intentar guardar: " . $bd->error;
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo "<script>
            alert('" . addslashes($msg) . "');
            location.href = 'nueva_provincia.php';
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
    <form id="" action="nueva_provincia.php" method="post">
        <h2>Nueva Provincia</h2>

        <label for="prov_nombre">Nombre Provincia:</label>
        <input name="prov_nombre" id="prov_nombre" type="text">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">
       
    </form>
</div>

<?php
include "piedepagina.php";
?>
