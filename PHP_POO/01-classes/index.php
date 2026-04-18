<?php
require_once __DIR__ . '/pessoa.php';

// 1) Criacao de objetos (instancias) a partir da classe Pessoa.
$p = new Pessoa(n: "Fulano", i: 26);
$p2 = new Pessoa(n: "Ciclano", i: 44);

echo "=== AULA 1: CLASSES E OBJETOS ===" . PHP_EOL . PHP_EOL;

// 2) Leitura de estado do objeto por metodos (getters).
echo $p->getNome() . " tem " . $p->getIdade() . " anos." . PHP_EOL . PHP_EOL;

// 3) Comportamento do objeto (metodo de acao).
echo $p->correr() . PHP_EOL . PHP_EOL;

// 4) Metodo de apresentacao.
echo $p->apresentar() . PHP_EOL;

echo PHP_EOL;

// 5) Estrutura interna do objeto para estudo.
var_dump($p);
echo PHP_EOL;

// 6) Segundo objeto: mesma classe, estado diferente.
echo $p2->getNome() . " tem " . $p2->getIdade() . " anos." . PHP_EOL . PHP_EOL;

echo "Antes do aniversario: " . $p2->apresentar() . PHP_EOL . PHP_EOL;
$p2->fazerAniversario();
echo "Depois do aniversario: " . $p2->apresentar() . PHP_EOL . PHP_EOL;

// 7) Exemplo de encapsulamento com validacao.
echo "=== TESTE DE VALIDACAO ===" . PHP_EOL . PHP_EOL;
try {
	$p2->setIdade(-10);
} catch (InvalidArgumentException $e) {
	echo "Erro capturado: " . $e->getMessage() . PHP_EOL . PHP_EOL;
}

echo "Idade final de " . $p2->getNome() . ": " . $p2->getIdade();
echo PHP_EOL . PHP_EOL;