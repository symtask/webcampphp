<?php
$a = 0;
$b = 1;

echo $a . "\n";
echo $b . "\n";

while ($b < 10000) {
    $next = $a + $b;
    echo $next . "\n";

    $a = $b;
    $b = $next;
}
