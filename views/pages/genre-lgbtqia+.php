<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourth Cover</title>
    <link type="text/css" rel="stylesheet" href="../../css/structure.css">
    <link type="text/css" rel="stylesheet" href="../../css/genre.css">
    <script language="javascript" src="../../js/search.js"></script>
    <script language="javascript" src="../../js/books.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header id="header">
    <nav class="navbar-color center fixed-top">
            <a href="../../index.php">
                <img src="../../images/structure-logo_header.png" alt="logo-site" class="logo">
                <span>Fourth Cover</span>
            </a>
        <div class="dropdown drop-nav pl-3 nav-links titles">
            <a class="btn dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                  
                  
                  if (isset($_SESSION['usuario_logado'])) {
                      $conexao = new PDO("sqlite:../../models/sqlite/banco_de_dados.sqlite");
                      $query = "SELECT username FROM User WHERE id = :id";
                  
                      $stmt = $conexao->prepare($query);
                      $stmt->bindParam(":id", $_SESSION['usuario_logado']);
                      $stmt->execute();
                  
                      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                  
                      if ($resultado) {
                          $nomeCompleto = $resultado['username'];
                  
                          echo $nomeCompleto;
                      } 
                  } 
                ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item drop" href="../profile.php">Perfil</a>
                <a class="dropdown-item drop" href="../logout.php">Logout</a>
            </div>
        </div>
        <div class="nav-links titles">
            <a href="genre-romance.php">Romance</a>
            <a href="genre-ficção.php">Ficção</a>
            <a href="genre-lgbtqia+.php">LGBTQIA+</a>
            <a href="genre-suspense.php">Suspense</a>
            <a href="genre-drama.php">Drama</a>
            <a href="genre-guerra.php">Guerra</a>
        </div>
    </nav>
</header>
    <hr class="division">
    <section class="container">
        <h4 class="tittle">LGBTQIA+</h4>
        <hr class="division">
        <div class="row book">
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Home/home-brazil-encontro.jpg" style="width:100%" alt="">
                <p class="line-sm-2 line-md-1 line-md2-2 line-lg-2">Enquanto Eu Não Te Encontro</p>
                <form action="../../views/book.php" method="get">
                    <button value="EENTE"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
                <!-- no value fica as iniciais do livro-->
            </div>
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Genre/genre-lgbt-garota.jpg" style="width:100%" alt="">
                <p class="line-sm-1 line-md-1 line-md2-2 line-lg-2">Garota, Mulher, Outras</p>
                <form action="../../views/book.php" method="get">
                    <button value="GMO"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
                <!-- no value fica as iniciais do livro-->
                <!-- class line fica nos titulos q ficam 1 linha na tela de comp-->
            </div>
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Genre/genre-lgbt-gostaria.jpg" style="width:100%" alt="">
                <p class="line-sm-2 line-md-1 line-md2-3 line-lg-2">Gostaria que Você Estivesse Aqui</p>
                <form action="../../views/book.php" method="get">
                    <button value="GQVEA"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
                <!-- no value fica as iniciais do livro-->
            </div>
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Home/home-acclaimed-two.jpg" style="width:100%" alt="">
                <p class="line-sm-1 line-md-1 line-md2-2 line-lg-2">Os Dois Morrem No Final</p>
                <form action="../../views/book.php" method="get">
                    <button value="ODMNF"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
                <!-- no value fica as iniciais do livro-->
            </div>
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Home/home-acclaimed-evelyn.jpg" style="width:100%" alt="">
                <p class="line-sm-2 line-md-1 line-md2-2 line-lg-2">Os Sete Maridos de Evelyn Hugo</p>
                <form action="../../views/book.php" method="get">
                    <button value="OSMDEH"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
            </div>
            <div class="col-6 col-lg-2">
                <img  class="img-responsive img-thumbnail" src="../../images/Home/home-brazil-ex.jpg" style="width:100%" alt="">
                <p class="line-sm-1 line-md-1 line-md2-1 line-lg-1">Querido Ex</p>
                <form action="../../views/book.php" method="get">
                    <button value="QE"  id="input" name="input" type="submit" class="btn btn-outline-info color font-weight-bold btn-block">+</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <a href="#header"><img src="../../images/structure-logo_footer.png" class="logo-footer" alt="logo"></a>
        <div class="text row">
            <div class="contact col-10 col-md-6">
                <h4>Contatos</h4>
                <p>telefones:</p>
                <ul>
                    <li>(11) 9990-9990</li>
                    <li>(11) 9990-8890</li>
                </ul>
                <p>e-mail:</p>
                <ul>
                    <li>fourth.cover@gmail.com</li>
                </ul>
                <a class="form" href="../forms.php">Formulário</a>
            </div>
            <div class="business-partner col-10 col-md-6">
                <h4>Parceiros</h4>
                <ul>
                    <li><a target="_blank" href="https://www.amazon.com.br/"><img alt="amazon logo" class="amazon-logo"src="../../images/Book/book-amazon.png"></a></li>
                    <li><a target="_blank" href="https://www.saraiva.com.br/"><img alt="saraiva logo" class="saraiva-logo"src="../../images/Book/book-saraiva.png"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-ele">
            <div class="row">
                <div class="col-6">
                    <p>powered by</p>
                </div>
                <div class="col-6">
                    <img class="logo-comp" src="../../images/footer-company.png" alt="company logo">
                </div>
            </div>
            
            <p>Fourth Cover  |  todos os direitos reservados a &copyTGCompany  |  Avenida Paulista, 1439 - Bela Vista, São Paulo - SP</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>