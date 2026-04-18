<?php

// Funcoes novas de string do PHP 8.

$nome = "Natan Da Luz";
$codigo = "23";

// Verifica se uma string contem outro trecho.
echo "Utilizando o metodo str_contains: \n";
var_dump(str_contains($nome, "Luz"));

// Verifica se a string comeca com um prefixo.
echo "Utilizando o metodo str_starts_with: \n";
var_dump(str_starts_with(strtolower($nome), 'natan'));

// Verifica se a string termina com um sufixo.
echo "Utilizando o metodo str_ends_with: \n";
var_dump(str_ends_with(strtolower($nome), 'luz'));

// Completa um codigo com zeros a esquerda e depois a direita.
$pad = str_pad($codigo, 6, '0', STR_PAD_LEFT);
$pad = str_pad($pad, 6, '0', STR_PAD_RIGHT);

echo $pad;

