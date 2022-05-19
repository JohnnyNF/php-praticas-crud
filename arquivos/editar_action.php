<?php 
require 'config.php';

// Aqui selecionamos as variaveis que vou acessar 
$id = filter_input(INPUT_GET, 'id');
$name = filter_input(INPUT_GET, 'name');
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);


if($id && $name && $email){
    // Defina na tabela usuarios e defina os itens
    // Para atulizar o nome e o email NUNCA ATUALIZAR O "ID"
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();
    
    // Agora retornamos o para o index depois que foi atulizados as infomarções 
    header("Location: index.php");
    exit;

}

else {
    header("Location: adicionar.php");
    exit;
}
