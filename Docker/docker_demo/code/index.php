<?php
$servername = "c-mysql";
$username = "root";
$password = "1234";
$dbname = "demo";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = "SELECT * FROM Student";
    $statement = $conn->query($sql);
    $students = $statement->fetchAll(PDO::FETCH_ASSOC);

    // display the publisher name
    echo "<br><ul>";
    foreach ($students as $student) {
        echo "<br><li>";
        echo $student['id'] . '<br>';
        echo $student['name'] . '<br>';
        echo $student['email'] . '<br>';
        echo "<br></li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
