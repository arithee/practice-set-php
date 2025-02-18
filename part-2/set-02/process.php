<?php
function tokenizeText(string $text): array {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    return array_filter(explode(' ', $text));
}

function calculateWordFrequencies(array $words): array {
    return array_count_values($words);
}

function removeStopWords(array $words): array {
    $stopWords = ["a","an","the","and","but","or","in","on","at","with","he","she","it","they","is","am","are","was","were","be","being","been"];
    return array_diff($words, $stopWords);
}

function sortWordsByFrequency(array $wordFrequencies, string $order): array {
    if ($order === 'desc') {
        arsort($wordFrequencies);
    } else {
        asort($wordFrequencies);
    }
    return $wordFrequencies;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'] ?? '';
    $sortingOrder = $_POST['sorting_order'] ?? 'desc';
    $displayLimit = isset($_POST['display_limit']) ? (int)$_POST['display_limit'] : 10;

    if (!empty($inputText)) {
        $words = tokenizeText($inputText);
        $filteredWords = removeStopWords($words);
        $wordFrequencies = calculateWordFrequencies($filteredWords);
        $sortedFrequencies = sortWordsByFrequency($wordFrequencies, $sortingOrder);

        $sortedFrequencies = array_slice($sortedFrequencies, 0, $displayLimit, true);
    } else {
        echo "<p>No text provided.</p>";
        exit;
    }
} else {
    echo "<p>Invalid request method.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Word Frequency Results</h1>
    <center>

    <table border="1">
        <tr>
            <th>Word</th>
            <th>Frequency</th>
        </tr>
        <?php foreach ($sortedFrequencies as $word => $count): ?>
        <tr>
            <td><?php echo htmlspecialchars($word); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    </center>
    <a href="index.php">Go Back</a>
</body>
</html>