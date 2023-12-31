<?php
session_start();

// Verificar se o usuário está logado
if(!isset($_SESSION['usuario_logado'])) {
    header("Location: views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourth Cover</title>
    <link type="text/css" rel="stylesheet" href="../css/structure.css">
    <link type="text/css" rel="stylesheet" href="../css/book.css">
    <script language="javascript" src="../js/search.js"></script>
    <script language="javascript" src="../js/books.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header id="header">
    <nav class="navbar-color center fixed-top">
            <a href="../index.php">
                <img src="../images/structure-logo_header.png" alt="logo-site" class="logo">
                <span>Fourth Cover</span>
            </a>
        <div class="dropdown drop-nav pl-3 nav-links titles">
            <a class="btn dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                  
                  
                  if (isset($_SESSION['usuario_logado'])) {
                      $conexao = new PDO("sqlite:../models/sqlite/banco_de_dados.sqlite");
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
                <a class="dropdown-item drop" href="profile.php">Perfil</a>
                <a class="dropdown-item drop" href="logout.php">Logout</a>
            </div>
        </div>
        <div class="nav-links titles">
            <a href="pages/genre-romance.php">Romance</a>
            <a href="pages/genre-ficção.php">Ficção</a>
            <a href="pages/genre-lgbtqia+.php">LGBTQIA+</a>
            <a href="pages/genre-suspense.php">Suspense</a>
            <a href="pages/genre-drama.php">Drama</a>
            <a href="pages/genre-guerra.php">Guerra</a>
        </div>
    </nav>
</header>
    <hr class="division">
    <section class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img id="book-cover" src="#" style="width: 100%;"class="img-thumbnail img-fluid mx-auto img-selected" alt="img01" src="#">
            </div>
            <div class="col-12 col-md-8">
                <h2 id="book-title"></h2>
                <p><span id="book-data"></span> • <span id="book-genre"></span> • <span id="book-author"></span></p>
                <p class="rating">
                    <img src="#" id="star-1" class="">
                    <img src="#" id="star-2" class="">
                    <img src="#" id="star-3" class="">
                    <img src="#" id="star-4" class="">
                    <img src="#" id="star-5" class=""> 
                    <span>(<a href="#rate">2</a>)</span>
                </p>
                <p id="book-text"></p>
                <div>
                    <p><em>Compre em:</em></p>
                    <a id="amazon-btn" target="_blank" href=""><img src="../images/Book/book-amazon-btn.png"></a>
                    <a id="saraiva-btn" target="_blank" href=""><img src="../images/Book/book-saraiva.png"></a>
                    <a id="estante-btn" target="_blank" href=""><img src="../images/Book/book-estante.png"></a>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <h4 class="title">Características</h4>
        <hr class="division">
        <div class="row caract" id="rate">
            <div class="col-4 col-md-2 text-center grey">
                <p>N° de páginas</p>
                <img src="../images/Book/book-page.png">
                <p>
                    <span id="book-page"></span>
                </p>
            </div>
            <div class="col-4 col-md-2 text-center no-line line-sm">
                <p>Lançamento</p>
                <img src="../images/Book/book-date.png">
                <p>
                    <span id="book-date"></span>
                </p>
            </div>
            <div class="col-4 col-md-2 text-center grey no-line line-sm">
                <p>Idioma</p>
                <img src="../images/Book/book-language.png">
                <p>
                    <span id="book-lang"></span>
                </p>
            </div>
            <div class="col-4 col-md-2 text-center no-line">
                <p>Editora</p>
                <img src="../images/Book/book-autor.png">
                <p>
                    <span id="book-edit"></span>
                </p>
            </div>
            <div class="col-4 col-md-2 text-center grey no-line">
                <p>Dimensões</p>
                <img src="../images/Book/book-height.png">
                <p>
                    <span id="book-height"></span>
                </p>
            </div>
            <div class="col-4 col-md-2 text-center">
                <p>Público alvo</p>
                <img src="../images/Book/book-kid.png">
                <p>
                    <span id="book-kid"></span>
                </p>
            </div>
        </div>
    </section>
    <section class="container">
        <h4 class="title">Resenhas</h4>
        <hr class="division">
        <div id="resenha-1">
            <a href="" target="_blank"id="rese-1-a"><h5 id="rese-1-name"></h5></a>
            <p>Nota: <span id="rese-1-rate"></span></p>
            <p class="note">Opinião:</p>
            <p id="resen-1-text"></p>
        </div>
        <div id="resenha-2">
            <a href="" target="_blank"id="rese-2-a"><h5 id="rese-2-name"></h5></a>
            <p>Nota: <span id="rese-2-rate"></span></p>
            <p class="note">Opinião:</p>
            <p id="resen-2-text"></p>
        </div>
    </section>
    <footer>
        <a href="#header"><img src="../images/structure-logo_footer.png" class="logo-footer" alt="logo"></a>
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
                <a class="form" href="forms.html">Formulário</a>
            </div>
            <div class="business-partner col-10 col-md-6">
                <h4>Parceiros</h4>
                <ul>
                    <li><a target="_blank" href="https://www.amazon.com.br/"><img alt="amazon logo" class="amazon-logo"src="../images/Book/book-amazon.png"></a></li>
                    <li><a target="_blank" href="https://www.saraiva.com.br/"><img alt="saraiva logo" class="saraiva-logo"src="../images/Book/book-saraiva.png"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-ele">
            <div class="row">
                <div class="col-6">
                    <p>powered by</p>
                </div>
                <div class="col-6">
                    <img class="logo-comp" src="../images/footer-company.png" alt="company logo">
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