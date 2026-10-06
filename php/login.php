<?php

include "db.php";

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$sql = "SELECT * FROM students WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {

    echo "<h2>❌ Login Failed</h2>";
    echo "<p>Email is not registered.</p>";
    echo "<a href='../pages/login.html'>Try Again</a>";

} else {

    $student = $result->fetch_assoc();

    if ($password === $student["password"]) {

        echo "<h2>✅ Login Successful!</h2>";
        echo "<p>Welcome, " . htmlspecialchars($student["name"]) . "!</p>";
        echo "<a href='../pages/dashboard.html'>Go to Dashboard</a>";

    } else {

        echo "<h2>❌ Login Failed</h2>";
        echo "<p>Incorrect password.</p>";
        echo "<a href='../pages/login.html'>Try Again</a>";
    }
}

$stmt->close();
$conn->close();

?>