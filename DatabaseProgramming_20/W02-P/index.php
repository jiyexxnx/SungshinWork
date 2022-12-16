<?php
  $link = mysqli_connect("localhost","root","1628313","oatly");
  $query = "SELECT * FROM oat";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

$article = array(
  'title' => 'Introduce',
  'description' => 'Jiyeon s Netflix Records.'
);

if( isset($_GET['id']) ) {
  $query = "SELECT * FROM oat WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jiyeon's Record</title>
  </head>
  <body>
    <h1><a href="index.php"> Jiyeon's Netflix Records</a></h1>
    <ol> <?= $list ?> </ol>
    <a href="create.php">Create</a>
    <h2> <?= $article['title'] ?></h2>
    <?= $article['description'] ?>
  </body>
  </html>
