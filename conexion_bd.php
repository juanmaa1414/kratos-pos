<?php
$bd = new mysqli($_bd_host, $_bd_user, $_bd_pass, $_bd_name);
if ($bd->connect_error) {
    echo "Error: Fallo al conectarse a MySQL.<br>";
    echo "Err Nro:" . $bd->connect_errno . "<br>";
    echo "Error: " . $bd->connect_error . "<br>";
    exit;
}

$bd->set_charset("utf8");
