<?php

require_once __DIR__ . '/Funcionario.php';
require_once __DIR__ . '/Departamento.php';

echo "=== AULA: RELACIONAMENTO POR AGREGACAO (PHP POO) ===" . PHP_EOL;
echo PHP_EOL;
echo "Conceito rapido:" . PHP_EOL;
echo "- Agregacao e uma relacao 'tem-um' ou 'tem-muitos'." . PHP_EOL;
echo "- O objeto agregado continua existindo mesmo se sair do agregador." . PHP_EOL;
echo "- Aqui: Departamento agrega Funcionario." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 1: OBJETOS INDEPENDENTES ================" . PHP_EOL;
$f1 = new Funcionario(1, 'Ana', 'Desenvolvedora', 5000.00);
$f2 = new Funcionario(2, 'Bruno', 'QA', 4200.00);
$f3 = new Funcionario(3, 'Carla', 'Tech Lead', 8500.00);

echo $f1->apresentar() . PHP_EOL;
echo $f2->apresentar() . PHP_EOL;
echo $f3->apresentar() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 2: DEPARTAMENTO AGREGANDO FUNCIONARIOS ================" . PHP_EOL;
$depTecnologia = new Departamento('Tecnologia');

$depTecnologia->adicionarFuncionario($f1);
$depTecnologia->adicionarFuncionario($f2);
$depTecnologia->adicionarFuncionario($f3);

echo $depTecnologia->apresentarResumo() . PHP_EOL;
echo "Lista de funcionarios do departamento:" . PHP_EOL;
foreach ($depTecnologia->listarFuncionarios() as $funcionario) {
	echo '  - ' . $funcionario->apresentar() . PHP_EOL;
}
echo PHP_EOL;

echo "================ EXEMPLO 3: REMOVER NAO DESTROI O OBJETO ================" . PHP_EOL;
$removido = $depTecnologia->removerFuncionarioPorId(2);

if ($removido !== null) {
	echo "Funcionario removido do departamento: " . $removido->apresentar() . PHP_EOL;
	echo "Observe: o objeto removido ainda existe em memoria e pode ser reutilizado." . PHP_EOL;
}

echo "Resumo do departamento apos remocao:" . PHP_EOL;
echo $depTecnologia->apresentarResumo() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 4: REUTILIZAR FUNCIONARIO EM OUTRO DEPARTAMENTO ================" . PHP_EOL;
$depQualidade = new Departamento('Qualidade');

if ($removido !== null) {
	$depQualidade->adicionarFuncionario($removido);
}

echo $depQualidade->apresentarResumo() . PHP_EOL;
foreach ($depQualidade->listarFuncionarios() as $funcionario) {
	echo '  - ' . $funcionario->apresentar() . PHP_EOL;
}
echo PHP_EOL;

echo "================ EXEMPLO 5: REGRAS DE NEGOCIO ================" . PHP_EOL;
echo "Aplicando aumento de 8% para Carla..." . PHP_EOL;
$f3->aplicarAumento(8);

echo "Novo resumo de Tecnologia:" . PHP_EOL;
echo $depTecnologia->apresentarResumo() . PHP_EOL;
foreach ($depTecnologia->listarFuncionarios() as $funcionario) {
	echo '  - ' . $funcionario->apresentar() . PHP_EOL;
}
echo PHP_EOL;

echo "================ RESUMO DIDATICO ================" . PHP_EOL;
echo "1) Funcionario existe sozinho (classe independente)." . PHP_EOL;
echo "2) Departamento guarda referencias para varios funcionarios." . PHP_EOL;
echo "3) Remover do departamento nao apaga o funcionario." . PHP_EOL;
echo "4) O mesmo funcionario pode ser associado a outro departamento." . PHP_EOL;
echo PHP_EOL;

echo "================ MINI EXERCICIO GUIADO ================" . PHP_EOL;
echo "Exercicio A: Crie um departamento 'Financeiro' e adicione 2 funcionarios." . PHP_EOL;
echo "Exercicio B: Remova 1 funcionario e mostre que ele ainda pode ser adicionado em outro departamento." . PHP_EOL;
echo "Exercicio C: Some os salarios manualmente e compare com calcularFolhaMensal()." . PHP_EOL;
echo "Exercicio D: Aplique aumento para 1 funcionario e imprima o resumo final." . PHP_EOL;
