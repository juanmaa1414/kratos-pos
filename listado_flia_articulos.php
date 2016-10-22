<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php
$sql_fam = "SELECT
            fam_id,
            fam_nombre
            FROM familia_articulos";

$query_fam = $bd->query($sql_fam);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de familias articulos</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nueva_flia_articulo.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nuevo
        </a>
    </div>
    <?php if ($query_fam->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($fam = $query_fam->fetch_object()): ?>
                <tr>
                    <td><?= $fam->fam_nombre ?></td>
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
