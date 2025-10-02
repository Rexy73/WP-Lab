
<?php
// Prime numbers from 1 to 50
function isPrime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

echo "Prime numbers from 1 to 50: <br>";
for ($n = 1; $n <= 50; $n++) {
    if (isPrime($n)) {
        echo $n . " ";
    }
}

echo "<br><br>";

// Fibonacci series (first 10 terms)
$n = 10;
$f1 = 0;
$f2 = 1;

echo "Fibonacci series up to $n terms:<br>";
echo $f1 . " " . $f2 . " ";

for ($i = 3; $i <= $n; $i++) {
    $next = $f1 + $f2;
    echo $next . " ";
    $f1 = $f2;
    $f2 = $next;
}
?>
 