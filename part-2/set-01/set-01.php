
The codes were all grouped into functions that was in the pdf file.

<?php

// Calculate the total price of items in a shopping cart
function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

// Shopping cart items
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

// Calculate and display the total price
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice . "\n";

// Performs a series of string manipulations
function formatString(string $inputString): string {
    $cleanedString = str_replace(' ', '', $inputString);
    return strtolower($cleanedString);
}

// String manipulation
$originalString = "This is a poorly written program with little structure and readability.";
$modifiedString = formatString($originalString);
echo "Modified string: " . $modifiedString . "\n";



// Checks if a number is even or odd
function checkEvenOrOdd(int $number): string {
    return ($number % 2 === 0) ? "The number $number is even." : "The number $number is odd.";
}

$number = 42;
echo checkEvenOrOdd($number) . "\n";
