<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "forma";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $project = mysqli_real_escape_string($conn, $_POST['project']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($firstName) && !empty($email) && !empty($project) && !empty($message)) {
        $query = "INSERT INTO form (name, email, project, message) VALUES ('$firstName', '$email', '$project', '$message')";

        if (mysqli_query($conn, $query)) {
            echo "Form submitted successfully";
        } else {
            echo "Form not submitted: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required";
    }
}

mysqli_close($conn);
?>
