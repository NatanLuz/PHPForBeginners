<?php 

class Pedido
{
    public int $numeroPedido;
    public float $valor;
    public Cliente $cliente;

    public function __construct(int $numeroPedido, float $valor, Cliente $cliente)
    {
        $this->numeroPedido = $numeroPedido;
        $this->valor = $valor;
        $this->cliente = $cliente;
    }

    // Associação: Pedido "tem um" Cliente.
    // Se trocar o cliente, o pedido passa a apontar para outro objeto cliente.
    public function trocarCliente(Cliente $novoCliente): void
    {
        $this->cliente = $novoCliente;
    }

    public function aplicarDesconto(float $percentual): void
    {
        if ($percentual < 0 || $percentual > 100) {
            echo "Percentual invalido. Use de 0 a 100." . PHP_EOL;
            return;
        }

        $this->valor -= $this->valor * ($percentual / 100);
    }

    public function apresentarPedido(): void
    {
        echo "Numero Pedido: " . $this->numeroPedido . PHP_EOL;
        echo "Valor Pedido: R$ " . number_format($this->valor, 2, ',', '.') . PHP_EOL;
        echo "Cliente: " . $this->cliente->nome . PHP_EOL;
        echo "Email cliente: " . $this->cliente->email . PHP_EOL;
    }
}