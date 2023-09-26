<?php
$caminho_banco_dados = '../models/sqlite/banco_de_dados.sqlite';

$conexao = new SQLite3($caminho_banco_dados);

session_start();

if(isset($_SESSION['usuario_logado'])) {
    header("Location: ../index.php");
    exit();
}

$erro = "";
$mensagem = "";

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    if(empty($usuario) || empty($senha) || empty($email)) {
        $erro = "Por favor, preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido. Por favor, insira um endereço de e-mail válido.";
    } elseif (!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/", $senha)) {
        $erro = "Senha inválida. A senha deve conter pelo menos 8 caracteres com pelo menos um número no meio.";
    } else {
        $query = "SELECT * FROM User WHERE username = :usuario";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
        $resultado = $stmt->execute();

        if ($row = $resultado->fetchArray()) {
            $erro = "Este nome de usuário já está em uso. Escolha outro.";
        } else {
            $queryInserir = "INSERT INTO User (username, password, email) VALUES (:usuario, :senha, :email)";
            $stmtInserir = $conexao->prepare($queryInserir);
            $stmtInserir->bindValue(':usuario', $usuario, SQLITE3_TEXT);
            $stmtInserir->bindValue(':senha', $senha, SQLITE3_TEXT);
            $stmtInserir->bindValue(':email', $email, SQLITE3_TEXT);
            $inserido = $stmtInserir->execute();

            if ($inserido) {
                $mensagem = "Registro bem-sucedido. <a href='login.php'>Faça login aqui</a>.";
            } else {
                $erro = "Ocorreu um erro ao criar sua conta. Tente novamente.";
            }
        }
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página de Cadastro</title>    
    <title>Página de Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/structure.css">
    <link type="text/css" rel="stylesheet" href="../css/home.css">
</head>
<body class="login">
    <div class="container card-cont-sign">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Cadastro</h1>

                <?php if(!empty($erro)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erro; ?>
                    </div>
                <?php } ?>
                
                <?php if(!empty($mensagem)) { ?>
                    <div class="alert alert-success">
                        <?php echo $mensagem; ?>
                    </div>
                <?php } ?>
                
                <form method="post" action="sign-in.php">
                    <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <input type="text" class="form-control" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                    <button type="submit" name="submit" class="btn w-100 btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</body>
</html>
