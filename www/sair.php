<?php
header("Location: index.html");
session_start();
unset($_SESSION['codUsuario']);
unset($_SESSION['nomeUsuario']);
unset($_SESSION['loginUsuario']);
unset($_SESSION['senhaUsuario']);
session_destroy();
?>
