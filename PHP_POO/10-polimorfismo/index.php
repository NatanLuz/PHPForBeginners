<?php

declare(strict_types=1);

require_once __DIR__ . '/pagamento.php';
require_once __DIR__ . '/paypal.php';
require_once __DIR__ . '/Boleto.php';

function secao(string $titulo): void
{
	echo PHP_EOL;
	echo str_repeat('=', 78) . PHP_EOL;
	echo $titulo . PHP_EOL;
	echo str_repeat('=', 78) . PHP_EOL;
}

secao('AULA 10 - POLIMORFISMO (PHP POO)');
echo 'Objetivo: usar a mesma assinatura de metodo com comportamentos diferentes.' . PHP_EOL;

echo PHP_EOL . 'Conceitos principais:' . PHP_EOL;
echo '- Classe base define contrato comum (processar).' . PHP_EOL;
echo '- Classes filhas implementam a mesma assinatura com regra propria.' . PHP_EOL;
echo '- O codigo cliente pode tratar tudo como Pagamento.' . PHP_EOL;

secao('PARTE 01 - CLASSES CONCRETAS COM REGRAS DISTINTAS');
$paypal = new PayPal('Compra de curso PHP POO', 'aluno@email.com');
$boleto = new Boleto('Mensalidade da faculdade', 5);

echo $paypal->processar(199.90) . PHP_EOL;
echo $boleto->processar(199.90) . PHP_EOL;

secao('PARTE 02 - POLIMORFISMO COM ARRAY DE PAGAMENTOS');
$pagamentos = [$paypal, $boleto];
$valor = 350.00;

foreach ($pagamentos as $pagamento) {
	// Aqui acontece o polimorfismo:
	// mesma chamada de metodo, implementacoes diferentes.
	echo $pagamento->processar($valor) . PHP_EOL;
}

secao('PARTE 03 - BENEFICIO ARQUITETURAL');
echo 'Codigo principal desacoplado de detalhes de cada metodo de pagamento.' . PHP_EOL;
echo 'Para adicionar outro metodo (ex.: PIX), basta criar nova classe filha.' . PHP_EOL;

secao('PARTE 04 - TRATAMENTO DE ERRO');
try {
	echo $paypal->processar(0) . PHP_EOL;
} catch (InvalidArgumentException $e) {
	echo 'Erro capturado: ' . $e->getMessage() . PHP_EOL;
}

secao('RESUMO DIDATICO');
echo '1) Polimorfismo reduz if/else de tipo e melhora extensibilidade.' . PHP_EOL;
echo '2) A assinatura comum simplifica o uso de varias classes.' . PHP_EOL;
echo '3) Cada classe filha aplica sua propria regra de negocio.' . PHP_EOL;

secao('MINI EXERCICIO GUIADO');
echo 'Exercicio A: Crie classe Pix extends Pagamento com taxa zero.' . PHP_EOL;
echo 'Exercicio B: Adicione Pix no array $pagamentos e rode o foreach.' . PHP_EOL;
echo 'Exercicio C: Crie classe CartaoCredito com taxa e parcelamento.' . PHP_EOL;
echo 'Exercicio D: Extraia uma fabrica simples para instanciar metodos por string.' . PHP_EOL;
