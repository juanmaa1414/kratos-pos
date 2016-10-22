<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php
$sql_pro = "SELECT
            pro_nombre_rsocial,
            pro_id_tipo_doc,
            pro_nro_doc,
            pro_direccion,
            pro_id_tipo_contrib,
            pro_telefono,
            loc_nombre,
            pro_id_provincia,
            pro_email
            FROM proveedores INNER JOIN localidades ON (loc_id=pro_id_localidad)";

$query_pro = $bd->query($sql_pro);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de proveedores</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nuevo_proveedor.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nuevo
        </a>
    </div>
    <?php if ($query_pro->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre proveedor</th>
                    <th>N° Documento</th>
                    <th>Direccion</th>
                    <th>Id tipo contr.</th>
                    <th>N° telefono</th>
                    <th>Id localidad</th>
                    <th>E-mail</th>
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($pro = $query_pro->fetch_object()): ?>
                <tr>
                    <td><?= $pro->pro_nombre_rsocial ?></td>
                    <td><?= $pro->pro_nro_doc ?></td>
                    <td><?= $pro->pro_direccion ?></td>
                    <td><?= $pro->pro_id_tipo_contrib ?></td>
                    <td><?= $pro->pro_telefono ?></td>
                    <td><?= $pro->loc_nombre ?></td>
                    <td><?= $pro->pro_email ?></td>
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
