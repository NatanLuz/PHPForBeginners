<?php

// 5) INTERNAL (BUILT-IN) FUNCTIONS
// Funcoes internas ja prontas no PHP.

$text = "php documentation";

echo "Original: $text\n";
echo "strlen: " . strlen($text) . "\n";
echo "strtoupper: " . strtoupper($text) . "\n";
echo "str_replace: " . str_replace("documentation", "functions", $text) . "\n";

date_default_timezone_set("America/Sao_Paulo");
echo "date: " . date("Y-m-d H:i:s") . "\n";
