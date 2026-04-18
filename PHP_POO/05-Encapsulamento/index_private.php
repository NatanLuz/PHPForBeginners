<?php

require_once __DIR__ . '/CarroPrivate.php';

echo "=== AULA: ENCAPSULAMENTO 02 (MODIFICADOR PRIVATE) ===" . PHP_EOL;
echo PHP_EOL;
echo "Conceito rapido:" . PHP_EOL;
echo "- private bloqueia acesso direto aos atributos fora da classe." . PHP_EOL;
echo "- o objeto se protege de alteracoes indevidas." . PHP_EOL;
echo "- alteracoes acontecem via metodos publicos com regras." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 1: CRIANDO OBJETO ================" . PHP_EOL;
$carro = new CarroPrivate('Toyota Corolla', 2022, 'Branco');
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 2: USANDO GETTERS (LEITURA SEGURA) ================" . PHP_EOL;
echo "Modelo: " . $carro->getModelo() . PHP_EOL;
echo "Ano: " . $carro->getAno() . PHP_EOL;
echo "Cor: " . $carro->getCor() . PHP_EOL;
echo "Velocidade: " . $carro->getVelocidade() . " km/h" . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 3: ALTERANDO DADO POR METODO CONTROLADO ================" . PHP_EOL;
$carro->setCor('Cinza');
echo "Cor apos setCor: " . $carro->getCor() . PHP_EOL;
$carro->setCor('');
echo "Cor final apos tentativa invalida: " . $carro->getCor() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 4: FLUXO CORRETO DE USO ================" . PHP_EOL;
$carro->ligar();
$carro->acelerar(40);
$carro->acelerar(20);
echo $carro->exibirPainel() . PHP_EOL;
$carro->frear(30);
echo $carro->exibirPainel() . PHP_EOL;
$carro->desligar();
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 5: COMPARACAO COM PUBLIC ================" . PHP_EOL;
echo "Com public, era possivel fazer: carro->velocidade = 999 diretamente." . PHP_EOL;
echo "Com private, isso e bloqueado e o estado fica mais protegido." . PHP_EOL;
echo "Resultado: classe mais confiavel e menos sujeita a erro externo." . PHP_EOL;
echo PHP_EOL;

echo "================ RESUMO DIDATICO ================" . PHP_EOL;
echo "1) private protege os atributos do acesso externo direto." . PHP_EOL;
echo "2) getters/setters controlam leitura e escrita com validacao." . PHP_EOL;
echo "3) metodos de negocio mantem o objeto consistente." . PHP_EOL;
echo "4) encapsulamento melhora seguranca e manutencao do codigo." . PHP_EOL;
echo PHP_EOL;

echo "================ MINI EXERCICIO GUIADO ================" . PHP_EOL;
echo "Exercicio A: Tente criar regra para ano minimo no construtor (ja existe, revise)." . PHP_EOL;
echo "Exercicio B: Crie metodo setModelo com validacao de texto vazio." . PHP_EOL;
echo "Exercicio C: Crie metodo pintarCarro(novaCor) que reutilize setCor." . PHP_EOL;
echo "Exercicio D: Compare aula 01 (public) com aula 02 (private)." . PHP_EOL;
