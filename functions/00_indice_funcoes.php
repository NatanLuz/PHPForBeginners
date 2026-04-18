<?php

// ======================================================
// INDICE DE ESTUDO - FUNCOES EM PHP
// ======================================================
// Este arquivo serve como guia rapido dos exemplos separados.

$topics = [
    "01_user_defined_functions.php",
    "02_parameters_and_arguments.php",
    "03_returning_values.php",
    "04_variable_functions.php",
    "05_internal_functions.php",
    "06_anonymous_functions.php",
    "07_arrow_functions.php",
    "08_first_class_callable.php",
];

echo "Guia de estudo: Functions (PHP)\n\n";

foreach ($topics as $index => $file) {
    $number = $index + 1;
    echo "$number. $file\n";
}

echo "\nDica: execute um arquivo por vez para focar no conceito.\n";
