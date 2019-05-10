<?php
	include_once("../controllers/Venda_Controller.php");
	$venda = new Venda_Controller;

	if (isset ($_POST ["alterarVenda"])){
	    $venda->alterar();
	}