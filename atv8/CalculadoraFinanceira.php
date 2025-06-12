<?php
class CalculadoraFinanceira {
    private float $valorCompra;
    private int $numParcelas;
    private float $taxaJuros;

    public function __construct(float $valorCompra, int $numParcelas, float $taxaJuros) {
        $this->valorCompra = $valorCompra;
        $this->numParcelas = $numParcelas;
        $this->taxaJuros = $taxaJuros / 100; // Convertendo porcentagem para decimal
    }

    public function calcularValorParcela(): float {
        if ($this->taxaJuros == 0) {
            return $this->valorCompra / $this->numParcelas;
        }
        return $this->valorCompra * $this->taxaJuros * pow(1 + $this->taxaJuros, $this->numParcelas) / 
               (pow(1 + $this->taxaJuros, $this->numParcelas) - 1);
    }

    public function calcularTotalPagar(): float {
        return $this->calcularValorParcela() * $this->numParcelas;
    }

    public function calcularJurosPagos(): float {
        return $this->calcularTotalPagar() - $this->valorCompra;
    }

    public function exibirDetalhes(): string {
        $valorParcela = $this->calcularValorParcela();
        $totalPagar = $this->calcularTotalPagar();
        $jurosPagos = $this->calcularJurosPagos();

        return "
        <div class='resultado'>
            <h3>Resultado do Financiamento</h3>
            <p><strong>Valor da compra:</strong> R$ " . number_format($this->valorCompra, 2, ',', '.') . "</p>
            <p><strong>Número de parcelas:</strong> {$this->numParcelas}x</p>
            <p><strong>Taxa de juros mensal:</strong> " . number_format($this->taxaJuros * 100, 2, ',', '.') . "%</p>
            <p><strong>Valor da parcela:</strong> R$ " . number_format($valorParcela, 2, ',', '.') . "</p>
            <p><strong>Total a pagar:</strong> R$ " . number_format($totalPagar, 2, ',', '.') . "</p>
            <p class='destaque'><strong>Juros pagos:</strong> R$ " . number_format($jurosPagos, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>