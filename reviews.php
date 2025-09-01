<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listing_id = $_POST['listing_id'];
    $student_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (listing_id, student_id, rating, comment) VALUES ('$listing_id','$student_id','$rating','$comment')";
    if (mysqli_query($conn, $sql)) {
        echo "Review added!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    Listing ID: <input type="text" name="listing_id"><br>
    Rating (1-5): <input type="number" name="rating" min="1" max="5"><br>
    Comment: <textarea name="comment"></textarea><br>
    <button type="submit">Submit Review</button>
</form>
