<?php
function criarTabelas($conexao) {
    $queryUsuarios = "CREATE TABLE IF NOT EXISTS User (
        id INTEGER PRIMARY KEY,
        username TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )";
    $conexao->exec($queryUsuarios);

    $queryEditoras = "CREATE TABLE IF NOT EXISTS Publisher (
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        address TEXT NOT NULL
    )";
    $conexao->exec($queryEditoras);

    $queryInformacoes = "CREATE TABLE IF NOT EXISTS Info (
        id INTEGER PRIMARY KEY,
        numPages INTEGER NOT NULL,
        releaseDate TEXT NOT NULL,
        language TEXT NOT NULL,
        publisher_id INTEGER NOT NULL,
        dimensions TEXT NOT NULL,
        targetAudience TEXT NOT NULL
    )";
    $conexao->exec($queryInformacoes);

    $queryLivros = "CREATE TABLE IF NOT EXISTS Book (
        id INTEGER PRIMARY KEY,
        title TEXT NOT NULL,
        isbn TEXT NOT NULL,
        author_id INTEGER NOT NULL,
        publisher_id INTEGER NOT NULL,
        pages INTEGER NOT NULL
    )";
    $conexao->exec($queryLivros);

    $queryAutores = "CREATE TABLE IF NOT EXISTS Author (
        id INTEGER PRIMARY KEY,
        firstName TEXT NOT NULL,
        lastName TEXT NOT NULL,
        birthdate TEXT NOT NULL
    )";
    $conexao->exec($queryAutores);
}

$caminho_banco_dados = '../models/sqlite/banco_de_dados.sqlite';

$conexao = new SQLite3($caminho_banco_dados);
criarTabelas($conexao);



session_start();

if(isset($_SESSION['usuario_logado'])) {
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM User WHERE username = :usuario AND password = :senha";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
    $stmt->bindValue(':senha', $senha, SQLITE3_TEXT);
    $resultado = $stmt->execute();

    if ($row = $resultado->fetchArray()) {
        $_SESSION['usuario_logado'] = true;
        header("Location: ../index.php");
        exit();
    } else {
        $erro = "Credenciais inválidas. Não existe um usuário com esse nome de usuário e senha. <i><a href='sign-in.php'>Cadastra-se</a></i>";
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/structure.css">
    <link type="text/css" rel="stylesheet" href="../css/home.css">
</head>
<body class="login">
    <div class="container card-cont">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Login</h1>

                <?php if(isset($erro)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erro; ?>
                    </div>
                <?php } ?>
                
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <input type="text" class="form-control" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                    <button type="submit" name="submit" class="btn w-100 btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
