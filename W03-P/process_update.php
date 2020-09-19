<?php
  $link = mysqli_connect("localhost", "root", "1628313", "oatly");
  $filtered = array (
       'id' => mysqli_real_escape_string($link, $_POST['id']),
       'title' => mysqli_real_escape_string($link,$_POST['title']),
       'description' => mysqli_real_escape_string($link, $_POST['description'])
);
  $query = "
    UPDATE oat
        SET
          title = '{$filtered['title']}',
          description = '{$filtered['description']}'
        WHERE
          id = '{$filtered['id']}'
";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'Update error. You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    echo 'Success. <a href="index.php">Back</a>';
  }
?>
