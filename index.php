<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<!--Conteudo do cabeçalho-->
        <?php 
            $cabecalho_title = "Mirror Fashion";
            include("cabecalho.php"); 
        ?>

<!--Conteudo principal-->
        <div id="main">
            <div class="container destaque">

                <!--Busca-->
                <section class="busca">
                    <h2>Busca</h2>

                    <form>
                        <input type="search">
                        <button>Buscar</button>
                    </form>
                </section>
                
                <!--Menu departamentos-->
                <section class="menu-departamento">
                    <h2>Departamentos</h2>
                    <nav>
                        <ul>
                            <li><a href="">Blusas e Camisas</a>
                            <ul>
                                <li><a href="">Manga Curta</a></li>
                                <li><a href="">Manga Comprida</a></li>
                                <li><a href="">Camisa Social</a></li>
                                <li><a href="">Camisa Casual</a></li>
                            </ul></li>
                            <li><a href="">Calças</a></li>
                            <li><a href="">Saias</a></li>
                            <li><a href="">Vestidos</a></li>
                            <li><a href="">Sapatos</a></li>
                            <li><a href="">Bolsas e Carteiras</a></li>
                            <li><a href="">Acessórios</a></li>
                        </ul>
                    </nav>
                </section>

                <!--Banner Destaque-->
                <section class="banner-destaque">
                    <figure>
                        <img src="./img/destaque-home.png" alt="Promoção: Big City Night">
                    </figure>
                </section>
            </div>
        </div>

        <!--conteudo paineis-->
        <div class="container paineis">
            <!--Painel Novidades-->
            <section class="painel novidades">
                <h2>Novidades</h2>
                <ol>

                    <?php
                        $host = getenv('MYSQLHOST') ?: 'db';
                        #$port = getenv('MYSQLPORT') ?: '3306';
                        $port = (int)(getenv('MYSQLPORT') ?: 3306);
                        $user = getenv('MYSQLUSER') ?: 'ecommerce';
                        $pass = getenv('MYSQLPASSWORD') ?: 'ecommerce123';
                        $db   = getenv('MYSQLDATABASE') ?: 'ecommerce';

                        $conexao = mysqli_connect($host, $user, $pass, $db, $port);

                        if (!$conexao) {
                            die('Erro na conexão: ' . mysqli_connect_error());
                        }

                        $dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY data DESC LIMIT 0, 12");

                        if (!$dados) {
                            die('Erro na query: ' . mysqli_error($conexao));
                        }

                        #while ($produto = mysqli_fetch_array($dados)):
                    ?>

                    <li>
                        <a href="produto.php?id=<?= $produto['id'] ?>">
                            <figure>
                                <img src="img/produtos/miniatura<?= $produto['id'] ?>.png"
                                    alt="<?= $produto['nome'] ?>">
                                <figcaption><?= $produto['nome'] ?> por <?= $produto['preco'] ?></figcaption>
                            </figure>
                        </a>
                    </li>

                    <?php
                        endwhile;
                    ?>
                </ol>

                <button type="button">Mostrar mais</button>
            </section>

            <!--Painel Mais vendidos-->
            <section class="painel mais-vendidos">
                <h2>Mais Vendidos</h2>
                <ol>
                    <?php
                        $conexao = mysqli_connect("db", "ecommerce", "ecommerce123", "ecommerce");
                        $dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY vendas ASC LIMIT 0, 12");

                        while ($produto = mysqli_fetch_array($dados)):
                    ?>

                    <li>
                        <a href="produto.php?id=<?= $produto['id'] ?>">
                            <figure>
                                <img src="img/produtos/miniatura<?= $produto['id'] ?>.png"
                                    alt="<?= $produto['nome'] ?>">
                                <figcaption><?= $produto['nome'] ?> por <?= $produto['preco'] ?></figcaption>
                            </figure>
                        </a>
                    </li>

                    <?php
                        endwhile;
                    ?>
                </ol>

                <button type="button">Mostrar mais</button>
            </section>
        </div>

<!--conteudo rodape-->
        <?php include("rodape.php"); ?>		

        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/home.js"></script>
        <script type="text/javascript" src="./js/banner.js"></script>

    </body> 
</html> 