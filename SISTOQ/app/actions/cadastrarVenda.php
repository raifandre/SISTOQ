<?php
if (isset($_POST ["cadastrarVenda"])){

  include_once("../controllers/Venda_Controller.php");
  $venda = new Venda_Controller;
  $venda->cadastrar();

}