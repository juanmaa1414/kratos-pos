<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php

$sql_loc = "SELECT loc_nombre FROM localidades";
        

$query_loc = $bd->query($sql_loc);
?>

<?php
include "parte-superior.php";
?>

<div id="contenido">
    <div class="titulo-secc">
        <h2 class="god">Listado de Localidades</h2>
    </div>
    <div class="lista-opc">
        <a class="lista-opc-item" href="nueva_localidad.php">
            <img src="img/icons/plus.png" width="30">
            <br>
            Nueva
        </a>
    </div>
    <?php if ($query_loc->num_rows >= 1): ?>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre de la Localidad</th>
                    
                    <th colspan="2">Opción</th>
                </tr>
            </thead>
            <tbody>

            <?php while($loc = $query_loc->fetch_object()): ?>
                <tr>
                    
                    <td><?= $loc->loc_nombre ?></td>
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
