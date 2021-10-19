<?php

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];	
$type = $_POST['type'];


if(isset($_POST['sbmit'])){

$sql="INSERT INTO `users`(`name`, `username`, `password`, `type`)
VALUES ('$name'.'$username','$password','$type')";

if (mysqli_query($conn, $sql)) {
    echo "<script>";
    echo "alert('User created successfully');";
    echo 'window.location.href = "index.php?page=user_list";';
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>";
    echo "alert('User not created')";
    echo "</script>";
}
