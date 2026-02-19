<?php

class Atleta {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ✅ CRIAR
    public function criar($nome, $idade, $esporte, $telefone, $email) {

        $sql = "INSERT INTO atletas 
                (nome, idade, esporte, telefone, email) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nome,
            $idade,
            $esporte,
            $telefone,
            $email
        ]);
    }
    public function listar() {

        $sql = "SELECT * FROM atletas";
        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {

        $sql = "SELECT * FROM atletas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $idade, $esporte, $telefone, $email) {

        $sql = "UPDATE atletas 
                SET nome=?, 
                    idade=?, 
                    esporte=?, 
                    telefone=?, 
                    email=? 
                WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nome,
            $idade,
            $esporte,
            $telefone,
            $email,
            $id
        ]);
    }


    public function excluir($id) {

        $sql = "DELETE FROM atletas WHERE id=?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}
?>
