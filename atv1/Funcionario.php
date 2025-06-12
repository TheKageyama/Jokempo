<?php require_once 'CalculadoraFinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Financeira</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Calculadora Financeira</h1>
            <p>Simule parcelamentos com juros compostos</p>
        </header>

        <form method="post" class="form-calculadora">
            <div class="form-group">
                <label for="valor">Valor da compra (R$)</label>
                <input type="number" step="0.01" name="valor" id="valor" required placeholder="Ex: 1500.00">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="parcelas">Número de parcelas</label>
                    <input type="number" min="1" name="parcelas" id="parcelas" required placeholder="Ex: 12">
                </div>
                
                <div class="form-group">
                    <label for="juros">Taxa de juros mensal (%)</label>
                    <input type="number" step="0.01" name="juros" id="juros" required placeholder="Ex: 2.99">
                </div>
            </div>

            <button type="submit" class="btn-calcular">Calcular Financiamento</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $calculadora = new CalculadoraFinanceira(
                (float)$_POST['valor'],
                (int)$_POST['parcelas'],
                (float)$_POST['juros']
            );

            echo $calculadora->exibirDetalhes();
        }
        ?>

        <footer>
            <p>Calculadora Financeira &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>
</html>