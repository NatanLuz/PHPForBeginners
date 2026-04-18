<?php
declare(strict_types=1);

// Funcoes novas de string do PHP 8.

$fullName = 'Natan Da Luz';
$code = '23';

echo "1) str_contains:\n";
var_dump(str_contains($fullName, 'Luz'));

echo "\n2) str_starts_with:\n";
var_dump(str_starts_with(strtolower($fullName), 'natan'));

echo "\n3) str_ends_with:\n";
var_dump(str_ends_with(strtolower($fullName), 'luz'));

echo "\n4) str_pad:\n";
$leftPaddedCode = str_pad($code, 6, '0', STR_PAD_LEFT);
$bothSidesPaddedCode = str_pad($leftPaddedCode, 8, '0', STR_PAD_BOTH);
echo "Left padded: $leftPaddedCode\n";
echo "Both sides padded: $bothSidesPaddedCode\n";

