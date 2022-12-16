<?php
  $link = mysqli_connect("localhost", "root", "1628313", "oatly");
  $filtered = array (
       'title' => mysqli_real_escape_string($link,$_POST['title']),
       'description' => mysqli_real_escape_string($link, $_POST['description'])
);
  $query = "
    INSERT INTO oat
      (title, description, created)
      VALUES (
        '{$filtered['title']}',
        '{$filtered['description']}',
        now()
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'Create error. You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    echo 'Success. <a href="index.php">Back</a>';
  }
?>
