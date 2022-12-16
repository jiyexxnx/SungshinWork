<?php
$link = mysqli_connect('localhost','root','1628313','carrot');

$query = "SELECT * FROM netflix";
$result = mysqli_query($link, $query);
$netflix_info = '';

while ($row = mysqli_fetch_array($result)) {
  $filtered = array(
    'id' => htmlspecialchars($row['id']),
    'favorit' => htmlspecialchars($row['favorit']),
    'ncode' => htmlspecialchars($row['ncode'])
  );

  $netflix_info .= '<tr>';
  $netflix_info .= '<td>'.$filtered['id'].'</td>';
  $netflix_info .= '<td>'.$filtered['favorit'].'</td>';
  $netflix_info .= '<td>'.$filtered['ncode'].'</td>';
  $netflix_info .= '<td><a href="netflix.php?id='.$filtered['id'].'">Update</a></td>';
  $netflix_info .= '<td>
            <form action="process_delete_netflix.php" method="post">
            <input type="hidden" name="id" value="'.$filtered['id'].'">
            <input type="submit" value="delete">
            </form></td>
            ';
  $netflix_info .= '</tr>';
};

$escaped = array(
  'favorit' => '',
  'ncode' => ''
);

 $form_action = 'process_create_netflix.php';
 $label_submit = 'Create';
 $form_id = '';

if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
  settype($filtered_id, 'integer');
  $query = "SELECT * FROM netflix WHERE id = {$filtered_id}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $escaped['favorit'] = htmlspecialchars($row['favorit']);
  $escaped['ncode'] = htmlspecialchars($row['ncode']);

  $form_action = 'process_update_netflix.php';
  $label_submit = 'Update';
  $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
};

 ?>

 <!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <title> my favorite space </title>
  </head>
  <body>
   <h1><a href ="index.php">My favorite netflix TV or Show</a></h1>
   <p><a href = "index.php">Back</a><p>

   <table border ="1">
     <tr>
       <th> ID </th>
       <th> favorit</th>
       <th> ncode</th>
       <th> Update</th>
       <th> delete</th>
     </tr>
     <?=$netflix_info?>
   </table>
   <br>
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?>
            <label for="fname">favorit:</label><br>
            <input type="text" id="favorit" name="favorit" placeholder="favorit"
            value="<?=$escaped['favorit']?>"><br>
            <label for="lname">ncode:</label><br>
            <input type="text" id="ncode" name="ncode" placeholder="ncode"
            value="<?=$escaped['ncode']?>"><br><br>
            <input type="submit" value="<?=$label_submit?>">
        </form>
  </body>
</html>
