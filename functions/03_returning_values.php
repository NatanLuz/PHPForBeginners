<?php

// 3) RETURNING VALUES
// Return devolve um valor para ser usado fora da funcao.

function calculateAverage(float $grade1, float $grade2): float
{
    return ($grade1 + $grade2) / 2;
}

function isApproved(float $average): bool
{
    return $average >= 7.0;
}

$average = calculateAverage(8.0, 6.5);
$status = isApproved($average) ? "Approved" : "Not approved";

echo "Average: $average\n";
echo "Status: $status\n";
