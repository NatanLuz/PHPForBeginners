<?php

require_once __DIR__ . "/Cliente.php";
require_once __DIR__ . "/Pedido.php";

echo "=== Aula de POO: Relacionamento e Associacao ===" . PHP_EOL;
echo "Ideia principal: um Pedido esta associado a um Cliente." . PHP_EOL;
echo str_repeat('-', 60) . PHP_EOL;

// Exemplo base (o que voce ja tinha):
$c = new Cliente(nome: "Joao", email: "joao@example.com");

$c1 = new Cliente(nome: "Maria", email: "maria@example.com");

$p = new Pedido(numeroPedido: 123, valor: 250.75, cliente: $c);

echo "Exemplo 1: Pedido associado a Joao" . PHP_EOL;
$p->apresentarPedido();
echo PHP_EOL;

echo str_repeat('-', 60) . PHP_EOL;

// Exemplo 2: Um mesmo cliente pode estar associado a varios pedidos.
$p2 = new Pedido(numeroPedido: 124, valor: 99.90, cliente: $c);
echo "Exemplo 2: Um cliente com dois pedidos" . PHP_EOL;
$p->apresentarPedido();
echo PHP_EOL;
$p2->apresentarPedido();
echo PHP_EOL;

echo str_repeat('-', 60) . PHP_EOL;

// Exemplo 3: Trocando a associacao do pedido para outro cliente.
echo "Exemplo 3: Troca de associacao (Pedido agora pertence a Maria)" . PHP_EOL;
$p->trocarCliente($c1);
$p->apresentarPedido();
echo PHP_EOL;

echo str_repeat('-', 60) . PHP_EOL;

// Exemplo 4: Alterando estado do cliente e vendo reflexo no pedido associado.
echo "Exemplo 4: Atualizando dados do cliente associado" . PHP_EOL;
$c1->alterarEmail("maria.novo@email.com");
$p->apresentarPedido();
echo PHP_EOL;

echo str_repeat('-', 60) . PHP_EOL;

// Exemplo 5: Comportamento de negocio no pedido.
echo "Exemplo 5: Aplicando desconto no pedido" . PHP_EOL;
$p->aplicarDesconto(10);
$p->apresentarPedido();
echo PHP_EOL;

echo str_repeat('-', 60) . PHP_EOL;

echo "Resumo didatico" . PHP_EOL;
echo "1) Associacao: Pedido usa Cliente por referencia." . PHP_EOL;
echo "2) Um Cliente pode aparecer em varios Pedidos (1 para N)." . PHP_EOL;
echo "3) Se trocar o Cliente no Pedido, muda a associacao." . PHP_EOL;
echo "4) Se mudar o objeto Cliente, os pedidos ligados a ele refletem essa mudanca." . PHP_EOL;