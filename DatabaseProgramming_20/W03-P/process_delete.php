<?php
  $link = mysqli_connect("localhost", "root", "1628313", "oatly");
  settype($_POST['id'], 'int');
  $filtered = array (
       'id' => mysqli_real_escape_string($link, $_POST['id'])
);
  $query = "
    DELETE
      FROM oat
      WHERE id = '{$filtered['id']}'
  ";


  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'Delete error. You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    echo 'Success. <a href="index.php">Back</a>';
  }
?>
