<?php
class Carro {
    private string $modelo;
    private string $combustivel;
    private float $capacidadeTanque;
    private float $consumo;
    private float $precoGasolina = 5.80;
    private float $precoEtanol = 4.20;
    private int $kmRevisao = 10000;

    public function __construct($modelo, $combustivel, $capacidadeTanque, $consumo) {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->capacidadeTanque = $capacidadeTanque;
        $this->consumo = $consumo;
    }

    public function calcularAutonomia(): float {
        return $this->capacidadeTanque * $this->consumo;
    }

    public function calcularCustoPorKm(): float {
        $preco = ($this->combustivel === 'gasolina') ? $this->precoGasolina : $this->precoEtanol;
        return $preco / $this->consumo;
    }

    public function verificarRevisao(int $kmRodados): string {
        if ($kmRodados >= $this->kmRevisao) {
            return "<span class='x-alert danger'>⚠️ Revisão necessária!</span>";
        } else {
            $restante = $this->kmRevisao - $kmRodados;
            return "<span class='x-alert success'>✓ OK (faltam " . number_format($restante) . " km)</span>";
        }
    }

    public function exibirRelatorio(int $kmRodados): string {
        return "
        <div class='x-card'>
            <div class='x-header'>
                <h3>🚗 {$this->modelo}</h3>
                <span class='x-badge {$this->combustivel}'>" . ucfirst($this->combustivel) . "</span>
            </div>
            
            <div class='x-stats'>
                <div class='x-stat'>
                    <span>Autonomia</span>
                    <strong>" . number_format($this->calcularAutonomia(), 0, ',', '.') . " km</strong>
                </div>
                
                <div class='x-stat'>
                    <span>Custo por km</span>
                    <strong>R$ " . number_format($this->calcularCustoPorKm(), 3, ',', '.') . "</strong>
                </div>
            </div>
            
            <div class='x-info'>
                <p><strong>Tanque cheio:</strong> " . number_format($this->capacidadeTanque, 1, ',', '.') . " L</p>
                <p><strong>Consumo:</strong> " . number_format($this->consumo, 1, ',', '.') . " km/L</p>
                <p><strong>Combustível:</strong> " . ($this->combustivel === 'gasolina' ? 'Gasolina (R$ '.number_format($this->precoGasolina, 2, ',', '.') : 'Etanol (R$ '.number_format($this->precoEtanol, 2, ',', '.')) . "</p>
            </div>
            
            <div class='x-revisao'>
                <p><strong>Status da revisão ({$kmRodados} km rodados):</strong></p>
                " . $this->verificarRevisao($kmRodados) . "
                <p class='x-note'>Revisão recomendada a cada " . number_format($this->kmRevisao, 0, ',', '.') . " km</p>
            </div>
        </div>
        ";
    }
}
?>