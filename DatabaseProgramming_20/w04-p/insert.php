<?php
  $link = mysqli_connect("localhost","root","1628313","carrot");
  mysqli_query($link, "
    INSERT INTO oat (
      title,
      description,
      created
    ) Value (
      'Welcome',
      'This site is where I write reviews about movies and dramas that I ve seen on Netflix.',
      now()
    )
    ");
 ?>
