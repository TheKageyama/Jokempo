<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distancia;
    private float $tempoEstimado;
    private string $tipoVeiculo;
    private float $consumoVeiculo;
    private float $precoCombustivel;

    public function __construct(
        string $origem,
        string $destino,
        float $distancia,
        float $tempoEstimado,
        string $tipoVeiculo,
        float $consumoVeiculo,
        float $precoCombustivel
    ) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempoEstimado = $tempoEstimado;
        $this->tipoVeiculo = $tipoVeiculo;
        $this->consumoVeiculo = $consumoVeiculo;
        $this->precoCombustivel = $precoCombustivel;
    }

    public function calcularVelocidadeMedia(): float {
        return $this->distancia / $this->tempoEstimado;
    }

    public function calcularConsumoEstimado(): float {
        return $this->distancia / $this->consumoVeiculo;
    }

    public function calcularCustoViagem(): float {
        return $this->calcularConsumoEstimado() * $this->precoCombustivel;
    }

    public function exibirDetalhes(): string {
        $velocidadeMedia = $this->calcularVelocidadeMedia();
        $consumoEstimado = $this->calcularConsumoEstimado();
        $custoViagem = $this->calcularCustoViagem();

        return "
        <div class='resultado'>
            <h3>Detalhes da Viagem</h3>
            <p><strong>Rota:</strong> {$this->origem} → {$this->destino}</p>
            <p><strong>Distância:</strong> " . number_format($this->distancia, 1, ',', '.') . " km</p>
            <p><strong>Tempo estimado:</strong> " . number_format($this->tempoEstimado, 1, ',', '.') . " horas</p>
            <p><strong>Velocidade média:</strong> " . number_format($velocidadeMedia, 1, ',', '.') . " km/h</p>
            <p><strong>Tipo de veículo:</strong> {$this->tipoVeiculo} (".number_format($this->consumoVeiculo, 1, ',', '.')." km/l)</p>
            <p><strong>Combustível necessário:</strong> " . number_format($consumoEstimado, 1, ',', '.') . " litros</p>
            <p class='destaque'><strong>Custo estimado:</strong> R$ " . number_format($custoViagem, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>