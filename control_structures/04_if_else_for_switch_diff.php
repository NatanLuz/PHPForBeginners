<?php
declare(strict_types=1);

echo "=== Difference Between if/else, switch and for ===" . PHP_EOL . PHP_EOL;

echo "1) if/else" . PHP_EOL;
echo "Use when you need boolean conditions or range checks." . PHP_EOL;

$score = 78;
if ($score >= 90) {
	echo "Result: A" . PHP_EOL;
} elseif ($score >= 70) {
	echo "Result: B" . PHP_EOL;
} else {
	echo "Result: C" . PHP_EOL;
}

echo PHP_EOL . "2) switch" . PHP_EOL;
echo "Use when comparing one value against exact fixed cases." . PHP_EOL;

$role = 'admin';
switch ($role) {
	case 'admin':
		echo "Access level: full" . PHP_EOL;
		break;
	case 'editor':
		echo "Access level: medium" . PHP_EOL;
		break;
	default:
		echo "Access level: basic" . PHP_EOL;
}

echo PHP_EOL . "3) for" . PHP_EOL;
echo "Use when you know how many repetitions are needed." . PHP_EOL;

for ($i = 1; $i <= 5; $i++) {
	echo "Counter: $i" . PHP_EOL;
}

echo PHP_EOL . "Summary:" . PHP_EOL;
echo "- if/else: flexible condition logic" . PHP_EOL;
echo "- switch: fixed value mapping" . PHP_EOL;
echo "- for: controlled repetition" . PHP_EOL;
