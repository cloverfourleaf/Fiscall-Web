<?php
   session_start();

   if (!isset($_SESSION['loginUsuario']) && !isset($_SESSION['senhaUsuario'])){
     header("Location:../../../../index.html");
   }  


?>