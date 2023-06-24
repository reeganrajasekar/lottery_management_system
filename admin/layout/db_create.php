<?php 
require("./db.php");

$sql = "CREATE TABLE IF NOT EXISTS member (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500) NOT NULL,
    mobile VARCHAR(500) NOT NULL UNIQUE,
    email VARCHAR(500) NOT NULL UNIQUE,
    password VARCHAR(500) NOT NULL,
    data VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table member created successfully<br>";
} else {
    echo "Error creating table: member";
}

$sql = "CREATE TABLE IF NOT EXISTS token (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    bill INT(6),
    time VARCHAR(125) NOT NULL,
    token json NOT NULL,
    memberid INT(6) NOT NULL,
    membername VARCHAR(500) NOT NULL,
    data VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table token created successfully<br>";
} else {
    echo "Error creating table: token";
}

$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(500) NOT NULL,
    password VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Admin created successfully<br>";
} else {
    echo "Error creating table: admin";
}


$sql = "INSERT INTO admin (email,password) VALUES ('admin@gmail.com','admin')";
if ($conn->query($sql) === TRUE) {
    echo "Table Admin Recorded successfully<br>";
} else {
    echo "Error Inserting table: admin";
}
?>