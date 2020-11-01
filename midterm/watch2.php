<?php
    $link = mysqli_connect("localhost", "admin", "admin", "sakila");
    $query = "SELECT * FROM actor_info ";
    
    if(isset($_POST['first_name'])) {
        $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $query = "SELECT * FROM actor_info WHERE first_name = '{$first_name}'";
    } 
   
   
    $result = mysqli_query($link, $query);
    //print_r($result);  
    //print_r($row);
    $saki_info = '';
    while($row = mysqli_fetch_array($result)) {
    $saki_info .= '<tr>';
    $saki_info .= '<td>'.$row['actor_id'].'</td>';
    $saki_info .= '<td>'.$row['first_name'].'</td>'; 
    $saki_info .= '<td>'.$row['last_name'].'</td>'; 
    $saki_info .= '<td>'.$row['film_info'].'</td>';   
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
    <h2><a href="index.php"> Home</a> | Actor filmography </h2>
    
    <form action="watch2.php" method="POST">
    <label>이름 검색:</label>
    <input type="text" name="first_name" placeholder="firstname">
    <input type="submit" value="submit"><br><br>
    </form>


    <table border="1">
        <tr>
            <th>actor_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>film_info</th>
        </tr>
        <?= $saki_info ?>
    </table>
</body>

</html>