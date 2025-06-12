<?php
class Produto {
    private string $nome;
    private int $quantidade;
    private float $preco;

    public function __construct(string $nome, int $quantidade, float $preco) {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    
    public function adicionarEstoque(int $quantidade): void {
        $this->quantidade += $quantidade;
    }

    public function removerEstoque(int $quantidade): void {
        if ($quantidade <= $this->quantidade) {
            $this->quantidade -= $quantidade;
        } else {
            throw new Exception("Quantidade indisponível em estoque!");
        }
    }

   
    public function valorTotalEstoque(): float {
        return $this->quantidade * $this->preco;
    }

   
    public function exibirInfo(): string {
        return "
        <div class='produto-info'>
            <h3>{$this->nome}</h3>
            <p>Quantidade: {$this->quantidade}</p>
            <p>Preço unitário: R$ " . number_format($this->preco, 2, ',', '.') . "</p>
            <p class='total'>Valor total: R$ " . number_format($this->valorTotalEstoque(), 2, ',', '.') . "</p>
        </div>
        ";
    }
}
?>