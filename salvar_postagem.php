<?php

// Conexão com o banco de dados
include 'Conexão.php';

// Obter os valores do título e do conteúdo enviados pelo formulário
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

// Preparar a inserção no banco de dados
$stmt = $conn->prepare("INSERT INTO posts (titulo, conteudo) VALUE (?, ?)");
$stmt->bind_param("ss", $titulo, $conteudo);

// Executar o comando apenas uma vez
$success = $stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Status da Postagem</title>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container text-center">
        <div class="alert 
            <?php echo $success ? 'alert-success' : 'alert-danger'; ?>" 
            role="alert">
            <?php
            if ($success) {
                echo "Postagem salva com sucesso!";
            } else {
                echo "Erro ao salvar a postagem: " . $stmt->error;
            }
            ?>
        </div>
        <a href="site.php" class="btn btn-primary mt-3">Criar Nova Postagem</a>
    </main>
</body>
</html>

<?php
// Fechar a declaração e a conexão com o banco de dados
$stmt->close();
?>
