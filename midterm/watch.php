<?php
    $link = mysqli_connect("localhost", "admin", "admin", "sakila");
    $query = "SELECT * FROM category  ";
    
    if(isset($_POST['name'])) {
        $first_name = mysqli_real_escape_string($link, $_POST['name']);
        $query = "SELECT * FROM category WHERE category_id = '{$name}'";
    } 
   
   
    $result = mysqli_query($link, $query);
    //print_r($result);  
    //print_r($row);
    $saki_info = '';
    while($row = mysqli_fetch_array($result)) {
    $saki_info .= '<tr>';
    $saki_info .= '<td>'.$row['category_id'].'</td>';
    $saki_info .= '<td>'.$row['name'].'</td>'; 
    $saki_info .= '<td>'.$row['last_update'].'</td>';   
    $saki_info .= '</tr>';
  }  

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to My store</title>
</head>

<body>
    <h2><a href="index.php"> Home</a> | Category Check </h2>
   * Just Category check please.
    <table border="1">
        <tr>
            <th>category id</th>
            <th>name</th>
            <th>last_update</th>
        </tr>
        <?= $saki_info ?>
    </table>
</body>

</html>