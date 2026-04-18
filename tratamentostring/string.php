<?php

// Funcoes basicas de tratamento de string.

$string = " Eu sou uma string ";
$string1 = "EU SOU UMA STRING ";
$string2 = "Eu sou uma nova string ";
$string3 = "Eu sou uma nova string ";
$codigo = "23";

// Remocao de espacos nas extremidades.
$trim = trim($string);
$ltrim = ltrim($string);
$rtrim = rtrim($string);

echo $trim . "\n";
echo $ltrim . "\n";
echo $rtrim . "\n";

// Quantidade de caracteres.
$len = strlen($string3);
echo $len . "\n";

// Recorte de parte da string.
$sbs = substr($string3, 4, 9);
echo $sbs . "\n";

// Conversao para caixa baixa e alta.
$lower = strtolower($string1);
$upper = strtoupper($string);

// Substituicao de trecho em uma string.
$replace = str_replace("nova", "antiga", $string3);

echo $lower . "\n";
echo $upper . "\n";
echo $replace . "\n";

// Conversao de tipo e inspeccao do resultado.
$stringCodigo = strval($codigo);
echo $stringCodigo . "\n";
echo gettype($stringCodigo);