<?php
  $link = mysqli_connect('localhost', 'root', '1628313', 'carrot');
  $query = "SELECT * FROM oat";
  $result = mysqli_query($link, $query);

  echo '<h1>multi row</h1>';

  while ($row = mysqli_fetch_array($result)) {
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
  }
 ?>
