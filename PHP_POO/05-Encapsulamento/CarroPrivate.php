<?php

/**
 * Encapsulamento 02 - Modificador PRIVATE.
 *
 * Nesta etapa, os atributos ficam privados para proteger o estado interno.
 * O acesso externo ocorre por metodos publicos controlados.
 */
class CarroPrivate
{
    private string $modelo;
    private int $ano;
    private string $cor;
    private bool $ligado = false;
    private int $velocidade = 0;

    public function __construct(string $modelo, int $ano, string $cor)
    {
        if ($ano < 1886) {
            throw new InvalidArgumentException('Ano invalido para um carro.');
        }

        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->cor = $cor;
    }

    // Getters: leitura controlada dos atributos privados.
    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function getCor(): string
    {
        return $this->cor;
    }

    public function isLigado(): bool
    {
        return $this->ligado;
    }

    public function getVelocidade(): int
    {
        return $this->velocidade;
    }

    // Setter com regra para evitar valor invalido.
    public function setCor(string $novaCor): void
    {
        $novaCor = trim($novaCor);

        if ($novaCor === '') {
            echo "Cor invalida: nao pode ser vazia." . PHP_EOL;
            return;
        }

        $this->cor = $novaCor;
    }

    public function ligar(): void
    {
        $this->ligado = true;
    }

    public function desligar(): void
    {
        $this->ligado = false;
        $this->velocidade = 0;
    }

    public function acelerar(int $incremento): void
    {
        if (!$this->ligado) {
            echo "Nao e possivel acelerar: carro desligado." . PHP_EOL;
            return;
        }

        if ($incremento <= 0) {
            echo "Incremento de aceleracao deve ser maior que zero." . PHP_EOL;
            return;
        }

        $this->velocidade += $incremento;
    }

    public function frear(int $decremento): void
    {
        if ($decremento <= 0) {
            echo "Decremento de frenagem deve ser maior que zero." . PHP_EOL;
            return;
        }

        $this->velocidade -= $decremento;

        if ($this->velocidade < 0) {
            $this->velocidade = 0;
        }
    }

    public function exibirPainel(): string
    {
        $status = $this->ligado ? 'Ligado' : 'Desligado';
        return "Carro: {$this->modelo} ({$this->ano}) | Cor: {$this->cor} | Status: {$status} | Velocidade: {$this->velocidade} km/h";
    }
}
