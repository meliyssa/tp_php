<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin" !== true]) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../web/css/main.css">
    <title>Saisir Data</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include 'nav.php';
        ?>
    </div>
    <form method="post" action="pageArticle.php">
        Title : <input type="text" name="titre"> <br> <br>
        Auteur : <input type="text" name="auteur"> <br> <br>
        Categorie : <input type="text" name="categorie"> <br> <br>
        Content : <textarea name="content" cols="30" rows="10"></textarea> <br><br>
        <input type="submit" value="OK" name="valider">
    </form>
    <?php
    if (isset($_POST['valider'])) {
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $categorie = $_POST['categorie'];
        $content = $_POST['content'];

        $date = date("y-m-d");

        $servername = 'localhost';
        $username = 'coco';
        $password = 'coco';
        $dbname = 'php_tp';

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO article(title, author, category, content, createdAt) VALUES ('" . $titre . "', '" . $auteur . "', '" . $categorie . "', '" . $content . "', '" . $date . "')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created succesfully";
        } else {
            echo "Error" . $sql . mysqli_error($conn);
        }
        $conn->close();
    }
    ?>

</body>

</html>