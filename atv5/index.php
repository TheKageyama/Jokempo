<?php require_once 'Produto.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Controle de Estoque</h1>
        
        <form method="post">
            <h2>Cadastrar Produto</h2>
            <input type="text" name="nome" placeholder="Nome do produto" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <input type="number" step="0.01" name="preco" placeholder="Preço unitário" required>
            
            <h2>Movimentação</h2>
            <input type="number" name="entrada" placeholder="Quantidade para entrada">
            <input type="number" name="saida" placeholder="Quantidade para saída">
            
            <button type="submit">Atualizar Estoque</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                // Cria o produto
                $produto = new Produto(
                    $_POST['nome'],
                    (int)$_POST['quantidade'],
                    (float)$_POST['preco']
                );

                // Processa movimentações
                if (!empty($_POST['entrada'])) {
                    $produto->adicionarEstoque((int)$_POST['entrada']);
                }
                
                if (!empty($_POST['saida'])) {
                    $produto->removerEstoque((int)$_POST['saida']);
                }

                // Exibe informações atualizadas
                echo $produto->exibirInfo();
                
            } catch (Exception $e) {
                echo "<div class='error'>{$e->getMessage()}</div>";
            }
        }
        ?>
    </div>
</body>
</html>