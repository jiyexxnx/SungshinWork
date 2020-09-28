<?php
  $link = mysqli_connect('localhost','root','1628313','carrot');
  $query = "SELECT * FROM oat";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }
  $article = array(
    'title' => 'Welcome',
    'description' => 'This site is where I write reviews about movies and dramas that Ive seen on Netflix.'
  );
  $update_link = '';
  $delete_link = '';
  $netflix = '';

  if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link,$_GET['id']);
    $query = $query = "SELECT * FROM oat LEFT JOIN netflix ON oat.netflix_id = netflix.id WHERE oat.id={$filtered_id}";
    $result = mysqli_query($link, $query);
    echo mysqli_error($link);
    $row = mysqli_fetch_array($result);
    $article ['title'] = htmlspecialchars ($row['title']);
    $article ['description'] = htmlspecialchars ($row['description']);
    $article ['favorit'] = htmlspecialchars($row['favorit']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '
      <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
      $netflix = "<p>my favorite is {$article['favorit']}</p>";
  }
 ?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jiyeon's Review</title>
  </head>
  <body>
    <h1><a href="index.php">Jiyeon's Netflix Review</a></h1>
    <a href = "netflix.php"> My favorite space </a>
    <ol><?= $list ?></ol>
    <a href="create.php">create</a>
    <?= $update_link ?>
    <?= $delete_link ?>
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
    <?= $netflix ?>
  </body>
</html>
