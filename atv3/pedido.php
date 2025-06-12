<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    public function calcularTotalBruto(): float {
        return $this->quantidade * $this->precoUnitario;
    }

    public function calcularDesconto(): float {
        $total = $this->calcularTotalBruto();
        return $this->tipoCliente === 'premium' ? $total * 0.1 : 0;
    }

    public function calcularImposto(): float {
        return $this->calcularTotalBruto() * 0.08;
    }

    public function calcularTotalFinal(): float {
        return $this->calcularTotalBruto() - $this->calcularDesconto() + $this->calcularImposto();
    }

    public function exibirResumo(): string {
        $totalBruto = $this->calcularTotalBruto();
        $desconto = $this->calcularDesconto();
        $imposto = $this->calcularImposto();
        $totalFinal = $this->calcularTotalFinal();

        return "
        <div class='x-card'>
            <h3>Resumo do Pedido</h3>
            <p><strong>Produto:</strong> {$this->produto}</p>
            <p><strong>Quantidade:</strong> {$this->quantidade}</p>
            <p><strong>Preço Unitário:</strong> R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</p>
            <hr>
            <p><strong>Total Bruto:</strong> R$ " . number_format($totalBruto, 2, ',', '.') . "</p>
            <p class='positive'><strong>Desconto ({$this->tipoCliente}):</strong> -R$ " . number_format($desconto, 2, ',', '.') . "</p>
            <p class='negative'><strong>Imposto (8%):</strong> +R$ " . number_format($imposto, 2, ',', '.') . "</p>
            <hr>
            <p class='total'><strong>Total Final:</strong> R$ " . number_format($totalFinal, 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>