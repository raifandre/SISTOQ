<?php
    include_once("../controllers/Venda_Controller.php");
    $id = $_GET['id'];
    $venda = new Venda_Controller;
    $deletar = $venda->deletar($id);
?>