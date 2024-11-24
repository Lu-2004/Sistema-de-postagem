<?php

    session_start();
    require_once("Conexão.php");

    function logout()
    {

        session_unset();
        session_destroy();
        header("location: index.php");
        exit;

    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt_br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Postagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-body-tertiary">
    <div class="container text-center py-5">
        <h1 class="mb-4">Sistema de Postagem 1.0</h1>
        <div class="d-grid gap-3 mb-4">
            <a href="formulario_postagem.php" class="btn btn-primary btn-lg">Criar Nova Postagem</a>
            <a href="postagens.php" class="btn btn-secondary btn-lg">Ver Postagens</a>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>

            <?php
            if (isset($_POST["logout"])) {
                logout();
            }
            ?>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>