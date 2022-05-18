<?php
require 'config.php';

// Ele vai pegar cada array e adicionar dentro da variavel
$lista =[];
// Os dados que vão apararecer na tela que vai ler os dados
$sql = $pdo->query("SELECT * FROM usuario");

// Verificar se tem algum usuario e se etiver mostrar ele na tela 
if($sql->rowCount()>0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a class="btn-add-user" href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <!-- Ele vai indicar para cada um das variaveis-->
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td>
                <a class="btn-edit" href="editar.php?id=<?php echo $usuario['id']; ?>">[Editar]</a>
                <a class="btn-delete" href="excluir.php?id=<?php echo $usuario['id']; ?>">[Excluir]</a>
            </td>
        </tr>
    <?php endforeach ?>
   
</table>


