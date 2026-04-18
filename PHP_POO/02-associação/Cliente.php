<?php 

class Cliente 
{
  public string $nome;
  
  public string $email;

  public function __construct(string $nome, string $email)
  {
    $this->nome = $nome;
    $this->email = $email;
  }

  public function apresentarCliente(): void
  {
    echo "Cliente: {$this->nome} | E-mail: {$this->email}" . PHP_EOL;
  }

  public function alterarEmail(string $novoEmail): void
  {
    $this->email = $novoEmail;
  }
}
?>