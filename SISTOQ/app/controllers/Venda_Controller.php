<?php
    include_once ('Controller.php');
    include_once (__DIR__.'../../models/venda.php');

class Venda_Controller extends Controller{

    private $venda;

    public function __construct() {
        parent::__construct();
        $this->venda = new venda;
    }

    public function cadastrar() {

      $this->venda->produto($this->input->get('produto'))
                    ->quantidade($this->input->get('quantidade'));

      $resultado = $this->venda->cadastrar();

      if($resultado) {
        echo ('Cadastro realizado com sucesso.');
        return true;
      } else {
        echo ('Ocorreu um erro durante o cadastro, tente novamente mais tarde.');
        return false;
      }
    }

    public function alterar() {

        $this->venda->id($this->input->get('alterarVenda'))
                      ->produto($this->input->get('produto'))
                      ->quantidade($this->input->get('quantidade'));

        $resultado = $this->venda->alterar();

        if($resultado) {
          echo ('Dados alterado com sucesso.');
          return true;
        } else {
          echo ('Ocorreu um erro, tente novamente mais tarde.');
          return false;
        }
    }

    public function buscarId($id) {

        return $this->venda->buscarId($id);

    }

    public function listar() {

        return $this->venda->listar();

    }

    public function deletar($id) {

        try {
          $resultado = $this->venda->deletar($id);
        } catch(Exception $e) {
          echo $e->getMessage();
        }

        if($resultado) {
            header('Location: ../views/listarVendas.php');
        }

    }

}