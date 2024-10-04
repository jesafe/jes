<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    
    $file = 'data.txt';
    $data = "Name: $name\nEmail: $email\nMessage: $message\n\n";
    file_put_contents($file, $data, FILE_APPEND);

    
    echo "Thank you for your message, $name. We will get back to you soon!";
} else {
    echo "Invalid request method.";
}
?>

