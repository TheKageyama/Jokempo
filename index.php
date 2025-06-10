<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokempô 

    </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=MedievalSharp&family=UnifrakturMaguntia&display=swap');
        
        body {
            font-family: 'MedievalSharp', cursive;
            background-color: #1a120b;
            background-image: url('https://example.com/path-to-your-parchment-texture.jpg');
            text-align: center;
            padding: 20px;
            color: #3e2723;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f5f5dc;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(210, 180, 140, 0.5);
            border: 8px double #8b4513;
            position: relative;
            overflow: hidden;
        }
        .container:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://example.com/path-to-your-paper-texture.jpg') center/cover;
            opacity: 0.3;
            z-index: 0;
        }
        h1 {
            color: #5d4037;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 30px;
            position: relative;
            font-family: 'UnifrakturMaguntia', cursive;
        }
        h1:after {
            content: "";
            display: block;
            width: 60%;
            height: 2px;
            background: linear-gradient(to right, transparent, #8b4513, transparent);
            margin: 10px auto;
        }
        .choices {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            position: relative;
        }
        .choice {
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }
        .choice:hover {
            transform: translateY(-10px) scale(1.05);
        }
        .choice input {
            display: none;
        }
        .choice img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border-radius: 50%;
            border: 3px solid #8b4513;
            background-color: #f5f5dc;
            padding: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
        }
        .choice:hover img {
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.4);
        }
        .choice div {
            margin-top: 10px;
            font-size: 1.2em;
            font-weight: bold;
            color: #5d4037;
        }
        .choice.selected {
            transform: translateY(-10px);
        }
        .choice.selected img {
            border: 3px solid #d4af37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
        }
        button {
            background-color: #8b4513;
            color: #f5f5dc;
            border: none;
            padding: 12px 30px;
            font-size: 1.2em;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'MedievalSharp', cursive;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-top: 20px;
            z-index: 1;
        }
        button:hover {
            background-color: #a0522d;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        button:active {
            transform: translateY(1px);
        }
        button:before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px solid #d4af37;
            border-radius: 40px;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: -1;
        }
        button:hover:before {
            opacity: 1;
        }
        .result {
            margin-top: 40px;
            padding: 25px;
            border-radius: 10px;
            font-size: 1.2em;
            position: relative;
            z-index: 1;
            border: 3px solid;
            background-color: rgba(245, 245, 220, 0.8);
            box-shadow: inset 0 0 15px rgba(0,0,0,0.1);
        }
        .player-choice, .computer-choice {
            display: inline-block;
            margin: 0 30px;
            vertical-align: top;
        }
        .vs {
            font-size: 2em;
            font-weight: bold;
            display: inline-block;
            margin: 40px 20px 0;
            vertical-align: middle;
            color: #8b4513;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .win {
            border-color: #155724;
            background-color: rgba(212, 237, 218, 0.7);
        }
        .win h2 {
            color: #155724;
        }
        .lose {
            border-color: #721c24;
            background-color: rgba(248, 215, 218, 0.7);
        }
        .lose h2 {
            color: #721c24;
        }
        .draw {
            border-color: #856404;
            background-color: rgba(255, 243, 205, 0.7);
        }
        .draw h2 {
            color: #856404;
        }
        h2, h3 {
            color: #5d4037;
            margin-top: 0;
        }
        h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }
        h3 {
            font-size: 1.4em;
            margin-bottom: 15px;
        }
        
        .container:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.1) 45%,
                rgba(255,255,255,0.1) 55%,
                rgba(255,255,255,0) 100%
            );
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jokempô </h1>
        
        <form method="post">
            <div class="choices">
                <label class="choice <?= isset($_POST['player']) && $_POST['player'] == 'pedra' ? 'selected' : '' ?>">
                    <input type="radio" name="player" value="pedra" <?= isset($_POST['player']) && $_POST['player'] == 'pedra' ? 'checked' : '' ?>>
                    <img src="images/pedra.png" alt="Pedra">
                    <div>Pedra</div>
                </label>
                
                <label class="choice <?= isset($_POST['player']) && $_POST['player'] == 'papel' ? 'selected' : '' ?>">
                    <input type="radio" name="player" value="papel" <?= isset($_POST['player']) && $_POST['player'] == 'papel' ? 'checked' : '' ?>>
                    <img src="images/papel.png" alt="Papel">
                    <div>Papel</div>
                </label>
                
                <label class="choice <?= isset($_POST['player']) && $_POST['player'] == 'tesoura' ? 'selected' : '' ?>">
                    <input type="radio" name="player" value="tesoura" <?= isset($_POST['player']) && $_POST['player'] == 'tesoura' ? 'checked' : '' ?>>
                    <img src="images/tesoura.png" alt="Tesoura">
                    <div>Tesoura</div>
                </label>
            </div>
            
            <button type="submit">Desafiar!</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['player'])) {
            $player = $_POST['player'];
            $computer = ['pedra', 'papel', 'tesoura'][rand(0, 2)];
            
            function determineWinner($player, $computer) {
                if ($player == $computer) {
                    return 'draw';
                }
                
                if (
                    ($player == 'pedra' && $computer == 'tesoura') ||
                    ($player == 'papel' && $computer == 'pedra') ||
                    ($player == 'tesoura' && $computer == 'papel')
                ) {
                    return 'win';
                } else {
                    return 'lose';
                }
            }
            
            $result = determineWinner($player, $computer);
            
            echo '<div class="result ' . $result . '">';
            echo '<div class="player-choice">';
            echo '<h3>Teu Escudo:</h3>';
            echo '<img src="images/' . $player . '.png" width="120">';
            echo '<div>' . ucfirst($player) . '</div>';
            echo '</div>';
            
            echo '<div class="vs">⚔️</div>';
            
            echo '<div class="computer-choice">';
            echo '<h3>Adversário:</h3>';
            echo '<img src="images/' . $computer . '.png" width="120">';
            echo '<div>' . ucfirst($computer) . '</div>';
            echo '</div>';
            
            echo '<h2>';
            if ($result == 'draw') {
                echo 'Batalha empatada!';
            } elseif ($result == 'win') {
                echo 'Vitória gloriosa!';
            } else {
                echo 'Derrota na batalha...';
            }
            echo '</h2>';
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>