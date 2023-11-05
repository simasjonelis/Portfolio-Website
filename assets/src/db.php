<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "forma");

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    echo "Atsiprasome svetaine susidure su problema\n";
    echo 'Klaida: ' . $mysqli->connect_error . '\n';
    exit();
}

// Use prepared statements to prevent SQL injection
if ($stmt = $mysqli->prepare("INSERT INTO klientai (vardas, email, message) VALUES (?, ?, ?)")) {
    // Bind parameters
    $stmt->bind_param("sss", $_POST['vardas'], $_POST['email'], $_POST['message']);

    // Execute the query
    if ($stmt->execute()) {
        echo "Duomenys ikelti sekmingai.";
    } else {
        echo "Klaida ikeliant duomenis: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Klaida ruosiant uzklausa: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
