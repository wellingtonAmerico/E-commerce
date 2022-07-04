/*
 * Site produzido durante	o	curso Desenvolvimento Web com HTML, CSS e JavaScript da Caelum	
 * para	um	e-commerce	de	moda	chamado	Mirror	Fashion com os	conteúdos	e	o	design	
 * da	loja	já	pré-definidos.
 * Será construido	várias	páginas	da	loja	com	intuito	de	aprender	os	conceitos	de	
 * HTML,	CSS	e	JS focando	na	implementação do prjeto,	papel do	programador	front-end.
 */

/**
 * @version 1.0
 * @autor Wellington Américo - Caelum Cursos
 */

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
                        $conexao = mysqli_connect("127.0.0.1", "root", "123456", "wd43");
                        $dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY data DESC LIMIT 0, 12");

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

            <!--Painel Mais vendidos-->
            <section class="painel mais-vendidos">
                <h2>Mais Vendidos</h2>
                <ol>
                    <?php
                        $conexao = mysqli_connect("127.0.0.1", "root", "123456", "wd43");
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