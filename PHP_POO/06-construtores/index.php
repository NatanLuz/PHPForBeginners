<?php

declare(strict_types=1);

require_once __DIR__ . '/Produto.php';
require_once __DIR__ . '/Usuario.php';
require_once __DIR__ . '/FuncionarioHeranca.php';

function secao(string $titulo): void
{
    echo PHP_EOL;
    echo str_repeat('=', 74) . PHP_EOL;
    echo $titulo . PHP_EOL;
    echo str_repeat('=', 74) . PHP_EOL;
}

secao('AULA 06 - METODOS CONSTRUTORES (PHP POO)');
echo 'Objetivo: entender como inicializar objetos de forma segura e organizada.' . PHP_EOL;

echo PHP_EOL . 'Conceitos principais:' . PHP_EOL;
echo '- O construtor e executado automaticamente no new.' . PHP_EOL;
echo '- Serve para iniciar estado obrigatorio do objeto.' . PHP_EOL;
echo '- E o melhor lugar para validacoes iniciais.' . PHP_EOL;

// ------------------------------------------------------------------
// Exemplo 1: Construtor classico
// ------------------------------------------------------------------
secao('EXEMPLO 1 - CONSTRUTOR CLASSICO COM VALIDACAO');

$produto = new Produto('Notebook', 4500.00);
echo $produto->exibirResumo() . PHP_EOL;

$produto->aplicarDesconto(10);
echo 'Apos desconto de 10%: ' . $produto->exibirResumo() . PHP_EOL;

// ------------------------------------------------------------------
// Exemplo 2: Named arguments + parametros opcionais
// ------------------------------------------------------------------
secao('EXEMPLO 2 - CONSTRUCTOR PROMOTION E PARAMETRO OPCIONAL');

$usuario = new Usuario(nome: 'Ana', email: 'ana@email.com');
echo $usuario->exibirResumo() . PHP_EOL;

$usuario2 = new Usuario(nome: 'Bruno', email: 'bruno@email.com', ativo: false);
echo $usuario2->exibirResumo() . PHP_EOL;

// ------------------------------------------------------------------
// Exemplo 3: Construtor em heranca
// ------------------------------------------------------------------
secao('EXEMPLO 3 - CONSTRUTOR COM HERANCA (parent::__construct)');

$gerente = new GerenteProjeto('Carla', 8000.00, 2200.00);
echo $gerente->exibirResumo() . PHP_EOL;

// ------------------------------------------------------------------
// Exemplo 4: Tratamento de erro ao construir
// ------------------------------------------------------------------
secao('EXEMPLO 4 - TRATAMENTO DE EXCECAO NO CONSTRUTOR');

try {
    $produtoInvalido = new Produto('', -50);
    echo $produtoInvalido->exibirResumo() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo 'Erro capturado ao criar objeto: ' . $e->getMessage() . PHP_EOL;
}

// ------------------------------------------------------------------
// Resumo final
// ------------------------------------------------------------------
secao('RESUMO DIDATICO');
echo '1) Construtor define o estado inicial obrigatorio.' . PHP_EOL;
echo '2) Validacao no construtor evita objetos invalidos.' . PHP_EOL;
echo '3) Constructor promotion reduz codigo repetido.' . PHP_EOL;
echo '4) Heranca usa parent::__construct para reaproveitar inicializacao.' . PHP_EOL;

secao('MINI EXERCICIO GUIADO');
echo 'Exercicio A: Crie classe ContaBancaria com saldo inicial no construtor.' . PHP_EOL;
echo 'Exercicio B: Bloqueie saldo inicial negativo com excecao.' . PHP_EOL;
echo 'Exercicio C: Crie classe ContaPremium estendendo ContaBancaria.' . PHP_EOL;
echo 'Exercicio D: Use named arguments para criar objetos em ordens diferentes.' . PHP_EOL;
