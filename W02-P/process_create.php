<?php
  $link = mysqli_connect("localhost","root","1628313","oatly");

  $query = "
    INSERT INTO oat(
      title, description, created
      ) VALUES (
        '{$_POST['title']}',
        '{$_POST['description']}',
        now()
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    echo 'Success. <a href="index.php">Comeback</a>';
  }

 ?>
