<?php
$servername = "localhost";
$username = "root";
$password = "password2";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
$conn->connect_error;

// Create database
$sql = "CREATE DATABASE assignment8";
$conn->query($sql);

// sql to create table
$sql = "CREATE TABLE assignment8.Items (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(40),
  Type VARCHAR(40),
  Make VARCHAR(40),
  Model VARCHAR(40),
  Brand VARCHAR(40),
  Description VARCHAR(60)
  )";

$conn->query($sql);

$handle = fopen("input.csv", "r");

// Use fgetcsv function along with while loop to get all of the rows in the file
fgets($handle);
while (($data = fgetcsv($handle, 1000, ','))) {
  $sql = 'INSERT INTO assignment8.Items (Name, Type, Make, Model, Brand, Description)
  VALUES ("'.$data[1].'", "'.$data[2].'","'.$data[3].'","'.$data[4].'","'.$data[5].'", "'.$data[6].'")';

  $conn->query($sql);
}

$conn->close();

?>