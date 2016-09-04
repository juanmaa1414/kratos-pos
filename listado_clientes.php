<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php
$sql_alu = "SELECT
            cli_apellido,
            cli_nombre,
            cli_dni,
            cli_direccion,
            cli_telefono,
            cli_id_localidad,
            cli_email
            FROM clientes
        WHERE alu_eliminado = 0";

$query_alu = $bd->query($sql_alu);
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
    <?php if ($query_alu->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Ap. y nombre</th>
                    <th>Documento</th>
                    <th>Provincia</th>
                    <th>Fecha de alta</th>
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($alu = $query_alu->fetch_object()): ?>
                <tr>
                    <td><?= $alu->alu_apellido . ', ' . $alu->alu_nombre ?></td>
                    <td><?= $alu->alu_numero_doc ?></td>
                    <td><?= $alu->prov_nombre ?></td>
                    <td><?= date("d-m-Y", strtotime($alu->alu_fecha_alta)) ?></td>
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
