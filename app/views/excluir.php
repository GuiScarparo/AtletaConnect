<?php
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT'] . "/AtletaConnect/");

require_once BASE_PATH . "app/config/conexao.php";
require_once BASE_PATH . "app/controllers/AtletaController.php";

$controller = new AtletaController($conn);

if (isset($_GET['id'])) {
    $controller->excluir($_GET['id']);
}
?>
