<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registeration";

$name = $_POST["name"];
$email = $_POST["email"];


$pass = md5($_POST["pass"]);
$flag = true;


$conn = new mysqli($servername, $username, $password, $dbname);
$connect = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        if($row["email"] === $email){
            echo "Email Already Exists !";
            $flag = false;
            break;
        }
    }
  }
if($flag) {
  $sql2 = "INSERT INTO users (name, email, password) VALUES
  ('$name', '$email', '$pass')";
  if ($connect->query($sql2) === TRUE) {
    echo "Registered Successfully !";
  } else {
    echo "Error: " . $sql2 . "<br>" . $connect->error;
  }
}
$connect->close();
$conn->close();
?>
