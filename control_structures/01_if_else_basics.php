<?php
declare(strict_types=1);

// Estruturas de controle em PHP.
// Exemplos simples e organizados para estudo inicial.

function section(string $title): void
{
    echo "\n=== $title ===\n";
}

section('1) IF / ELSE / ELSEIF');
$student = ['name' => 'Natan', 'grade_1' => 8.0, 'grade_2' => 6.0];
$average = ($student['grade_1'] + $student['grade_2']) / 2;

if ($average >= 9) {
    $status = 'Excelente';
} elseif ($average >= 7) {
    $status = 'Aprovado';
} elseif ($average >= 5) {
    $status = 'Recuperacao';
} else {
    $status = 'Reprovado';
}

echo "{$student['name']} | Media: $average | Status: $status\n";

section('2) Comparacoes e operadores logicos');
$age = 25;
$hasDocument = true;

if ($age >= 18 && $hasDocument) {
    echo "Entrada permitida.\n";
}

echo 'Comparacao estrita "25" === 25: ' . ("25" === 25 ? 'true' : 'false') . "\n";

section('3) Switch');
$weekDay = 3;
$dayNames = [1 => 'Segunda', 2 => 'Terca', 3 => 'Quarta', 4 => 'Quinta', 5 => 'Sexta'];

switch ($weekDay) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Dia util: ' . $dayNames[$weekDay] . "\n";
        break;
    default:
        echo "Fim de semana\n";
}

section('4) FOR, WHILE e DO...WHILE');
echo "FOR de 1 a 5: ";
for ($i = 1; $i <= 5; $i++) {
    echo $i . ' ';
}
echo "\n";

$counter = 1;
echo "WHILE de 1 a 3: ";
while ($counter <= 3) {
    echo $counter . ' ';
    $counter++;
}
echo "\n";

$value = 1;
echo "DO...WHILE executa ao menos uma vez: ";
do {
    echo $value . ' ';
    $value++;
} while ($value <= 1);
echo "\n";

section('5) FOREACH com array associativo');
$students = [
    ['name' => 'Ana', 'grade' => 9],
    ['name' => 'Bruno', 'grade' => 7],
    ['name' => 'Carlos', 'grade' => 5],
];

foreach ($students as $item) {
    $result = $item['grade'] >= 7 ? 'APROVADO' : 'REPROVADO';
    echo "{$item['name']} tirou {$item['grade']} - $result\n";
}

section('6) Break e Continue');
for ($n = 1; $n <= 7; $n++) {
    if ($n === 2) {
        continue;
    }

    if ($n === 6) {
        break;
    }

    echo "Numero processado: $n\n";
}

section('7) Exemplo real: calculo de desconto');
$order = ['customer' => 'Usuario', 'total' => 150.00];
$discountRate = 0.0;

if ($order['total'] > 500) {
    $discountRate = 0.20;
} elseif ($order['total'] > 200) {
    $discountRate = 0.10;
} elseif ($order['total'] > 100) {
    $discountRate = 0.05;
}

$finalTotal = $order['total'] - ($order['total'] * $discountRate);

echo "Cliente: {$order['customer']}\n";
echo 'Valor original: R$ ' . number_format($order['total'], 2, ',', '.') . "\n";
echo 'Desconto: ' . ($discountRate * 100) . "%\n";
echo 'Valor final: R$ ' . number_format($finalTotal, 2, ',', '.') . "\n";