<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Postagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        textarea {
            overflow-y: hidden; /* Oculta a barra de rolagem vertical enquanto ajusta */
            resize: none;      /* Impede que o usuário redimensione manualmente */
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="container w-50 p-4 bg-dark text-light rounded shadow">
        <h1 class="h3 mb-4 text-center">Criar Nova Postagem</h1>
        <form action="salvar_postagem.php" method="POST">
            <!-- Campo para o Título da Notícia -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="tituloNoticia" name="titulo" placeholder="Título da Notícia" maxlength="500" required>
                <label for="tituloNoticia">Título da Notícia</label>
            </div>

            <!-- Campo para o Conteúdo -->
            <div class="form-floating mb-3">
                <textarea class="form-control" id="conteudoNoticia" name="conteudo" placeholder="Escreva o conteúdo aqui" oninput="autoResize(this)" required></textarea>
                <label for="conteudoNoticia">Conteúdo</label>
            </div>

            <!-- Botão de Postar -->
            <button type="submit" class="btn btn-primary w-100 py-2">Postar</button>
        </form>
    </main>

    <script>
        function autoResize(textarea) {
            // Redefine a altura para evitar comportamento acumulativo
            textarea.style.height = "auto";
            // Ajusta a altura de acordo com o conteúdo
            textarea.style.height = `${textarea.scrollHeight}px`;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>