<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "forma";

 $conn = mysqli_connect($server, $username, $password, $dbname);

 if(isset($_POST['submit'])){
     if(!empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['project']) && !empty($_POST['message'])){
         $firstName = $_POST['firstName'];
         $email = $_POST['email'];
         $project = $_POST['project'];
         $message = $_POST['message'];

         $query = "insert into form ( name, email, project, message) values('$firstName' , '$email' , '$project' , '$message')";

         $run = mysqli_query($conn,$query) or die(mysqli_error());

         if($run){
             echo"Form submitted successfully";
         }else{
             echo"Form not submitted";
         }

     }else{
         echo"all fields required";
     }
 }

