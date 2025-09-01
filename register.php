<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $student_id = ($_POST['student_id'] != "") ? $_POST['student_id'] : NULL;

    $sql = "INSERT INTO users (name,email,password,role,student_id) VALUES ('$name','$email','$password','$role','$student_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    Role: 
    <select name="role">
        <option value="student">Student</option>
        <option value="owner">Owner</option>
        <option value="admin">Admin</option>
    </select><br>
    Student ID: <input type="text" name="student_id"><br>
    <button type="submit">Register</button>
</form>
