<?php require_once 'Viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planejamento de Viagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Planejamento de Viagem</h1>
            <p>Calcule os custos e detalhes da sua viagem</p>
        </header>

        <form method="post" class="form-viagem">
            <div class="form-row">
                <div class="form-group">
                    <label for="origem">Origem</label>
                    <input type="text" name="origem" id="origem" required placeholder="Cidade de partida">
                </div>
                
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" name="destino" id="destino" required placeholder="Cidade de destino">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="distancia">Distância (km)</label>
                    <input type="number" step="0.1" name="distancia" id="distancia" required placeholder="Ex: 350.5">
                </div>
                
                <div class="form-group">
                    <label for="tempo">Tempo estimado (horas)</label>
                    <input type="number" step="0.1" name="tempo" id="tempo" required placeholder="Ex: 4.5">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="veiculo">Tipo de Veículo</label>
                    <select name="veiculo" id="veiculo" required>
                        <option value="">Selecione...</option>
                        <option value="Carro pequeno">Carro pequeno</option>
                        <option value="Carro médio">Carro médio</option>
                        <option value="SUV">SUV</option>
                        <option value="Caminhonete">Caminhonete</option>
                        <option value="Moto">Moto</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="consumo">Consumo (km/l)</label>
                    <input type="number" step="0.1" name="consumo" id="consumo" required placeholder="Ex: 12.5">
                </div>
            </div>

            <div class="form-group">
                <label for="combustivel">Preço do combustível (R$/litro)</label>
                <input type="number" step="0.01" name="combustivel" id="combustivel" required placeholder="Ex: 5.75">
            </div>

            <button type="submit" class="btn-calcular">Calcular Viagem</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $viagem = new Viagem(
                $_POST['origem'],
                $_POST['destino'],
                (float)$_POST['distancia'],
                (float)$_POST['tempo'],
                $_POST['veiculo'],
                (float)$_POST['consumo'],
                (float)$_POST['combustivel']
            );

            echo $viagem->exibirDetalhes();
        }
        ?>

        <footer>
            <p>Planejador de Viagens &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>
</html>