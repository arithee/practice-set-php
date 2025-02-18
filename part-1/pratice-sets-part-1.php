<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Practice Set 01</h2>
    
    <form method="POST" action="">
        Side 1: <input type="number" name="side1"><br><br>
        Side 2: <input type="number" name="side2"><br><br>
        Side 3: <input type="number" name="side3"><br><br>
        <input type="submit" value="Enter">
    </form>

    <?php
     $side1 = 0;
     $side2 = 0;
     $side3 = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $side1 = $_POST['side1'];
        $side2 = $_POST['side2'];
        $side3 = $_POST['side3'];
    }
    $s = ($side1 + $side2 + $side3) / 2;
    
    $area_of_triangle= $s * ($s - $side1) * ($s - $side2) * ($s - $side3);

    $area = $area_of_triangle ** 0.5;

    echo "<p>The area of the triangle is: " . number_format($area, 2) . " square units.</p>";
    ?>

    
    <h2>Practice Set 02</h2>
    <?php
    $fruits = ["Mango", "Banana", "Strawberry", "Grapes", "Apple"];

    echo "<ol>";
    for ($i = 0; $i < count($fruits); $i++) {
        echo "<li>" . $fruits[$i] . "</li>";
    }
    echo "</ol>";
    ?>

    <h2>Practice Set 03</h2>
    <?php
    $matrix = [
        [12, 23, 34],
        [45, 55, 62],
        [71, 84, 90]
    ];

    echo "<ul>";
    $row = 0;
    while ($row < count($matrix)) {
        $col = 0;
        while ($col < count($matrix[$row])) {
            $num = $matrix[$row][$col];
            if ($num % 2 == 0) {
                echo "<li>$num</li>";
             }
             $col++;
        }
        $row++;
    }
    echo "</ul>";
?>
</body>
</html>