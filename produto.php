        <?php 
/*Conectando banco de dados*/
            $conexao = mysqli_connect("127.0.0.1", "root", "123456", "wd43");
            $dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $_GET[id]");
            $produto = mysqli_fetch_array($dados);
/*Conteudo do cabeçalho*/
            $cabecalho_title = "Produto - Mirror Fashion";
            $cabecalho_css = '<link rel="stylesheet" href="./css/produto.css">';
            include("cabecalho.php"); 
        ?>

        <!--corpo do site-->
        <div class="produto-back">
            <div class="container">
                <div class="produto">
                    <h1> <?= $produto['nome'] ?> </h1>
                    <p>Por apenas R$ <?= $produto['preco'] ?> </p>

                    <form action="checkout.php" method="POST">

                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        
                        <!--Selecao Cor do produto-->
                        <fieldset class="cores">
                            <legend>Escolha a cor:</legend>

                            <input type="radio" name="cor" value="verde" id="verde" checked>
                            <label for="verde"><img src="./img/produtos/foto<?= $produto['id']?>-verde.png" alt="produto na cor verde"></label>

                            <input type="radio" name="cor" value="rosa" id="rosa">
                            <label for="rosa"><img src="./img/produtos/foto<?= $produto['id']?>-rosa.png" alt="produto na cor rosa"></label>

                            <input type="radio" name="cor" value="azul" id="azul">
                            <label for="azul"><img src="./img/produtos/foto<?= $produto['id']?>-azul.png" alt="produto na cor azul"></label>
                        </fieldset>
                        <!--Selecao Tamanho do produto-->
                        <fieldset class="tamanho">
                            <legend>Escolha o Tamanho:</legend>

                            <input type="range" min="36" max="46" value="40" step="2" name="tamanho" id="tamanho">
                            <output for="tamanho" name="valortamanho">40</output>
                            
                        </fieldset>

                        <button class="comprar">Comprar</button>

                    </form>
                </div>

                <!--Detalhes do produto-->
                <div class="detalhe">
                    <h2>Detalhes do produto</h2>
                    <p> <?= $produto['descricao'] ?> </p>
                
                    <table>
                        <thead>
                            <tr>
                                <th>Característica</th>
                                <th>Detalhe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Modelo</td>
                                <td>Cardigã 7845</td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>Algodão e Poliester</td>
                            </tr>
                            <tr>
                                <td>Cores</td>
                                <td>Azul, Rosa e Verde</td>
                            </tr>
                            <tr>
                                <td>Lavagem</td>
                                <td>Lavar a mão</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--conteudo rodape-->
        <footer>
            <div class="container">
                <img src="./img/logo-rodape.png" alt="Logo da Mirror Fashion">

                <ul class="social">
                    <li><a href="facebook.com">Facebook</a></li>
                    <li><a href="twitter.com">Twitter</a></li>
                    <li><a href="plus.google.com">Google+</a></li>
                </ul>
            </div>
        </footer>

        <script type="text/javascript" src="./js/produto.js"></script>
        
    </body>
</html>