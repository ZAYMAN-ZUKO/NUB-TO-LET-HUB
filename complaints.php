<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complaints (user_id, message, status) VALUES ('$user_id', '$message', 'open')";
    if (mysqli_query($conn, $sql)) {
        echo "Complaint submitted!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    Message: <textarea name="message"></textarea><br>
    <button type="submit">Submit Complaint</button>
</form>
