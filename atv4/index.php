<?php require_once 'Carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Carro | X Style</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="x-container">
        <div class="x-header">
            <h1>Calculadora Veicular</h1>
            <p>Calcule autonomia, custos e revisão do seu carro</p>
        </div>
        
        <form method="post" class="x-form">
            <div class="x-form-group">
                <label>Modelo do Veículo</label>
                <input type="text" name="modelo" placeholder="Ex: Onix 1.0" required>
            </div>
            
            <div class="x-form-group">
                <label>Tipo de Combustível</label>
                <div class="x-radio-group">
                    <label class="x-radio">
                        <input type="radio" name="combustivel" value="gasolina" checked>
                        <span>Gasolina</span>
                    </label>
                    <label class="x-radio">
                        <input type="radio" name="combustivel" value="etanol">
                        <span>Etanol</span>
                    </label>
                </div>
            </div>
            
            <div class="x-form-row">
                <div class="x-form-group">
                    <label>Capacidade do Tanque (L)</label>
                    <input type="number" step="0.1" min="1" name="tanque" placeholder="Ex: 45.5" required>
                </div>
                
                <div class="x-form-group">
                    <label>Consumo (km/L)</label>
                    <input type="number" step="0.1" min="1" name="consumo" placeholder="Ex: 12.3" required>
                </div>
            </div>
            
            <div class="x-form-group">
                <label>Quilometragem Atual (km)</label>
                <input type="number" name="km" placeholder="Ex: 8500" required>
            </div>
            
            <button type="submit" class="x-button">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $carro = new Carro(
                $_POST['modelo'],
                $_POST['combustivel'],
                (float)$_POST['tanque'],
                (float)$_POST['consumo']
            );

            echo $carro->exibirRelatorio((int)$_POST['km']);
        }
        ?>
    </div>
</body>
</html>