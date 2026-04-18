<?php

/**
 * Exemplo 3: construtor com heranca.
 *
 * A classe filha chama o construtor da classe pai usando parent::__construct().
 */
class FuncionarioBase
{
    protected string $nome;
    protected float $salarioBase;

    public function __construct(string $nome, float $salarioBase)
    {
        $nome = trim($nome);

        if ($nome === '') {
            throw new InvalidArgumentException('Nome do funcionario nao pode ser vazio.');
        }

        if ($salarioBase < 0) {
            throw new InvalidArgumentException('Salario base nao pode ser negativo.');
        }

        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    public function calcularSalarioFinal(): float
    {
        return $this->salarioBase;
    }
}

class GerenteProjeto extends FuncionarioBase
{
    private float $bonusMensal;

    public function __construct(string $nome, float $salarioBase, float $bonusMensal)
    {
        parent::__construct($nome, $salarioBase);

        if ($bonusMensal < 0) {
            throw new InvalidArgumentException('Bonus mensal nao pode ser negativo.');
        }

        $this->bonusMensal = $bonusMensal;
    }

    public function calcularSalarioFinal(): float
    {
        return $this->salarioBase + $this->bonusMensal;
    }

    public function exibirResumo(): string
    {
        return "Gerente: {$this->nome} | Salario final: R$ " . number_format($this->calcularSalarioFinal(), 2, ',', '.');
    }
}
