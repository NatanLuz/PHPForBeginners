<?php

// Guia de operadores logicos em PHP.
// Os exemplos ficam comentados para nao executar automaticamente.

// Valores falsy em PHP: false, 0, 0.0, "0", "", null e array vazio.

// Curto-circuito com && e ||.
// $idade = 19;
// $temAutorizacao = true;
// $podeEntrar = ($idade >= 18) && $temAutorizacao;
// var_dump($podeEntrar);

// Precedencia de and/or versus &&/||.
// $x = false or true;
// $y = false || true;
// var_dump($x, $y);

// Negações e xor.
// var_dump(!true);
// var_dump(!"");
// var_dump(true xor false);
// var_dump(true xor true);

// Combinacao com comparacoes e ternario.
// $saldo = 100;
// $limiteExtra = 50;
// $temCredito = ($saldo > 0) || ($limiteExtra > 0);
// $mensagem = $temCredito ? "Compra aprovada" : "Saldo insuficiente";
// var_dump($mensagem);

// Boas praticas.
// Use parenteses ao misturar lógicos, ternario e outras expressoes.
// Prefira comparacoes explicitas antes de combinar condicoes.
?>