<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag's meta do site -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="../css/carrinho.css" type="text/css">
    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS CSS da biblioteca para animação de entradas (do tipo fade) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Imagehover.css biblioteca para adicionar hover diferentes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/imagehover.css/2.0.0/css/imagehover.min.css" rel="stylesheet">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Ícone da Página -->
    <link rel="icon" type="image/png" href="../css/assets/favicon.png">
    <title>Pur4Vid4 Surfboards</title>
</head>
<body>
    <!-- Inicio do Codigo -->

    <!-- Cabeçalho com a barra de navegação do Site -->
    <header class="cabecalhoSite">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top navSite">
            <a class="navbar-brand" href="../index.html">Logo</a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarItens">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarItens">
                <ul class="navbar-nav ml-auto mr-auto">
                    <li class="nav-item efeito efeitoMudaBorda">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown efeito efeitoMudaBorda">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link efeito efeitoMudaBorda" href="#" data-toggle="dropdown" role="button">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="produto1.html">Product 1</a>
                            <a class="dropdown-item" href="#">Product 2</a>
                            <a class="dropdown-item" href="#">Product 3</a>
                            <a class="dropdown-item" href="#">Product 4</a>
                        </div>
                    </li>
                    <li class="nav-item efeito efeitoMudaBorda">
                        <a class="nav-link" href="contato.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="iconCart mr-lg-auto active"><a href="carrinho.php"><i class="fas fa-shopping-cart"></i></a></div>
        </nav>
    </header>
    <!-- Final cabeçalho -->

    <!-- Conteudo principal da pagina -->
    <main>
        <!-- Finalização da compra -->
        <section class="container">
            <?php session_start(); // inicia a sessão para guardar as informações do cliente ?>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h2>Checkout form</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                    </h4>
                    <?php
                        // inicia a conexão com o banco de dados
                        $conexao = new PDO("mysql:host=localhost;dbname=pur4vid4_produtos", "root", "");

                        // seleciona o a tabela de produtos no banco de dados e lista eles na variável "fetch"
                        $select = $conexao -> prepare("SELECT * FROM produtos");
                        $select -> execute();
                        $fetch = $select -> fetchAll();
                        // fim do bloco

                        // verifica se existe os "_POST" e adiciona o valor as variáveis, se não existir adiciona um valor vazio a elas
                        if (!isset($_POST['modeloPrancha'])) {
                            $modelo = "";
                        } else {
                            $modelo = $_POST['modeloPrancha'];
                        }

                        if (!isset($_POST['tamanhoPrancha'])) {
                            $tamanhoPrancha = "";
                        } else {
                            $tamanhoPrancha = $_POST['tamanhoPrancha'];
                        }
                        // fim do bloco

                        // variáveis para receber valores do modelo escolhido pelo cliente e o "id" deste modelo
                        $modeloCliente = "";
                        $idModelo = 0;
                        $valorTotalCarrinho = 0;

                        // verificação do modelo1 que o cliente escolheu
                        if ($modelo == "modelo1" && $tamanhoPrancha == "5'8") {

                            $modeloCliente = "modelo1 - 5'8";
                            if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 5'8") {
                                $modeloCliente .= " c/adição: addExtra1";
                            } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 5'8") {
                                $modeloCliente .= " c/adição: addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 5'8") {
                                $modeloCliente .= " c/adição: addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 5'8") {
                                $modeloCliente .= " c/adição: addExtra4";
                            } else {
                                $modeloCliente .= " s/adição";
                            }

                            if ($_POST['addExtra2'] == "addExtra2" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra2") {
                                $modeloCliente .= " - addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra3") {
                                $modeloCliente .= " - addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra4") {
                                $modeloCliente .= " - addExtra4";
                            }

                        } elseif ($modelo == "modelo1" && $tamanhoPrancha == "5'9") {

                            $modeloCliente = "modelo1 - 5'9";
                            if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 5'9") {
                                $modeloCliente .= " c/adição: addExtra1";
                            } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 5'9") {
                                $modeloCliente .= " c/adição: addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 5'9") {
                                $modeloCliente .= " c/adição: addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 5'9") {
                                $modeloCliente .= " c/adição: addExtra4";
                            } else {
                                $modeloCliente .= " s/adição";
                            }

                            if ($_POST['addExtra2'] == "addExtra2") {
                                $modeloCliente .= " - addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3") {
                                $modeloCliente .= " - addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4") {
                                $modeloCliente .= " - addExtra4";
                            }

                        } elseif ($modelo == "modelo1" && $tamanhoPrancha == "6'0") {

                            $modeloCliente = "modelo1 - 6'0";
                            if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 6'0") {
                                $modeloCliente .= " c/adição: addExtra1";
                            } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 6'0") {
                                $modeloCliente .= " c/adição: addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 6'0") {
                                $modeloCliente .= " c/adição: addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 6'0") {
                                $modeloCliente .= " c/adição: addExtra4";
                            } else {
                                $modeloCliente .= " s/adição";
                            }

                            if ($_POST['addExtra2'] == "addExtra2") {
                                $modeloCliente .= " - addExtra2";
                            } elseif ($_POST['addExtra3'] == "addExtra3") {
                                $modeloCliente .= " - addExtra3";
                            } elseif ($_POST['addExtra4'] == "addExtra4") {
                                $modeloCliente .= " - addExtra4";
                            }

                        }
                        // fim do bloco

                        // "foreach" usado para pecorrer a tabela do banco de dados e recuperar o "id" do modelo escolhido correspondente no mesmo
                        foreach ($fetch as $produtos) {
                            if ($produtos['nome'] == $modeloCliente) {
                                $idModelo = $produtos['id'];
                            }
                        }
                        // fim do bloco

                        // verifica se foi criado o "array" que irá armazenar as informações da sessão criada
                        if (!isset($_SESSION['itens'])) {
                            $_SESSION['itens'] = array();
                        }
                        // fim do bloco

                        // verifica se houve a adição do produto via formulário e verifica se já existe ou é uma nova solicitação
                        if (isset($_POST['add']) && $_POST['add'] == 'carrinho') {
                            if (!isset($_SESSION['itens'][$idModelo])) {
                                $_SESSION['itens'][$idModelo] = 1;
                            } else {
                                $_SESSION['itens'][$idModelo] += 1;
                            }
                        }
                        // fim do bloco

                        // verifica se o carrinho está vazio e se não estiver adiciona o produto a lista
                        if (count($_SESSION['itens']) == 0) {
                            echo 'Carrinho Vazio...';
                            $quantidade = 0;
                        } else {
                            foreach ($_SESSION['itens'] as $idModelo => $quantidade) {
                                $select = $conexao -> prepare("SELECT * FROM produtos WHERE id=?");
                                $select -> bindParam(1, $idModelo);
                                $select -> execute();
                                $exibeProdutos = $select -> fetchAll();

                                $valorTotalProduto = $exibeProdutos[0]['preco'] * $quantidade;
                                echo
                                    'Nome: '.$exibeProdutos[0]['nome'].'<br />
                                    Preço: '.number_format($exibeProdutos[0]['preco'], 2, ",", ".").'<br />
                                    Quantidade: '.$quantidade.'<br />
                                    <a href="../php/remover.php?remover=carrinho&id='.$idModelo.'">Remover</a>
                                    <hr />';

                                $valorTotalCarrinho += $valorTotalProduto;
                            }
                        }
                        // fim do bloco
                    ?>
                    <br />
                    <span class="badge badge-secondary badge-pill mb-2"><?php echo $quantidade.' Produtos - Total: '.'&euro; '.number_format($valorTotalCarrinho, 2, ",", "."); ?></span>
                    <form action="#" class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Customer Information</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block form-contact-button" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Final do container -->

        <!-- Secção para dividir as secções -->
        <section>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><a class="btn-creditos" href="https://www.flaticon.com/br/autores/xnimrodx" target="_blank"><img src="../css/assets/surf.png" width="32px" title="Icon made by xnimrodx from www.flaticon.com" /></a></div>
                <div class="divider-custom-line"></div>
            </div>
        </section>
        <!-- Final da secção para dividir as secções -->
    </main>
    <!-- Final do container -->

    <!-- Rodapé do Site contém informações da empresa, Redes Sociais e Contatos da Empresa... -->
    <footer class="rodapeSite">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="logo"><a href="#">LOGO</a></h2>
                </div>
                <div class="col-md-4">
                    <h5>Explore nossa empresa</h5>
                    <ul>
                        <li><a href="#">Sobre nós</a></li>
                        <li><a href="#">Informações legais</a></li>
                        <li><a href="#">Entre em contato</a></li>
                        <li><a href="#">Termos & Condições</a></li>
                        <li><a href="#">Políticas de privacidade</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="redesSociais">
                        <h5 class="text-uppercase">Siga nossas redes sociais:</h5>
                        <a href="#" class="youtube"><i class="fab fa-fw fa-youtube"></i></a>
                        <a href="#" class="facebook"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <a href="#">
                        <button type="button" class="btn btn-default">Contato</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="rodapecopyright">
            <p>Pur4vid4 Surfboards - © 2020 todos os direitos reservados</p>
        </div>

        <!-- Botão para realizar Scroll-To-Top -->
        <div>
            <a href="#" class="subir"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>
    <!-- Final do rodapé do Site -->

    <!-- Final do Codigo -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Icones Grátis da WEB (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- AOS script da biblioteca para animação de entradas (do tipo fade) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- script com as princiapais funções do JS do Site -->
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/AOS.js" type="text/javascript"></script>
    <script src="../js/holder.min.js" type="text/javascript"></script>
    <script src="../js/validacaoForm.js" type="text/javascript"></script>
</body>
</html>