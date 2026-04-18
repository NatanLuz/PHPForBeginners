<?php
declare(strict_types=1);

// Exemplo basico de variaveis em PHP.
// Aqui aparecem string, float, inteiro e booleano.
$name = 'Natan';
$monthlySalary = 900.00;
$age = 23;
$isActive = true;

// Array associativo facilita agrupar dados relacionados.
$user = [
	'name' => $name,
	'age' => $age,
	'monthly_salary' => $monthlySalary,
	'is_active' => $isActive,
];

echo $user['name'] . ' tem ' . $user['age'] . ' anos e recebe R$ ' . number_format($user['monthly_salary'], 2, ',', '.') . " por mes.\n";
echo 'Status da conta: ' . ($user['is_active'] ? 'ativa' : 'inativa') . "\n";
