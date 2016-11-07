<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php

$sql_prov = "SELECT prov_nombre FROM provincias";
        

$query_prov = $bd->query($sql_prov);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de Provincias</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nueva_provincia.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nueva
        </a>
    </div>
    <?php if ($query_prov->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre de Provincia</th>
                    
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($prov = $query_prov->fetch_object()): ?>
                <tr>
                    
                    <td><?= $prov->prov_nombre ?></td>
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
