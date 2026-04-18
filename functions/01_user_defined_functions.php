<?php

// 1) USER-DEFINED FUNCTIONS
// Funcoes definidas pelo usuario para encapsular regras de negocio.

function showCourseTitle(): void
{
    echo "PHP Functions - User-defined examples\n";
}

function buildFullName(string $firstName, string $lastName): string
{
    return "$firstName $lastName";
}

showCourseTitle();
$fullName = buildFullName("Ana", "Silva");

echo "Student: $fullName\n";
