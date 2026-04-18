<?php

/**
 * Exemplo 2: constructor property promotion (PHP 8+).
 *
 * O PHP declara e inicializa os atributos direto no construtor.
 */
class Usuario
{
    public function __construct(
        private string $nome,
        private string $email,
        private bool $ativo = true
    ) {
        $this->nome = trim($this->nome);
        $this->email = trim($this->email);

        if ($this->nome === '') {
            throw new InvalidArgumentException('Nome do usuario nao pode ser vazio.');
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email invalido.');
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function desativar(): void
    {
        $this->ativo = false;
    }

    public function exibirResumo(): string
    {
        $status = $this->ativo ? 'Ativo' : 'Inativo';
        return "Usuario: {$this->nome} | Email: {$this->email} | Status: {$status}";
    }
}
