<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>Checkout Mirror Fashion</title>

        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/open-iconic-bootstrap.css">

        <?php
/*Conectando banco de dados*/
            $compra = $_POST['id'];
            $conexao = mysqli_connect("127.0.0.1", "root", "123456", "wd43");
            $dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $compra");
            $produto = mysqli_fetch_array($dados);
        ?>
    </head>

    <body>
<!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarToggleExternalContent"><span class="navbar-toggler-icon"></span></button>
            <a class="navbar-brand" href="index.html">Mirror Fashion</a>

            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="sobre.html">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Ajuda</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Perguntas frequentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Entre em contato</a></li>
                </ul>
            </div>
        </nav>

        <!--Mensagem-->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Ótima Escolha</h1>
                <p class="lead">Obrigado por comprar na Mirror Fashion! Preencha seus dados para efetivar a compra.
                </p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lx-3">
                    <!--Card detalhes da compra-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h2>Sua Compra</h2>
                        </div>

                        <div class="card-body">
                            <img src="./img/produtos/foto<?= $produto['id'] ?>-<?= $_POST['cor'] ?>.png" alt="<?= $produto['nome'] ?>" 
                            class="img-thumbnail mb-3 d-none d-sm-block">
                            <dl>
                                <dt>Produto</dt>
                                <dd> <?= $produto['nome'] ?> </dd>

                                <dt>Cor</dt>
                                <dd> <?= $_POST['cor'] ?> </dd>

                                <dt>Tamanho</dt>
                                <dd> <?= $_POST['tamanho'] ?> </dd>

                                <dt>Preço</dt>
                                <dd id="preco"><?= $produto['preco'] ?> </dd>
                            </dl>
                        </div>
                    </div>

                    <!--Quantidade do item e valor total-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="qtd">Quantidade:</label>
                                <input type="number" id="qtd" min="1" max="99" value="1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="total">Total:</label>
                                <output for="qtd preco" id="total" class="form-control"><?= $produto['preco'] ?></output>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Formulario de compra-->
                <form class="col-md-8 col-lx-9">
                    <div class="row">
                        <!--Dados pessoais-->
                        <fieldset class="col-lg-6">
                        <legend>Dados Pessoais</legend>

                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" 
                                placeholder="email@exemplo.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" 
                            data-mask="999.999.999-99" required>
                        </div>
                        <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newsletter" value="sim" checked>
                            <label class="custom-control-label" for="newsletter">
                                Quero receber Newsletter da Mirror Fashion.</label>
                        </div>
                        </fieldset>
                        <!--Cartão de credito-->
                        <fieldset class="col-lg-6">
                        <legend>Cartão de Crédito</legend>

                        <div class="form-group">
                            <label for="numero-cartao">Número - CV</label>
                            <input type="text" class="form-control" id="numero-cartao" name="numero-cartao" 
                            placeholder="0000 0000 0000 0000 - 000" data-mask="9999 9999 9999 9999 - 999" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="bandeira-cartao">Bandeira</label>
                                </div>
                                <select class="custom-select" id="bandeira-cartao">
                                    <option disable selected>Selecione uma opção...</option>
                                    <option value="master">Mastercard</option>
                                    <option value="visa">Visa</option>
                                    <option value="amex">American Express</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validade-cartao">Validade</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text oi oi-calendar"></span>
                                </div>
                                <input type="month" class="form-control" id="validade-cartao" name="validade-cartao"
                                required>
                            </div>
                        </div>
                        </fieldset>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg"><span class="oi oi-thumb-up"></span> 
                        Confirmar Pedido</button>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <script type="text/jevescript" src="./js/inputmask-plugin.js"></script>

        <script type="text/javascript" src="./js/total.js"></script>
        
    </body>
</html>