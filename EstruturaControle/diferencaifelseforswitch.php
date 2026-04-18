<?php

echo "=== Diferenca entre if/else, switch e for ===" . PHP_EOL . PHP_EOL;

echo "1) if/else" . PHP_EOL;
echo "Use quando precisar avaliar condicoes booleanas e faixas de valor." . PHP_EOL;

$nota = 78;
if ($nota >= 90) {
	echo "Resultado: A" . PHP_EOL;
} elseif ($nota >= 70) {
	echo "Resultado: B" . PHP_EOL;
} else {
	echo "Resultado: C" . PHP_EOL;
}

echo PHP_EOL . "2) switch" . PHP_EOL;
echo "Use quando comparar um mesmo valor com casos fixos." . PHP_EOL;

$perfil = 'admin';
switch ($perfil) {
	case 'admin':
		echo "Nivel de acesso: total" . PHP_EOL;
		break;
	case 'editor':
		echo "Nivel de acesso: medio" . PHP_EOL;
		break;
	default:
		echo "Nivel de acesso: basico" . PHP_EOL;
}

echo PHP_EOL . "3) for" . PHP_EOL;
echo "Use quando o numero de repeticoes for conhecido." . PHP_EOL;

for ($i = 1; $i <= 5; $i++) {
	echo "Contador: $i" . PHP_EOL;
}

echo PHP_EOL . "Resumo:" . PHP_EOL;
echo "- if/else: logica condicional flexivel" . PHP_EOL;
echo "- switch: escolha por valor exato" . PHP_EOL;
echo "- for: repeticao controlada" . PHP_EOL;
