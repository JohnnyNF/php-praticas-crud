<?php 
require 'config.php';

// Aqui selecionamos as variaveis que vou acessar 
$name = filter_input(INPUT_GET, 'name');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);


// A verificação para ver se o nome e o email foi infomarmado e se estão corretos 
// Caso contrario precisamos voltar para a minha pagina de adicionar e digitamos novamente os campos informados
// Para inserir um novo usuario fazemos o seguinte
if($name && $email){


} 
else {
    header("Location: adicionar.php");
    exit;
}