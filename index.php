<?php
define("BASE_URL", "/AtletaConnect/");

require_once "app/config/conexao.php";
require_once "app/controllers/AtletaController.php";

$controller = new AtletaController($conn);
$busca = isset($_GET['busca']) ? $_GET['busca'] : null;
$atletas = $controller->listar($busca);


?>

<h2>Lista de Atletas</h2>

<form method="GET" action="">
    <input type="text" name="busca"
        value="<?= isset($_GET['busca']) ? $_GET['busca'] : '' ?>"
        placeholder="Buscar por nome, idade ou esporte">
    <button type="submit">Pesquisar</button>
</form>

<br>

<a href="<?= BASE_URL ?>app/views/criar.php">Cadastrar Novo Atleta</a>


<table border="1">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Esporte</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach($atletas as $a): ?>
    <tr>
        <td><?= $a['nome'] ?></td>
        <td><?= $a['idade'] ?></td>
        <td><?= $a['esporte'] ?></td>
        <td><?= $a['telefone'] ?></td>
        <td><?= $a['email'] ?></td>
        <td>
            <a href="<?= BASE_URL ?>app/views/editar.php?id=<?= $a['id'] ?>">Editar</a>
            <a href="<?= BASE_URL ?>app/views/excluir.php?id=<?= $a['id'] ?>">Excluir</a>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
