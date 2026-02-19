<?php
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT'] . "/AtletaConnect/");

require_once BASE_PATH . "/app/controllers/AtletaController.php";

if ($_POST) {
    require_once BASE_PATH . "app/config/conexao.php";
    $controller = new AtletaController($conn);
    $controller->criar($_POST['nome'], $_POST['idade'], $_POST['esporte'], $_POST['telefone'], $_POST['email']);
}
?>

<h2>Cadastrar Atleta</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Idade: <input type="number" name="idade" required><br>
    Esporte: <input type="text" name="esporte" required><br>
    Telefone: <input type="text" name="telefone" require><br>
    e-mail: <input type="email" name="email" require><br>
    <button type="submit">Salvar</button>
</form>
