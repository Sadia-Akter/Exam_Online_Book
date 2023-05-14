<?php

$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $bookname = test_input($_POST["bookname"]);
    $publishername = test_input($_POST["publishername"]);
    $publisherage = test_input($_POST["publisherage"]);


    $sql = "INSERT INTO books (bookname, publishername, publisherage) VALUES ('$bookname', '$publishername', '$publisherage')";

    if ($conn->query($sql) === TRUE) {
        echo "Data added successfully";
    } else {
        echo "Error adding data: " . $conn->error;
    }
}


$conn->close();


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

