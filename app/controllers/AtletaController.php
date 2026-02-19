<?php
require_once __DIR__ . '/../models/Atleta.php';

class AtletaController {

    private $atleta;
    private $conn; // ← ADICIONE ISSO

    public function __construct($conn) {
        $this->conn = $conn; // ← ADICIONE ISSO
        $this->atleta = new Atleta($conn);
    }


    public function criar($nome, $idade, $esporte, $telefone, $email) {
    $this->atleta->criar($nome, $idade, $esporte, $telefone, $email);
    header("Location: /AtletaConnect/index.php");
    exit;
    }   

    public function listar($busca = null)
{
    if (!empty($busca)) {

        $sql = "SELECT * FROM atletas
                WHERE nome LIKE :busca
                OR esporte LIKE :busca
                OR CAST(idade AS CHAR) LIKE :busca";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':busca' => "%$busca%"
        ]);

    } else {

        $sql = "SELECT * FROM atletas";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function editar($id) {
        return $this->atleta->buscarPorId($id); 
    }

    public function atualizar($id, $nome, $idade, $esporte, $telefone, $email) {
    $this->atleta->atualizar($id, $nome, $idade, $esporte, $telefone, $email);
    header("Location: ../../index.php" );
    exit;
    }

    public function excluir($id) {
        $this->atleta->excluir($id);
        header("Location: /AtletaConnect/index.php");
    }
}
?>
