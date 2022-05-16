<?php 
require 'config.php';

// Aqui selecionamos as variaveis que vou acessar 
$name = filter_input(INPUT_GET, 'name');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);


// A verificação para ver se o nome e o email foi infomarmado e se estão corretos 
// Para inserir um novo usuario fazemos o seguinte
if($name && $email){

    // Vou chamar a variável $sql e transformar os valores que está na variável $name e $email
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES(:name, :email)");
    $sql->bindValue(':name', $name);
     $sql->bindParam(':email', $email);
    // Isso ira executar o banco para inserir 
    $sql->execute();
    
    // Quando adicionar alguem eu volto para meu arquivo(index seria o arquivo).
    // FAZENDO ISSO SERIA TUDO UMA INSERÇÃO DE DADOS  
    header("Location: index.php");
    exit;

} 
// Caso contrario precisamos voltar para a minha pagina de adicionar e digitamos novamente os campos informados
else {
    header("Location: adicionar.php");
    exit;
}