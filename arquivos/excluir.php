
<?php
require 'config.php';


// Puxamos o ID para verificar se está registrado 
$id = filter_input(INPUT_GET, 'id');

// Vamos fazer uma verificação para essar os dados e ver o ID 
// Se tem esse ID...
if($id) {
    // Ele exclui pelo ID
    // Delete na tabela usuarios que tiver o ID 
    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

   
} 

// Dando errado ou dando certo ele vai voltar para o index mesmo se achar o ID
header("Location: index.php");
exit;

?>

