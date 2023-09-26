<?php
$nome = $sobrenome = $idade = $email = $comentario = "";
$erros = [];
$enviado = false; // Variável para verificar se o formulário foi enviado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["firstname"];
    $sobrenome = $_POST["lastname"];
    $idade = $_POST["age"];
    $email = $_POST["email"];
    $comentario = $_POST["subject"];

    // Validação dos campos (exemplo simples)
    if (empty($nome) || empty($sobrenome)) {
        $erros[] = "Nome e sobrenome são obrigatórios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Email inválido.";
    }

    if ($idade < 12 || $idade > 80) {
        $erros[] = "A idade deve estar entre 12 e 80 anos.";
    }

    if (empty($erros)) {
        $nome = $sobrenome = $idade = $email = $comentario = "";
        $enviado = true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/images/structure-logo_header.png">
        <title>Fourth Cover</title>
        <link type="text/css" rel="stylesheet" href="../css/structure.css">
        <link type="text/css" rel="stylesheet" href="../css/home.css">
        <script language="javascript" src="../js/home.js"></script>
        <script language="javascript" src="../js/books.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="http://fonts.cdnfonts.com/css/lemonmilk" rel="stylesheet">
        <title>Fourth Cover</title>

        <style>
            @charset "utf-8";

            body {
                margin: 0;
            }

            h1, h2, h3 {
                font-family: 'Lemon/Milk';
                color: #c6a9e1;
            }


            /*feedback*/

            section {
                margin-left: 50px;
                margin-right: 50px;
            }

            * {box-sizing: border-box;}

            .container input[type=text], select, textarea {
                padding: 12px;
                border: 1px solid #b5dde6;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
                margin-left: 6px;
                font-size: 15px;
            }


            .container input[type=text], select {
                width: 49%;
            }

            .container input[type=number] {
                padding: 12px;
                border: 1px solid #b5dde6;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
                margin-left: 6px;
                width: 49%;
                font-size: 15px;
            }

            .usuario {
                padding-bottom: 50px;
            }

            textarea {
                width: 100%; 
                min-height: 200px;
                min-width: 200px;
                resize: none
            }

            .container input[type=submit] {
                background-color: #175563;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-left: 10px;
                height: 100px;
                width: 100px;
                margin-top: 50px;
                font-size: 18px;
            }

            .container input[type=submit]:hover {
                background-color: #175563;
            }

            .container {
                border-radius: 5px;
                background-color: #fafdff;
                padding: 20px;
            }

            #comentario {
                margin-top: 20px;
            }

            h1 {
                font-size: 30px;
                color: #175563;
            }

            h2, h3 {
                font-size: 20px;
            }
        </style>
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
        <section> 
            <h1>Feedback</h1>
        <hr>
        <?php if ($enviado) { ?>
            <div class="confirmacao alert-success alert">
                <p>Seu formulário foi enviado com sucesso!</p>
            </div>
        <?php } else { ?>
            <?php if (!empty($erros)) { ?>
                <div class="erro alert-danger alert">
                    <?php foreach ($erros as $erro) { ?>
                        <p><?php echo $erro; ?></p>
                    <?php } ?>
                </div>
            <?php } } ?>
        <p>Obrigado por visitar nosso site. Se você tiver comentários sobre sua experiência, conteúdo neste site ou para relatar um link quebrado, preencha este formulário. Valorizamos seus comentários e sugestões!</p>
        
        <form class="usuario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3>Nome</h3>
            <div class="container">
                <input type="text" id="fname" name="firstname" placeholder="Nome">
                <input type="text" id="lname" name="lastname" placeholder="Sobrenome">
            </div>
            <h3>Dados</h3>
            <div class="container">
                <input type="number" id="age" name="age" placeholder="Idade" max="80" min="12">
                <input type="email" id="email" name="email" placeholder="Email">
            </div>
            <h3>Comentário</h3>
            <div class="container" id="comentario">
                <textarea id="subject" name="subject" style="height:200px" placeholder="comentário..."></textarea>
                <input type="submit" class="w-100" value="Enviar">
            </div>
        </form>
    </section>

        <footer>
            <a href="#header"><img src="images/structure-logo_footer.png" class="logo-footer" alt="logo"></a>
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
                        <li><a target="_blank" href="https://www.amazon.com.br/"><img alt="amazon logo" class="amazon-logo"src="/images/Book/book-amazon.png"></a></li>
                        <li><a target="_blank" href="https://www.saraiva.com.br/"><img alt="saraiva logo" class="saraiva-logo"src="/images/Book/book-saraiva.png"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-ele">
                <div class="row">
                    <div class="col-6">
                        <p>powered by</p>
                    </div>
                    <div class="col-6">
                        <img class="logo-comp" src="/images/footer-company.png" alt="company logo">
                    </div>
                </div>
                
                <p>Fourth Cover  |  todos os direitos reservados a &copyTGCompany  |  Avenida Paulista, 1439 - Bela Vista, São Paulo - SP</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>