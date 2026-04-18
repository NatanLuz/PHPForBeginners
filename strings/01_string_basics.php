<?php
declare(strict_types=1);

// Funcoes basicas de tratamento de string.

$rawText = ' Eu sou uma string ';
$upperText = 'EU SOU UMA STRING';
$newText = 'Eu sou uma nova string';
$code = 23;

echo "1) Remocao de espacos:\n";
echo trim($rawText) . "\n";
echo ltrim($rawText) . "\n";
echo rtrim($rawText) . "\n\n";

echo "2) Quantidade de caracteres:\n";
echo strlen($newText) . "\n\n";

echo "3) Recorte de string com substr:\n";
echo substr($newText, 4, 9) . "\n\n";

echo "4) Conversao de caixa:\n";
echo strtolower($upperText) . "\n";
echo strtoupper($rawText) . "\n\n";

echo "5) Substituicao de trecho:\n";
echo str_replace('nova', 'antiga', $newText) . "\n\n";

echo "6) Conversao de tipo:\n";
$stringCode = strval($code);
echo $stringCode . "\n";
echo gettype($stringCode) . "\n";