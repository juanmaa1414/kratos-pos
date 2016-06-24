<?php
include "parte-superior.php";
?>

<div id="contenido">
    <form id="" action="" method="post">
        <h2>
        Nuevo Producto
        </h2>
        <p>Nombre:
          <input name="descripcion" type="text" value="" maxlength="40">
        </p>
        <br>
        <input type="submit" name="enviar" value="Enviar">
        <br>
        <?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>back</a>";
?>

    </form>
</div>
<?php
include "piedepagina.php";
?>
