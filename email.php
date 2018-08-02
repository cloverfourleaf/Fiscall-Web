<?php 
/*
$quebra = "\n";
$emailsender = "empresa@cloverprojetos.cf";
$nomeremetente = "Fiscall";
//$emaildestinatario = $_POST['emailFuncionario'];
//$loginFuncionario = $_POST ['loginFuncionario'];

$emaildestinatario = "cloverprojetos@gmail.com";
$assunto = "Criação de Conta";
$mensagem = "tenha um ótimo dia.";

$mensagemHTML = '<p> Bem vindo ao Fiscall!</p>
        <p>Utilize o usuário e a sua senha para acessar o sistema.</p>
        <br>'.$mensagem.'<br>
    <hr>';
*/

$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\n";

$headers .= "From: gabrielmartins373@gmail.com\n";

$headers .= "Return-Path: gabrielmartins373@gmail.com";
//$headers .= "Reply-To: ".$emailsender.$quebra;

mail ("cloverprojetos@gmail.com","testando","e ai", $headers)
OR die ("falha ao enviar");
echo "mensagem enviada INFERNO";
?>
