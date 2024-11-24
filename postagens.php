<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Postagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary">
    <main class="container py-4">
        <h1 class="text-center mb-4">Lista de Postagens</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php
                // Incluir o arquivo conexão com o banco de dados
                include 'Conexão.php';

                $sql = "SELECT * FROM posts ORDER BY id DESC";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        $titulo = htmlspecialchars($row['titulo']);
                        $descricao = nl2br(htmlspecialchars($row['conteudo']));
                ?>
                        <!-- Postagem -->
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $titulo; ?></h3>
                                <p class="card-text"><?php echo $descricao; ?></p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="alert alert-warning text-center" role="alert">Nenhuma postagem encontrada.</div>';
                }

                $conn->close();
                ?>
                <!-- Botão Voltar -->
                <div class="text-center mt-4">
                    <a href="site.php" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
