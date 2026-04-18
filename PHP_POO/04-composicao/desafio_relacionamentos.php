<?php

/*
Desafio Consolidado de Relacionamentos em POO (PHP)

Objetivo:
- Revisar ASSOCIACAO, AGREGACAO e COMPOSICAO em um unico arquivo.
- Reaproveitar as classes ja criadas no projeto.

Observacao:
- Este arquivo nao substitui as aulas anteriores.
- Ele funciona como material de revisao pratica.
*/

// ---------- IMPORTS DAS AULAS ANTERIORES ----------
require_once __DIR__ . '/../02-associação/Cliente.php';
require_once __DIR__ . '/../02-associação/Pedido.php';

require_once __DIR__ . '/../03-agregacao/Funcionario.php';
require_once __DIR__ . '/../03-agregacao/Departamento.php';

require_once __DIR__ . '/Carro.php';

/**
 * Apenas para deixar a saida mais organizada no terminal.
 */
function secao(string $titulo): void
{
    echo PHP_EOL;
    echo "============================================================" . PHP_EOL;
    echo $titulo . PHP_EOL;
    echo "============================================================" . PHP_EOL;
}

// ============================================================
// 1) ASSOCIACAO
// ============================================================
secao('1) ASSOCIACAO: Pedido usa Cliente');

$clienteA = new Cliente('Joao', 'joao@email.com');
$clienteB = new Cliente('Maria', 'maria@email.com');

$pedido = new Pedido(1001, 350.00, $clienteA);

echo 'Pedido inicial associado ao cliente Joao:' . PHP_EOL;
$pedido->apresentarPedido();
echo PHP_EOL;

// Troca de associacao: o mesmo Pedido passa a apontar para outro Cliente.
echo 'Trocando cliente do pedido para Maria...' . PHP_EOL;
$pedido->trocarCliente($clienteB);
$pedido->apresentarPedido();
echo PHP_EOL;

// Alterar email do cliente associado reflete no pedido.
echo 'Alterando email da Maria...' . PHP_EOL;
$clienteB->alterarEmail('maria.nova@email.com');
$pedido->apresentarPedido();
echo PHP_EOL;

// ============================================================
// 2) AGREGACAO
// ============================================================
secao('2) AGREGACAO: Departamento agrega Funcionarios');

$f1 = new Funcionario(1, 'Ana', 'Dev Backend', 6000.00);
$f2 = new Funcionario(2, 'Bruno', 'QA', 4500.00);
$f3 = new Funcionario(3, 'Carla', 'Tech Lead', 9000.00);

$depTI = new Departamento('Tecnologia');
$depRH = new Departamento('Recursos Humanos');

$depTI->adicionarFuncionario($f1);
$depTI->adicionarFuncionario($f2);
$depTI->adicionarFuncionario($f3);

echo 'Resumo inicial do departamento de TI:' . PHP_EOL;
echo $depTI->apresentarResumo() . PHP_EOL;

// Exemplo chave de agregacao:
// Remover do departamento NAO destroi o funcionario.
echo PHP_EOL . 'Removendo Bruno de TI...' . PHP_EOL;
$removido = $depTI->removerFuncionarioPorId(2);

echo 'Resumo de TI apos remocao:' . PHP_EOL;
echo $depTI->apresentarResumo() . PHP_EOL;

if ($removido !== null) {
    echo 'Funcionario removido ainda existe: ' . $removido->apresentar() . PHP_EOL;

    echo 'Reassociando Bruno ao RH...' . PHP_EOL;
    $depRH->adicionarFuncionario($removido);
}

echo 'Resumo de RH:' . PHP_EOL;
echo $depRH->apresentarResumo() . PHP_EOL;

// ============================================================
// 3) COMPOSICAO
// ============================================================
secao('3) COMPOSICAO: Carro e composto por Motor');

$carro = new Carro('Sedan Turbo', 2024, 2000, 'flex');

echo 'Painel inicial (carro desligado):' . PHP_EOL;
echo $carro->exibirPainel() . PHP_EOL;

echo PHP_EOL . 'Ligando e acelerando...' . PHP_EOL;
$carro->ligarCarro();
$carro->acelerar(30);
$carro->acelerar(20);
echo $carro->exibirPainel() . PHP_EOL;

echo PHP_EOL . 'Freando 15 km/h...' . PHP_EOL;
$carro->frear(15);
echo $carro->exibirPainel() . PHP_EOL;

echo PHP_EOL . 'Desligando carro...' . PHP_EOL;
$carro->desligarCarro();
echo $carro->exibirPainel() . PHP_EOL;

// ============================================================
// 4) RESUMO FINAL
// ============================================================
secao('4) RESUMO FINAL: Diferenca entre os relacionamentos');

echo 'ASSOCIACAO: objetos se relacionam, mas sem posse forte (Pedido -> Cliente).' . PHP_EOL;
echo 'AGREGACAO: objeto agrupa outros, que continuam existindo separadamente (Departamento -> Funcionarios).' . PHP_EOL;
echo 'COMPOSICAO: relacao forte de parte-todo; parte controlada pelo todo (Carro -> Motor).' . PHP_EOL;

echo PHP_EOL . 'Mini desafio sugerido:' . PHP_EOL;
echo '- Crie mais 2 pedidos com clientes diferentes.' . PHP_EOL;
echo '- Transfira um funcionario entre departamentos.' . PHP_EOL;
echo '- Crie um segundo carro eletrico e compare o painel.' . PHP_EOL;
