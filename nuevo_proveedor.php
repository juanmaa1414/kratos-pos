<?php
include "parte-superior.php";
include "config.php";
include "conexion_bd.php";
?>
<?php  
if ($_POST) {
    $pro_nombre_rsocial = $bd->real_escape_string($_POST["pro_nombre_rsocial"]);
    $pro_id_tipo_doc = $bd->real_escape_string($_POST["pro_id_tipo_doc"]);
    $pro_nro_doc = $bd->real_escape_string($_POST["pro_nro_doc"]);
    $pro_direccion = $bd->real_escape_string($_POST["pro_direccion"]);
    $pro_id_tipo_contrib = $bd->real_escape_string($_POST["pro_id_tipo_contrib"]);
    $pro_telefono = $bd->real_escape_string($_POST["pro_telefono"]);
     $pro_id_localidad = $bd->real_escape_string($_POST["pro_id_localidad"]);
     $pro_id_provincia = $bd->real_escape_string($_POST["pro_id_provincia"]);
      $pro_email = $bd->real_escape_string($_POST["pro_email"]);
    
    $sql_pro = "INSERT INTO proveedores (
                    pro_nombre_rsocial,
                    pro_id_tipo_doc,
                    pro_nro_doc,
                    pro_direccion,
                    pro_id_tipo_contrib,
                    pro_telefono,
                    pro_id_localidad,
                    pro_id_provincia,
                    pro_email)
                VALUES (
                    '{$pro_nombre_rsocial}',
                    '{$pro_id_tipo_doc}',
                    '{$pro_nro_doc}',
                    '{$pro_direccion}',
                    '{$pro_id_tipo_contrib}',
                    '{$pro_telefono}',
                    '{$pro_id_localidad}',
                    '{$pro_id_provincia}',
                    '{$pro_email}')";


    $insert_pro = $bd->query($sql_pro);
    if ( ! $insert_pro) {
        $msg = "Ocurrió un error al intentar guardar.";
    } else {
        $msg = "El registro fué completado con éxito.";
    }
    echo '<script>
            alert("' . $msg . '");
            location.href = "nuevo_proveedor.php";
        </script>';
    exit;
}


/*$sql_tdoc = "SELECT tdoc_id, tdoc_nombre FROM tipo_documentos";
$sql_tcon = "SELECT tcon_id, tcon_nombre FROM tipo_contibuyentes";
$sql_loc = "SELECT loc_id, loc_nombre FROM localidades";
$query_loc = $bd->query($sql_loc);
$query_prov = "SELECT prov_id, prov_nombre FROM provincias";*/
?>
<div id="contenido">
    <form id="" action="nuevo_proveedor.php" method="post">
        <h2>Nuevo Proveedor</h2>

        <label for="pro_nombre_rsocial">Nombre Proveedor:</label>
        <input name="pro_nombre_rsocial" id="pro_nombre_rsocial" type="text">
        <br><br>
        <label for="pro_id_tipo_doc">Tipo documento:</label>
        <input name="pro_id_tipo_doc" id="pro_id_tipo_doc" type="number">
        <br><br>
        <label for="pro_nro_doc">Doc./clave:</label>
        <input name="pro_nro_doc" id="pro_nro_doc" type="number">
        <br><br>
         <label for="pro_direccion">Direccion:</label>
        <input name="pro_direccion" id="pro_direccion" type="text">
        <br><br>
        <label for="pro_id_tipo_contrib">Tipo Contrib:</label>
        <input name="pro_id_tipo_contrib" id="pro_id_tipo_contrib" type="number">
        <br><br>
         <label for="pro_telefono">N° Telefono:</label>
        <input name="pro_telefono" id="pro_telefono" type="text">
        <br><br>
        <label for="pro_id_localidad">Localidad:</label>
        <input name="pro_id_localidad" id="pro_id_localidad" type="number">
        <br><br>
        <label for="pro_id_provincia">Provincia:</label>
        <input name="pro_id_provincia" id="pro_id_provincia" type="number">
        <br><br>
         <label for="pro_email">Email:</label>
        <input name="pro_email" id="pro_email" type="email">
        <br><br>
        <input type="submit" name="formulario" value="Enviar">
    </form>
</div>
<?php
include "piedepagina.php";
?>
