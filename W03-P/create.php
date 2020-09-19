<?php
  $link = mysqli_connect('localhost','root','1628313','oatly');
  $query = "SELECT * FROM oat";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }
  $article = array(
    'title' => 'Welcome',
    'description' => 'This site is where I write reviews about movies and dramas that Ive seen on Netflix.'
  );
  if(isset($_GET['id'])) {
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
    <title>Jiyeon's Review</title>
  </head>
  <body>
    <h1><a href="index.php">Jiyeon's Netflix Review</a></h1>
    <ol><?= $list ?></ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <pre><textarea name="description" placeholder="description"></textarea></pre>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
