<?php

declare(strict_types=1);

require_once __DIR__ . '/PagamentoPix.php';
require_once __DIR__ . '/PagamentoCartao.php';
require_once __DIR__ . '/Checkout.php';

function secao(string $titulo): void
{
    echo PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
    echo $titulo . PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
}

secao('AULA 08 - INTERFACES (PHP POO)');
echo 'Objetivo: entender contratos, polimorfismo e desacoplamento com interface.' . PHP_EOL;

echo PHP_EOL . 'Conceitos principais:' . PHP_EOL;
echo '- Interface define regras (assinaturas de metodos).' . PHP_EOL;
echo '- Classes diferentes podem implementar o mesmo contrato.' . PHP_EOL;
echo '- O sistema depende da interface, nao de classe concreta.' . PHP_EOL;

secao('PARTE 01 - DEFININDO O CONTRATO');
echo 'Contrato: InterfacePagamento exige getNomeMetodo() e pagar().' . PHP_EOL;

echo PHP_EOL . 'Criando implementacoes:' . PHP_EOL;
$pix = new PagamentoPix('ana@email.com');
$cartao = new PagamentoCartao('Visa', '1234');
echo '- ' . $pix->getNomeMetodo() . PHP_EOL;
echo '- ' . $cartao->getNomeMetodo() . PHP_EOL;

secao('PARTE 02 - POLIMORFISMO NA PRATICA');
$metodos = [$pix, $cartao];
$valorPedido = 199.90;

foreach ($metodos as $metodo) {
    $checkout = new Checkout($metodo);
    echo $checkout->resumoMetodo() . PHP_EOL;
    echo $checkout->finalizar($valorPedido) . PHP_EOL;
    echo PHP_EOL;
}

secao('PARTE 03 - VANTAGEM ARQUITETURAL');
echo 'Com interface, o Checkout nao precisa conhecer detalhes de PIX ou Cartao.' . PHP_EOL;
echo 'Para adicionar outro metodo (ex.: Boleto), basta implementar InterfacePagamento.' . PHP_EOL;

echo PHP_EOL . 'Exemplo de erro controlado:' . PHP_EOL;
try {
    $checkoutErro = new Checkout(new PagamentoPix('chave@pix.com'));
    echo $checkoutErro->finalizar(0);
} catch (InvalidArgumentException $e) {
    echo 'Erro capturado: ' . $e->getMessage() . PHP_EOL;
}

secao('RESUMO DIDATICO');
echo '1) Interface e um contrato obrigatorio para classes implementadoras.' . PHP_EOL;
echo '2) Polimorfismo: o mesmo Checkout trabalha com metodos diferentes.' . PHP_EOL;
echo '3) Menos acoplamento: manutencao e expansao ficam mais simples.' . PHP_EOL;

echo PHP_EOL;
secao('MINI EXERCICIO GUIADO');
echo 'Exercicio A: Crie classe PagamentoBoleto implementando InterfacePagamento.' . PHP_EOL;
echo 'Exercicio B: Defina taxa fixa no boleto e valide valor minimo.' . PHP_EOL;
echo 'Exercicio C: Adicione novo objeto no array $metodos e execute o foreach.' . PHP_EOL;
echo 'Exercicio D: Crie segunda interface chamada InterfaceNotificador e implemente Email/SMS.' . PHP_EOL;
