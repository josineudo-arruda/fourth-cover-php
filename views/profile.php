<?php
session_start();

if(!isset($_SESSION['usuario_logado'])) {
    header("Location: views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
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

    <main class="container">
        <section class="profile-section">
            <h1>Perfil do Usuário</h1>
            <?php
              $conexao = new PDO("sqlite:../models/sqlite/banco_de_dados.sqlite");
              
              $query = "SELECT username, email FROM User WHERE id = :id";
              
              $stmt = $conexao->prepare($query);
              $stmt->bindParam(":id", $_SESSION['usuario_logado']);
              $stmt->execute();
              
              $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
              
              if ($usuario) {
                  echo '<table class="table">';
                  echo '<tr><th>Nome</th><th>Email</th></tr>';
                  echo '<tr><td>' . $usuario['username'] . '</td><td>' . $usuario['email'] . '</td></tr>';
                  echo '</table>';
              } 
              ?>
        </section>
    </main>

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

</body>
</html>
