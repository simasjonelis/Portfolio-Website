<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vardas = trim($_POST['vardas']);
    $email = trim($_POST['email']);
    $project = trim($_POST['project']);
    $message = trim($_POST['message']);

    if (!empty($vardas) && !empty($email) && !empty($project) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "Jonelissimas@gmail.com";
            $subject = "Nauja zinute";
            $autorius = 'Nuo: ' . $vardas . ', ' . $email;
            $project = htmlspecialchars($project);
            $zinute = htmlspecialchars($message);
            $headers = "From: $email" . "\r\n" .
                       "Reply-To: $email" . "\r\n" .
                       "Content-Type: text/html; charset=UTF-8" . "\r\n";

            if (mail($to, $subject, $autorius, $project, $zinute, $headers)) {
                echo "<script>alert('Dekojame. Jusu zinute gauta.');</script>";
            } else {
                echo "<script>alert('Zinute nepavyko issiusti. Pabandykite veliau.');</script>";
            }
        } else {
            echo "<script>alert('Neteisingas el. pasto adresas.');</script>";
        }
    } else {
        echo "<script>alert('Visi laukai yra privalomi.');</script>";
    }
}
?>
