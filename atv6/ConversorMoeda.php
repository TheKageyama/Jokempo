<?php
class ConversorMoeda {
    private float $valorReal;
    private string $moedaDestino;
    private float $cotacao;

    public function __construct(float $valorReal, string $moedaDestino, float $cotacao) {
        $this->valorReal = $valorReal;
        $this->moedaDestino = strtoupper($moedaDestino);
        $this->cotacao = $cotacao;
    }

    public function converter(): float {
        return $this->valorReal / $this->cotacao;
    }

    public function getSimboloMoeda(): string {
        return match($this->moedaDestino) {
            'USD' => 'US$',
            'EUR' => '€',
            default => '$'
        };
    }

    public function getNomeMoeda(): string {
        return match($this->moedaDestino) {
            'USD' => 'Dólar Americano',
            'EUR' => 'Euro',
            default => 'Moeda'
        };
    }

    public function exibirResultado(): string {
        $valorConvertido = $this->converter();
        $simbolo = $this->getSimboloMoeda();
        $nomeMoeda = $this->getNomeMoeda();

        return "
        <div class='resultado'>
            <h3>Resultado da Conversão</h3>
            <p><strong>Valor em Reais:</strong> R$ " . number_format($this->valorReal, 2, ',', '.') . "</p>
            <p><strong>Cotação {$nomeMoeda}:</strong> R$ " . number_format($this->cotacao, 2, ',', '.') . "</p>
            <p class='destaque'><strong>Valor em {$nomeMoeda}:</strong> {$simbolo} " . number_format($valorConvertido, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>