<?php
require 'config.php';

$lista =[];
$sql = $pdo->query("SELECT * FROM usuario");

if($sql->rowCount()>0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td>
                <a href="editar.php">[Editar]</a>
                <a href="excluir.php">[Excluir]</a>
            </td>
        </tr>
    <?php endforeach ?>
   
</table>


