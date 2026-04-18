<?php

/**
 * Exemplo 1: construtor classico.
 *
 * Regras implementadas no construtor:
 * - Nome obrigatorio.
 * - Preco maior que zero.
 */
class Produto
{
    private string $nome;
    private float $preco;

    public function __construct(string $nome, float $preco)
    {
        $nome = trim($nome);

        if ($nome === '') {
            throw new InvalidArgumentException('Nome do produto nao pode ser vazio.');
        }

        if ($preco <= 0) {
            throw new InvalidArgumentException('Preco deve ser maior que zero.');
        }

        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function aplicarDesconto(float $percentual): void
    {
        if ($percentual < 0 || $percentual > 100) {
            throw new InvalidArgumentException('Percentual deve estar entre 0 e 100.');
        }

        $this->preco -= $this->preco * ($percentual / 100);
    }

    public function exibirResumo(): string
    {
        return "Produto: {$this->nome} | Preco: R$ " . number_format($this->preco, 2, ',', '.');
    }
}
