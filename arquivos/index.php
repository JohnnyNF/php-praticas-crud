<?php
require 'config.php';

// Ele vai pegar cada array e adicionar dentro da variavel
$lista = [];
// Os dados que vão apararecer na tela que vai ler os dados
$sql = $pdo->query("SELECT * FROM usuarios");

// Verificar se tem algum usuario e se etiver mostrar ele na tela 
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="/php-praticas-crud/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <h2>Cadastro</h2>

    <a class="btn-add-user" href="adicionar.html">ADICIONAR USUARIO</a>

    <table border="1" width="99.5%">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
        <!-- Ele vai indicar para cada um das variaveis-->
        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email'] ?></td>
                <td>
                    <a class="btn-edit" href="editar.php?id=<?php echo $usuario['id']; ?>"> <i class="fa fa-pencil fa-spin" aria-hidden="true"></i> Editar</a>
                    <a class="btn-delete" href="excluir.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja ecluir?')"> <i class="fa fa-pencil" aria-hidden="true"></i> Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</body>

</html>