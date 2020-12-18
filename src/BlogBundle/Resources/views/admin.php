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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'aministration</title>
    <link rel="stylesheet" href="../../../../web/css/main.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'nav.php'; ?>

        <div class="articles">
            <?php require_once '../../../../app/config/mysqli_connect.php'; ?>
            <?php
            $query = "SELECT * FROM article";
            $response = @mysqli_query($dbc, $query);
            if ($response) {
                while ($row = mysqli_fetch_array($response)) {
                    $username = $_SESSION["username"];
                    $createdBy = $row['createdBy'];
                    if ($username == $createdBy) {

            ?>
                    <article>
                        <h1><?php echo $row['title']; ?></h1>
                        <div class="meta-data">
                            <span class="author">Auteur: <?php echo $row['author']; ?></span> -
                            <span class="category">Catégorie: <?php echo $row['category']; ?></span> -
                            <span class="creation-date">Date: <?php echo $row['createdAt']; ?></span> -
                            <span class="creation-by">createdBy: <?php echo $row['createdBy']; ?></span>
                        </div>
                        <p><?php echo $row['content']; ?></p>
                        <p align="center">
                            <a href="modifierArticle.php?id=<?php echo $row['id'];?>" >Modifier</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" >Supprimer</a>
                        </p>
                    </article>
                    
            <?php    }
            }
            }  ?>
        </div>
    </div>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
</body>

</html>