<?php
    require_once "settings.php";
    $dbconn = @ mysqli_connect($host, $user, $pwd, $sql_db);
    if($dbconn){
        $query = "SELECT * FROM cars";
        $result = mysqli_query($dbconn,$query);
        if(!$result)
        die("Connection failed: " . mysqli_connect_error($dbconn));
    }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "UTF-8">
<title>Cars Table</title>
</head>
<body>
    <h1>Cars Table</h1>
        
        <?php if (mysqli_num_rows($result) > 0) {
            echo "<table border = 1>
                <tr>
                    <th>Car ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year of manufacture</th>
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

            echo '</table>';
            }    
            else {
                echo '<p>There are no cars to display.</p>';
            }
            ?>
        
</body>
</html>

    <?php mysqli_close($dbconn);
?>