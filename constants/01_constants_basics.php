<?php

// Exemplo de definicao, leitura e uso de constantes.
define("NOME", "Natan Da Luz");

echo NOME;

echo "<hr>";

Const IDADE = 40;
echo IDADE;

// Constantes magicas ajudam a inspecionar o ambiente e o arquivo atual.

echo "<hr>";
echo "A linha atual e a: " . __LINE__; // linha atual do arquivo
echo "<hr>";

echo "O caminho do arquivo atual e: " . __FILE__; // caminho completo do arquivo

echo "O nome do diretorio atual e: " . __DIR__;
echo "<hr>";

// Exemplos de superglobais uteis em contexto de servidor.

echo "O nome do servidor e: " .$_SERVER['SERVER_NAME'];
echo "<hr>";        

echo "O nome do usuario e: " .$_SERVER['USER'];
echo "<hr>";    

// Informacoes da requisicao HTTP atual.
echo "O metodo usado na requisicao e: " .$_SERVER['REQUEST_METHOD'];