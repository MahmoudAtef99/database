<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registeration";

$email = $_POST["login-email"];
$pass = md5($_POST["login-pass"]);
$flag = false;



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        if($row["email"] === $email && $row["password"] === $pass){
            echo "WELCOME " . strtoupper($row["name"]) . " !" . "<br>";
            $flag = true;
            break;
        }
    }
} else {
    echo "TABLE IS EMPTY !";
}
if(!$flag){
  echo "USER NOT FOUND !";
}

$conn->close();
?>
