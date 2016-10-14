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
    $cli_apellido = $bd->real_escape_string($_POST["cli_apellido"]);
    $cli_nombre = $bd->real_escape_string($_POST["cli_nombre"]);
    $cli_dni = $bd->real_escape_string($_POST["cli_dni"]);
    $cli_direccion = $bd->real_escape_string($_POST["cli_direccion"]);
    $cli_telefono = $bd->real_escape_string($_POST["cli_telefono"]);
     $cli_id_localidad = $bd->real_escape_string($_POST["cli_id_localidad"]);
      $cli_email = $bd->real_escape_string($_POST["cli_email"]);
    
    $sql_cli = "INSERT INTO clientes (
                    cli_apellido,
                    cli_nombre,
                    cli_dni,
                    cli_direccion,
                    cli_telefono,
                    cli_id_localidad,
                    cli_email,
                    cli_estado)
                VALUES (
                    '{$cli_apellido}',
                    '{$cli_nombre}',
                    '{$cli_dni}',
                    '{$cli_direccion}',
                    '{$cli_telefono}',
                    '{$cli_id_localidad}',
                    '{$cli_email}',
                    '{$cli_estado}')";
/*echo "<pre>$sql_cli</pre>";
exit;*/

    $insert_cli = $bd->query($sql_cli);
    if ( ! $insert_cli) {
        $msg = "Ocurrió un error al intentar guardar: " . $bd->error;
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo "<script>
            alert('" . addslashes($msg) . "');
            location.href = 'nuevo_cliente.php';
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

// Efectuamos las consultas para poder mostrar los valores despegables.

// Tipos de documento
$sql_tdoc = "SELECT tdoc_id, tdoc_nombre FROM tipo_documentos";
$query_tdoc = $bd->query($sql_tdoc);

// Localidades
$sql_loc = "SELECT loc_id, loc_nombre FROM localidades";
$query_loc = $bd->query($sql_loc);
?>

<div id="contenido">
    <form id="" action="nuevo_cliente.php" method="post">
        <h2>Nuevo Cliente</h2>

        <label for="cli_apellido">Apellido:</label>
        <input name="cli_apellido" id="cli_apellido" type="text">
        <br><br>
        <label for="cli_nombre">Nombre:</label>
        <input name="cli_nombre" id="cli_nombre" type="text">
        <br><br>
        <!--<label for="cli_id_tipo_doc">Tipo documento:</label>
        <select name="cli_id_tipo_doc">
            <option value="">elegir...</option>
            <?php while($tdoc = $query_tdoc->fetch_object()): ?>
                <option value="<?= $tdoc->tdoc_id ?>">
                    <?= $tdoc->tdoc_nombre ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>-->
        <label for="cli_dni">Doc./clave:</label>
        <input name="cli_dni" id="cli_dni" type="number">
        <br><br>
         <label for="cli_direccion">Direccion:</label>
        <input name="cli_direccion" id="cli_direccion" type="text">
        <br><br>
         <label for="cli_telefono">N° Telefono:</label>
        <input name="cli_telefono" id="cli_telefono" type="text">
        <br><br>
        <label for="cli_id_localidad">Localidad:</label>
        <select name="cli_id_localidad">
            <option value="">elegir...</option>
            <?php while($loc = $query_loc->fetch_object()): ?>
                <option value="<?= $loc->loc_id ?>">
                    <?= $loc->loc_nombre ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
         <label for="cli_email">Email:</label>
        <input name="cli_email" id="cli_email" type="email">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">
    </form>
</div>

<?php
include "piedepagina.php";
?>
