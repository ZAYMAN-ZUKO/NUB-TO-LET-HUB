<?php
include "db.php";

$sql = "SELECT l.*, u.name AS owner_name FROM listings l JOIN users u ON l.owner_id = u.user_id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>" . $row['title'] . "</h3>";
    echo "Owner: " . $row['owner_name'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    echo "Rent: " . $row['rent'] . " BDT<br>";
    echo "Location: " . $row['location'] . "<br><hr>";
}
?>
