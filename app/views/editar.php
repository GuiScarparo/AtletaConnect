<?php
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT'] . "/AtletaConnect/");

require_once BASE_PATH . "app/controllers/AtletaController.php";
require_once BASE_PATH . "app/config/conexao.php";


if ($_POST) {
    $controller = new AtletaController($conn);
    $controller->atualizar($_POST['id'], $_POST['nome'], $_POST['idade'], $_POST['esporte'], $_POST['telefone'], $_POST['email'] );
}
if (isset($_GET['id'])) {
$controller = new AtletaController($conn);
$atleta = $controller->editar($_GET['id']);
}
?>

<h2>Editar Atleta</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $atleta['id'] ?>">
    Nome: <input type="text" name="nome" value="<?= $atleta['nome'] ?>" required><br>
    Idade: <input type="number" name="idade" value="<?= $atleta['idade'] ?>" required><br>
    Esporte: <input type="text" name="esporte" value="<?= $atleta['esporte'] ?>" required><br>
    Telefone:<input type="text" name="telefone" value="<?= $atleta['telefone'] ?>"require><br>
    e-mail:<input type="email" name="email" value="<?= $atleta['email'] ?>"require><br>

    <button type="submit">Atualizar</button>
</form>




