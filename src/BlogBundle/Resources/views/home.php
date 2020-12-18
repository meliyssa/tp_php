<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.png" type="image/png">
  <title>TP PHP Blog</title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="wrapper">
  <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("location: ../src/BlogBundle/Resources/views/login.php");
      exit;
    }
    $username = $_SESSION['username'];
    include_once('nav.php'); ?>
    <div class="articles">
      <?php define( '__ROOT__', dirname('../app/config/mysqli_connect.php'));
            require_once( __ROOT__ . '/mysqli_connect.php'); ?> 
      <?php
      $query = "SELECT * FROM article";
      $response = @mysqli_query($dbc, $query);
      if ($response) {
        while ($row = mysqli_fetch_array($response)) {
      ?>
          <article>
            <h1><?php echo $row['title']; ?></h1>
            <div class="meta-data">
              <span class="author">Auteur: <?php echo $row['author']; ?></span> -
              <span class="category">Catégorie: <?php echo $row['category']; ?></span> -
              <span class="category">Catégorie: <?php echo $row['category']; ?></span> -
              <span class="creation-date">Date: <?php echo $row['createdAt']; ?></span>
            </div>
            <p><?php echo $row['content']; ?></p>
          </article>
    
           <?php    }

          } ?>
    </div>
  </div>

</body>

</html>