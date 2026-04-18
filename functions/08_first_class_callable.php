<?php

// 8) FIRST CLASS CALLABLE SYNTAX (PHP 8.1+)
// Cria callables com a sintaxe (...).

function formatTitle(string $value): string
{
    return strtoupper($value);
}

$formatCallable = formatTitle(...);
$strlenCallable = strlen(...);

echo "Formatted title: " . $formatCallable("php functions") . "\n";
echo "Length: " . $strlenCallable("callable") . "\n";

// Exemplo com metodo de classe.
class PriceFormatter
{
    public function toCurrency(float $value): string
    {
        return "R$ " . number_format($value, 2, ",", ".");
    }
}

$formatter = new PriceFormatter();
$currencyCallable = $formatter->toCurrency(...);

echo "Price: " . $currencyCallable(1999.9) . "\n";
