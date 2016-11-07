<?php
// Importamos las configuraciones.
include "config.php";
include "conexion_bd.php";
?>

<?php

$query="SELECT fam_nombre FROM familia_articulos
                VALUES 
                    fam_nombre";

$resultado=$mysqli->query($sql_fam);

$row=$resultado->fetch_assoc();

?>


<html>
<head>
	<title>usuarios</title>
</head>
<body>
     
     <center><h1>modificar usuario</h1></center>

     <form name="modificar_usuario" method="POST" action="mod_usuario.php">

     <table width="50%">
     <tr>
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <td width="20"><b>usuario</b></td>
       <td width="30"><input type="text" name="usuario" size="25" value="<?php echo $row['usuario'];?>"/>
       </td>
     </tr>
     <tr>
       <td colspan="2"><center><input type="submit" name="guardar" value="guardar"/></center></td>
     </table>

 

</body>
</html>