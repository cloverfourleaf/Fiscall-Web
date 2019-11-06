<?php 
$quebra = "\n";
$emailsender = "empresa@cloverprojetos.cf";
$nomeremetente = "Fiscall";
$emaildestinatario = $_POST['emailFuncionario'];
$loginFuncionario = $_POST ['loginFuncionario'];
$assunto = "Criação de Conta";
$mensagem = "tenha um ótimo dia.";
$mensagemHTML = '<p>Bem vindo ao Fiscall!</p>
        <p>Utilize o usuário e a sua senha para acessar o sistema.</p>
        <br>'.$mensagem.'<br>
    <hr>';
$headers = "MIME-Version: 1.1".$quebra;
$headers .= "Content-type: text/html; meta charset = 'utf-8'".$quebra;
$headers .= "From:".$emailsender.$quebra;
$headers .= "Return-Path: ".$emailsender.$quebra;

$envio = mail ($emaildestinatario, $assunto, $mensagemHTML, $headers, $emailsender);

if ($envio) {
echo "mensagem enviada INFERNO";
}
else {
echo "erro";
}
?>
