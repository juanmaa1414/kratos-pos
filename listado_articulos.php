<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php

$sql_art = "SELECT 
                art_descripcion,
                art_codigo,
                fam_nombre,
                art_precio_actual,
                tiva_nombre,
                p1.pro_nombre_rsocial AS prov1,
                p2.pro_nombre_rsocial AS prov2
            FROM 
                articulos 
            INNER JOIN 
                familia_articulos
            ON
                (art_id_familia=fam_id)
            INNER JOIN
                tipo_ivas
            ON
                (art_id_iva=tiva_id)
            INNER JOIN 
                proveedores AS p1
            ON
                (art_id_prov1=p1.pro_id)
            INNER JOIN
                proveedores AS p2
            ON
                (art_id_prov2=p2.pro_id)";

$query_art = $bd->query($sql_art);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de Articulos</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nuevo_articulo.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nuevo
        </a>
    </div>
    <?php if ($query_art->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Codigo</th>
                    <th>Familia Art.</th>
                    <th>Precio</th>
                    <th>Tipo IVA</th>
                    <th>Proveedor 1</th>
                    <th>Proveedor 2</th>
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($art = $query_art->fetch_object()): ?>
                <tr>
                    <td><?= $art->art_descripcion ?></td>
                    <td><?= $art->art_codigo ?></td>
                    <td><?= $art->fam_nombre ?></td>
                    <td><?= $art->art_precio_actual ?></td>
                    <td><?= $art->tiva_nombre ?></td>
                    <td><?= $art->prov1 ?></td>
                    <td><?= $art->prov2 ?></td>
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
        <br><br><center><p>No se encontró ningún registro :(</p></center>
    <?php endif; ?>
</div>

<?php
include "piedepagina.php";
?>
