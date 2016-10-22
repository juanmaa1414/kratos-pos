<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php
/*$sql_cli = "SELECT
            cli_apellido,
            cli_nombre,
            cli_dni,
            cli_direccion,
            cli_telefono,
            cli_id_localidad,
            cli_email
            FROM clientes";*/
$sql_cli = "SELECT cli_apellido, cli_nombre, cli_dni, cli_direccion, cli_telefono, loc_nombre, cli_email FROM clientes INNER JOIN localidades on (loc_id=cli_id_localidad)";
        /*WHERE cli_eliminado = 0*/

$query_cli = $bd->query($sql_cli);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de clientes</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nuevo_cliente.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nuevo
        </a>
    </div>
    <?php if ($query_cli->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Ap. y nombre</th>
                    <th>Documento</th>
                    <th>Localidad</th>
                    <th>N° telefono</th>
                    <th>Direccion</th>
                    <th>E-mail</th>
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($cli = $query_cli->fetch_object()): ?>
                <tr>
                    <td><?= $cli->cli_apellido . ', ' . $cli->cli_nombre ?></td>
                    <td><?= $cli->cli_dni ?></td>
                    <td><?= $cli->loc_nombre/*prov_nombre*/ ?></td>
                    <td><?= $cli->cli_telefono ?></td>
                    <td><?= $cli->cli_direccion ?></td>
                    <td><?= $cli->cli_email ?></td>
                    <td>
                        <a href="#" title="Modificar">
                            <img src="img/icons/new-reg.png" width="18">
                        </a>
                    </td>
                    <td>
                        <a href="#" title="Borrar">
                            <img src="img/icons/delete.png" width="18">
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontró ningún registro :(</p>
    <?php endif; ?>
</div>

<?php
include "piedepagina.php";
?>
