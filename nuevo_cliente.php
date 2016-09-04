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
    $alu_fecha_alta = date("Y-m-d");

    $sql_alu = "INSERT INTO clientes (
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

    $insert_alu = $bd->query($sql_alu);
    if ( ! $insert_alu) {
        $msg = "Ocurrió un error al intentar guardar: " . $bd->error;
    } else {
        $msg = "El registro fué completado con éxito.";
    }

    // Dirigimos al usuario a seguir cargando.
    // Además al redirigir de esta forma, evitamos que el
    // navegador pueda preguntar si volver a enviar el formulario.
    echo "<script>
            alert('" . addslashes($msg) . "');
            location.href = 'nuevo_alumno.php';
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

// Paises
$sql_pais = "SELECT pais_id, pais_nombre FROM paises";
$query_pais = $bd->query($sql_pais);

// Provincias
$sql_prov = "SELECT prov_id, prov_nombre FROM provincias";
$query_prov = $bd->query($sql_prov);
?>

<div id="contenido">
    <form id="" action="nuevo_alumno.php" method="post">
        <h2>Nuevo Alumno</h2>

        <label for="alu_apellido">Apellido:</label>
        <input name="alu_apellido" id="alu_apellido" type="text">
        <br><br>
        <label for="alu_nombre">Nombre:</label>
        <input name="alu_nombre" id="alu_nombre" type="text">
        <br><br>
        <label for="alu_id_tipo_doc">Tipo documento:</label>
        <select name="alu_id_tipo_doc">
            <option value="">elegir...</option>
            <?php while($tdoc = $query_tdoc->fetch_object()): ?>
                <option value="<?= $tdoc->tdoc_id ?>">
                    <?= $tdoc->tdoc_nombre ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <label for="alu_numero_doc">Doc./clave:</label>
        <input name="alu_numero_doc" id="alu_numero_doc" type="text">
        <br><br>
        <label for="alu_id_provincia">Provincia:</label>
        <select name="alu_id_provincia">
            <option value="">elegir...</option>
            <?php while($prov = $query_prov->fetch_object()): ?>
                <option value="<?= $prov->prov_id ?>">
                    <?= $prov->prov_nombre ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <input type="submit" name="formulario" value="Enviar">
    </form>
</div>

<?php
include "piedepagina.php";
?>
