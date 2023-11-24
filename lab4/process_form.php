<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $pincode = $_POST["pincode"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO details (name, phone, email, state, city, country, pincode)
            VALUES ('$name', '$phone', '$email', '$state', '$city', '$country', '$pincode')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
    
} else {
    echo "Form not submitted.";
}
?>
