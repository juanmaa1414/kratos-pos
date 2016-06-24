<?php

// "localhost/posible carpeta"
$worktree = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

// Redirigir.
header("Location: http://" . $worktree . "home.php");

// Fin del script.
