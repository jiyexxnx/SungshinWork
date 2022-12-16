<?php
  $link = mysqli_connect("localhost", "root", "1628313", "carrot");
  $filtered = array (
       'favorit' => mysqli_real_escape_string($link, $_POST['favorit']),
       'ncode' => mysqli_real_escape_string($link, $_POST['ncode'])
    );
  $query = "
    INSERT INTO netflix
      (favorit, ncode)
      VALUES (
        '{$filtered['favorit']}',
        '{$filtered['ncode']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo 'Create error. You need to contact to Jiyeon.';
    error_log(mysqli_error($link));
  } else {
    header('Location: netflix.php');
  }
?>
