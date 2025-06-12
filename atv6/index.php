<?php require_once 'ConversorMoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Conversor de Moedas</h1>
            <p>Converta Reais para Dólar ou Euro</p>
        </header>

        <form method="post" class="form-conversor">
            <div class="form-group">
                <label for="valor">Valor em Reais (R$)</label>
                <input type="number" step="0.01" name="valor" id="valor" required placeholder="Digite o valor">
            </div>

            <div class="form-group">
                <label for="moeda">Moeda de Destino</label>
                <select name="moeda" id="moeda" required>
                    <option value="">Selecione...</option>
                    <option value="USD">Dólar Americano (USD)</option>
                    <option value="EUR">Euro (EUR)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cotacao">Cotação (R$ por 1 unidade)</label>
                <input type="number" step="0.0001" name="cotacao" id="cotacao" required placeholder="Ex: 5.20">
            </div>

            <button type="submit" class="btn-converter">Converter</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valor = (float)$_POST['valor'];
            $moeda = $_POST['moeda'];
            $cotacao = (float)$_POST['cotacao'];

            $conversor = new ConversorMoeda($valor, $moeda, $cotacao);
            echo $conversor->exibirResultado();
        }
        ?>

        <footer>
            <p>Conversor de Moedas &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>
</html>