<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
 <link rel="stylesheet" href="../../../../web/css/main.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
        </style>
</head>

<body>
<div class="wrapper">
<?php include ('nav.php') ?>
</div>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <!-- personalisation -->
        <ul>
            <li><a href="home.php">Vos articles</a></li>
            <li><a href="admin.php">Administration</a></li>
            <li><a href="pageArticle.php">Ajouter de nouveau article</a></li>

        </ul>
    <!-- End personalisation -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="../../../../web/js/nav.js"></script>
</body>

</html>