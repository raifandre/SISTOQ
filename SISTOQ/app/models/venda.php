<?php
include_once(__DIR__."../../models/Model.php");

  class venda extends Model {
    // propriedades da classe objeto
    public $id;
    public $produto;
    public $quantidade;

   	public function __construct() {
        $this->open();
    }

    public function cadastrar(){


        $this->conn->beginTransaction();

        $cadastrar = $this->conn->query("INSERT INTO venda (produto, quantidade)
            VALUES ('$this->produto', '$this->quantidade')");

        if($cadastrar){

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function alterar() {
        $this->conn->beginTransaction();

        $alterar = $this->conn->query("UPDATE venda SET produto = '$this->produto', quantidade = '$this->quantidade' WHERE id = '$this->id'");


        if($alterar) {

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function deletar($id) {

        $sql = "DELETE FROM venda WHERE id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $resultado = $stmt->execute();
        return $resultado;

    }

    public function buscarId($id) {
        $sql = "SELECT * FROM venda WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function listar() {
        $sql = "SELECT * FROM venda";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

};