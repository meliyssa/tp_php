<?php
DEFINE('DB_USER', 'coco');
DEFINE('DB_PASSWORD', 'coco');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'php_tp');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,)
    or die('Could not connect to MySQL:' .
        mysqli_connect_error());

$id = $_REQUEST['id'];

$query = "SELECT * FROM article WHERE id='" . $id . "'";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
$row = mysqli_fetch_assoc($result);

// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../web/css/main.css">
<title>Modifier Article</title>
</head>
<body>
    <div class="wrapper">
        <?php require('nav.php') ?>
    </div>

    <?php
    $status ="";
   
    if (isset($_POST['update'])) {
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $author = $_REQUEST['author'];
        $category = $_REQUEST['category'];
        $content = $_REQUEST['content'];

        $update = "UPDATE article SET `title`= '" . $title . "',`author` = '" . $author . "', `category` = '" . $category . "', `content` = '" . $content . "'  WHERE `id` = '" . $id . "'";
        mysqli_query($dbc, $update) or die(mysqli_error($dbc));
        $status = "Enregistrement effectuer avec succès. <br> <br> 
        <a href='admin.php'> Admin PHP </a>";
        echo $status;
        header("location: admin.php");
    } else { ?>
        <div>
            <form method="post" action="modifierArticle.php">
                <input type="hidden" name="new" value="1">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <label>Titre</label> <input class="ajoutTitre" type="text" name="title" Value="<?php echo $row['title']; ?>"> <br> <br>
                <label>Auteur</label> <input type="text" name="author" Value="<?php echo $row['author']; ?>"> <br> <br>
                <label>catégorie</label> <input type="text" name="category" Value="<?php echo $row['category']; ?>"> <br> <br>
                <!-- <label>Date</label> <input type="text" name="createdAt"> <br> <br> -->
                <label>contenue</label> <textarea name="content" id="" cols="30" rows="10"><?php echo $row['content']; ?></textarea> <br> <br>
                <input type="submit" name="update" value="UPDATE">
            </form>
        <?php }

        ?>
        </div>
</body>

</html>