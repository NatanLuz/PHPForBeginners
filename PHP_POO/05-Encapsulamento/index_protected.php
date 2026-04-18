<?php

require_once __DIR__ . '/Funcionario.php';
require_once __DIR__ . '/Gerente.php';
require_once __DIR__ . '/Operario.php';

echo "=== AULA: ENCAPSULAMENTO 03 (MODIFICADOR PROTECTED) ===" . PHP_EOL;
echo PHP_EOL;
echo "Conceito rapido:" . PHP_EOL;
echo "- protected protege o atributo de acesso externo direto." . PHP_EOL;
echo "- mas permite uso dentro da classe base e das classes filhas." . PHP_EOL;
echo "- e muito usado com heranca e sobrescrita de metodos." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 1: CLASSE BASE ================" . PHP_EOL;
$funcionario = new Funcionario('Carlos', 3200.00, 'Administrativo');
echo $funcionario->exibirResumo() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 2: CLASSE FILHA GERENTE ================" . PHP_EOL;
$gerente = new Gerente('Fernanda', 8500.00, 'Tecnologia', 8);
echo $gerente->exibirResumo() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 3: CLASSE FILHA OPERARIO ================" . PHP_EOL;
$operario = new Operario('Joao', 2800.00, 'Producao', 22, 18.50);
echo $operario->exibirResumo() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 4: POLIMORFISMO + PROTECTED ================" . PHP_EOL;
$equipe = [$funcionario, $gerente, $operario];

foreach ($equipe as $item) {
    // Cada classe calcula bonus do seu proprio jeito,
    // mas o acesso aos dados internos continua protegido.
    echo $item->exibirResumo() . PHP_EOL;
}

echo PHP_EOL;
echo "================ EXEMPLO 5: O QUE O PROTECTED EVITA ================" . PHP_EOL;
echo "Tentativas abaixo NAO sao permitidas e causariam erro, por isso estao comentadas:" . PHP_EOL;
echo "- \$gerente->salarioBase = 1;" . PHP_EOL;
echo "- \$operario->nome = 'X';" . PHP_EOL;
echo "Com protected, alteracoes diretas fora da classe/heranca sao bloqueadas." . PHP_EOL;
echo PHP_EOL;

echo "================ RESUMO DIDATICO ================" . PHP_EOL;
echo "1) protected = acesso interno + heranca." . PHP_EOL;
echo "2) melhora seguranca comparado ao public." . PHP_EOL;
echo "3) permite que classes filhas reaproveitem atributos/metodos protegidos." . PHP_EOL;
echo "4) combina bem com sobrescrita de metodos (ex.: calcularBonus)." . PHP_EOL;
echo PHP_EOL;

echo "================ MINI EXERCICIO GUIADO ================" . PHP_EOL;
echo "Exercicio A: Crie classe Estagiario extendendo Funcionario com bonus menor." . PHP_EOL;
echo "Exercicio B: Adicione validacao para departamento vazio na classe base." . PHP_EOL;
echo "Exercicio C: Crie metodo publico promover() em Gerente para alterar equipe." . PHP_EOL;
echo "Exercicio D: Monte array com varios tipos e exiba resumo com foreach." . PHP_EOL;
