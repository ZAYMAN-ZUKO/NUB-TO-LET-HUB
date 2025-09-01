<?php
session_start();

// ✅ Redirect to login if user not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUB To-Let Hub - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #0044cc;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background: #333;
            padding: 10px;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
        .logout-btn {
            float: right;
            background: red;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <header>
        <h1>🏠 NUB To-Let Hub</h1>
        <p>Welcome, <strong><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; ?></strong>!</p>
        <a class="logout-btn" href="logout.php">Logout</a>
    </header>

    <nav>
        <a href="listings.php">Listings</a>
        <a href="rent_requests.php">Rent Requests</a>
        <a href="reviews.php">Reviews</a>
        <a href="complaints.php">Complaints</a>
    </nav>

    <div class="container">
        <h2>Dashboard</h2>
        <p>Select an option from the menu above to manage your To-Let activities.</p>
    </div>
</body>
</html>
