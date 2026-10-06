<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "studenthub"
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO students
        (name, email, course)
        VALUES
        ('PHP Test', 'phptest@gmail.com', 'Data Science')";

if ($conn->query($sql) === TRUE) {

    echo "DATA INSERTED SUCCESSFULLY";

} else {

    echo "INSERT ERROR: " . $conn->error;

}

$conn->close();

?>