<?php
require_once("settings.php");

if (isset($_GET['model'])) {
    $model = mysqli_real_escape_string($conn, $_GET['model']);
    $sql = "SELECT * FROM cars WHERE Model LIKE '%$model%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border= 1 cellpadding= 5>";
        echo "<tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>Year of Manufacture</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Car_id'] . "</td>";
            echo "<td>" . $row['Make'] . "</td>";
            echo "<td>" . $row['Model'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Year_of_manufacture'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "🚫 No matching cars found.";
    }
} else{
    echo "Please enter a model to search.";
 }

mysqli_close($conn);
?>