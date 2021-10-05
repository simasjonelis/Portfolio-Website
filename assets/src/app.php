<?php 
    $vardas = trim($_POST['vardas']);
    $email = trim($_POST['email']);
    $project = trim($_POST['project']);
    $message = trim($_POST['message']);

    if(!empty($vardas) && !empty($email) && !empty($project) && !empty($message)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $from = "$email";
            $to = "Jonelissimas@gmail.com";
            $subject = "Nauja zinute";
            $autorius = 'Nuo:' . $vardas . ',' . $email;
            $project = htmlspecialchars($project);
            $zinute = htmlspecialchars($message);
            mail($to, $subject, $autorius, $project, $zinute, $from);
            echo"<script>alert('Dekojame.Jusu zinute gauta.');</script>";
        }
    }