<?php
  $link = mysqli_connect("localhost", "root", "1628313", "carrot");
  $filtered = array (
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'favorit' => mysqli_real_escape_string($link, $_POST['favorit']),
    'ncode' => mysqli_real_escape_string($link, $_POST['ncode'])

);
  $query = "
    UPDATE netflix
        SET
          favorit = '{$filtered['favorit']}',
          ncode = '{$filtered['ncode']}'
        WHERE
          id = '{$filtered['id']}'
";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'Update error. You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    header('Location:netflix.php');
  }
?>
