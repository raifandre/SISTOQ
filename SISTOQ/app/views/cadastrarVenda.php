<?php
    include_once("../controllers/Produto_Controller.php");
    $produto = new Produto_Controller;
    $produtos = $produto->listar();
    $quant = count($produtos);
?>

<html lang="pt-br">
    <head>
    <title>SISTOQ</title>
    <link rel="shortcut icon" href="../../public/img/logo2.png" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../public/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- TOPO -->
        <div class="row">
            <div class="col-md-12">
                <a href="index.php"><img class="img-responsive text-center" id="logo" src="../../public/img/logo.png" alt="SISTOQ"></a>
            </div>
        </div><hr>
        <body>
            <!-- MENU -->
            <div class="container bg-verde-musgo">
                <div class="row">
                    <div class="col-12 row">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Produto
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="listarProdutos.php">Listar Produtos</a>
                                      <a class="dropdown-item" href="cadastrarProduto.php">Cadastrar Produto</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Categoria
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="listarCategorias.php">Listar Categorias</a>
                                      <a class="dropdown-item" href="cadastrarCategoria.php">Cadastrar Categoria</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Vendas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="listarVendas.php">Listar Vendas</a>
                                      <a class="dropdown-item" href="cadastrarVenda.php">Cadastrar Venda</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><br>

            <!-- CONTEUDO -->
            <div class="container">
                <form id="cadastrarVenda" enctype="multipart/form-data" method="post" role="cadastrarVenda" onsubmit="return false;" accept-charset="utf-8">
                    <input type="hidden" name="cadastrarVenda" id="cadastrarVenda" />
                    <h3 class="text-center">Cadastrar Venda</h3><br>
                    <div class="row">
                        <div class="col-md-12 row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Produto <i id="obrigatorio">*</i>:</label></b>
                                    <select class="form-control" id="produto" name="produto" required>
                                        <option value="0">Selecione um Produto</option>
                                        <?php for ($i=0; $i < $quant; $i++) { ?>
                                            <option value="<?php echo $produtos[$i]->nome?>"><?php echo $produtos[$i]->nome ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b><label>Quantidade <i id="obrigatorio">*</i>:</label></b>
                                    <input class="form-control" type="number" id="quantidade" name="quantidade" placeholder="Quantidade de Produto" min="0" max="3" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <b><i>Os campos com <i id="obrigatorio">* </i>são obrigatorios.</i></b>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <a href="index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                    <button type="submit" onclick="cadastrar()" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </form>
            </div>

            <!-- RODAPE -->
            <div class="text-center">
                <br><b><p><i>SISTOQ - Sistema de Gerenciamento de Estoque</i></p></b>
                <b><p><i>2019 - Todos direitos reservados</i></p></b>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../../public/js/jquery.js"></script>
            <script src="../../public/js/jquery.mask.js"></script>
        </body>
    </head>
</html>
<script>
    function cadastrar() {
        if($('#produto').val() == '' || $('#quantidade').val() == ''){

            alert('Preencha os campos obrigatorios.')
            return false;

        } else {
            var dados = $('#cadastrarVenda').serialize();
            $.ajax({
                //Envia os valores para action
                url: '../actions/cadastrarVenda.php',
                type: 'post',
                dataType: 'html',
                data: dados,
                success: function(result){
                    if(result == 'Cadastro realizado com sucesso.'){
                        alert(result);
                        setTimeout("document.location = './cadastrarVenda.php'", 1000);
                    } else {
                        alert("Falha ao cadastrar Produto.");
                    }
                }
            });

        }

    }

</script>
