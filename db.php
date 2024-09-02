<php

 $hostName = "localhost";
 $dbuster = "root";
 $dbPassword = "";
 $dbName = "login_registration";

 $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

 if (!$conn) {

    die("error;");

 }
    echo "connected succesfully";

 }
