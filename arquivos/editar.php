<?php
require 'config.php';

$info = [];
// Puxamos o ID para verificar se ele está no banco
$id = filter_input(INPUT_GET, 'id');

// Vai fazer uam verificação se foi enviado algum dado
// como vamos mandar dados precisamo usar o prepare()
if($id) {
   
    // Essa query vai procurar o ID
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    // Agora vamos substiruir os dados
    $sql->bindValue(':id', $id);
    $sql->execute();

    // Se ele achou algum registro no banco
    if($sql->rowCount() > 0){
        // Caso tenha achado, preenche as informações dos usuarios 
        $info = $sql->fetch(PDO::FETCH_ASSOC);

    }
    // Caso contrario como não tem dado para exibir volto para o meu index
    else{
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>

<h1>Editar Usuario</h1>

<form method="GET" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$info['id']?>" />
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['nome']?>" />
    </label><br/><br/>
    
    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$info['email']?>" />
    </label><br/><br/>

    <input type="submit" value="Editar" />
</form>

