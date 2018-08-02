<?php
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1 \n";
$headers .= "From: empresa@cloverprojetos.cf\n";
$headers .= "Return-Path: empresa@cloverprojetos.cf\n";
mail ("cloverprojetos@gmail.com","testando","e ai",$headers)
OR die ("falha ao enviar");
echo "mensagem enviada INFERNO";
?>