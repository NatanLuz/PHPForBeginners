<?php
class Pessoa
{
    // Propriedades privadas: reforcam encapsulamento.
    // O acesso externo ocorre por metodos da classe.
    private string $nome;
    private int $idade;

    public function __construct(string $n, int $i)
    {
        $this->nome = $n;
        $this->setIdade($i);
    }

    // Getters permitem leitura segura das propriedades.
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    // Setter com validacao simples para manter o objeto consistente.
    public function setIdade(int $idade): void
    {
        if ($idade < 0) {
            throw new InvalidArgumentException('Idade nao pode ser negativa.');
        }

        $this->idade = $idade;
    }

    public function correr(): string
    {
        return $this->nome . ' esta correndo.';
    }

    public function fazerAniversario(): void
    {
        $this->idade++;
    }

    public function apresentar(): string
    {
        return "Olá, me chamo {$this->nome} e tenho {$this->idade} anos de idade.";
    }
}