<?php
    session_start();

    require_once "Conexão.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    $sql = "SELECT * FROM users WHERE name = ? AND email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email) ;
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION["loggedin"] = true;

            header("Location: site.php");
            exit;
        }
    }
    
    
    else {
    $error = "Usuario ou senha incorreta";
    }    



?>
<!DOCTYPE html>
<html lang="pt_br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">
        <form method="POST" action="index.php">
            <h1 class="h3 mb-3 fw-normal">Logar</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="Nome" required/>
                <label for="floatingName">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="E-mail" required/>
                <label for="floatingEmail">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Senha" required/>
                <label for="floatingPassword">Senha</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Logar</button>
        </form>
        <br>
        <a href="cadastrar.php">Não tem uma conta? Faça o cadastro</a>
    </main>
</body>
</html>