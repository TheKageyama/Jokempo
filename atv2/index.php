<?php require_once 'Aluno.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="x-container">
        <h2>Notas do Aluno</h2>
        <form method="post" class="x-form">
            <label>
                <span>Nome:</span>
                <input type="text" name="nome" required>
            </label>
            <label>
                <span>Disciplina:</span>
                <input type="text" name="disciplina" required>
            </label>
            <label>
                <span>Nota 1:</span>
                <input type="number" step="0.1" min="0" max="10" name="nota1" required>
            </label>
            <label>
                <span>Nota 2:</span>
                <input type="number" step="0.1" min="0" max="10" name="nota2" required>
            </label>
            <label>
                <span>Nota 3:</span>
                <input type="number" step="0.1" min="0" max="10" name="nota3" required>
            </label>
            <button type="submit" class="x-button">Calcular Média</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $aluno = new Aluno(
                $_POST['nome'],
                $_POST['disciplina'],
                (float)$_POST['nota1'],
                (float)$_POST['nota2'],
                (float)$_POST['nota3']
            );

            echo '<div class="x-result">';
            echo $aluno->exibirResultado();
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>