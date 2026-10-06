<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $course = trim($_POST["course"]);
    $year = trim($_POST["year"]);
    $gender = trim($_POST["gender"]);
    $terms = isset($_POST["terms"]) ? "Accepted" : "Not Accepted";

    if (
        empty($name) ||
        empty($email) ||
        empty($mobile) ||
        empty($password) ||
        empty($confirm_password) ||
        empty($course) ||
        empty($year) ||
        empty($gender)
    ) {

        die("Please fill all required fields.");

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        die("Invalid email address.");

    }

    if (!preg_match("/^[0-9]{10}$/", $mobile)) {

        die("Mobile number must contain exactly 10 digits.");

    }



    if ($password !== $confirm_password) {

        die("Passwords do not match.");

    }


    $allowedGender = [
        "Male",
        "Female",
        "Other"
    ];

    if (!in_array($gender, $allowedGender)) {

        die("Invalid gender.");

    }


    // Check terms

    if (!isset($_POST["terms"])) {

        die("Please accept the Terms and Conditions.");

    }


    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO students
            (name, email, mobile, password, course, year, gender, terms)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);


    $stmt->bind_param(
        "ssssssss",
        $name,
        $email,
        $mobile,
        $hashedPassword,
        $course,
        $year,
        $gender,
        $terms
    );


    if ($stmt->execute()) 
        {

        echo "<h2>Registration Successful!</h2>";
        echo "<p>Your complete information has been saved in MySQL.</p>";
        echo "<a href='../pages/register.html'>Register Another Student</a>";

    } else {

        echo "Database Error: " . $stmt->error;

    }

    $stmt->close();
    $conn->close();

}

?>