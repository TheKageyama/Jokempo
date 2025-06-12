<?php require_once 'Pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Pedido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="x-container">
        <h2>Cálculo de Pedido</h2>
        <form method="post" class="x-form">
            <label>
                <span>Produto:</span>
                <input type="text" name="produto" required>
            </label>
            <label>
                <span>Quantidade:</span>
                <input type="number" min="1" name="quantidade" required>
            </label>
            <label>
                <span>Preço Unitário:</span>
                <input type="number" step="0.01" min="0" name="preco" required>
            </label>
            <label>
                <span>Tipo de Cliente:</span>
                <select name="tipo_cliente" required>
                    <option value="normal">Normal</option>
                    <option value="premium">Premium</option>
                </select>
            </label>
            <button type="submit" class="x-button">Calcular Total</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pedido = new Pedido(
                $_POST['produto'],
                (int)$_POST['quantidade'],
                (float)$_POST['preco'],
                $_POST['tipo_cliente']
            );

            echo '<div class="x-result">';
            echo $pedido->exibirResumo();
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>