<?php

$link = mysqli_connect('localhost','admin','admin','sakila');

if(mysqli_connect_errno()){
    echo " Maria DB 접속에 실패 했습니다. 관리자에게 문의하세요. ";
    echo "<br>";
    echo mysqli_connect_error();
    exit();
}

$query = "
        select a.rental_id, a.customer_id, b.film_id, b.inventory_id 
        from rental a 
        left join inventory b on a.inventory_id = b.inventory_id;
";

$result = mysqli_query($link, $query);

$article = '';
while($row = mysqli_fetch_array($result)){
    $article .= '<tr><td>';
    $article .= $row['rental_id'];
    $article .= '</td><td>';
    $article .= $row['customer_id'];
    $article .= '</td><td>';
    $article .= $row['film_id'];
    $article .= '</td><td>';
    $article .= $row['inventory_id'];
    $article .= '</td></tr>';
}

mysqli_free_result($result);
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Rent List & Check </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php"> Home</a> | Current Rental List & Check </h2>
        <h3> Names are not displayed to prevent personal information leakage.</h3>
        <table border ="1">
            <tr>
                <th>Rental Number</th>
                <th>Customer Number</th>
                <th>Movie Number</th>
                <th>Inventory Number</th>
            </tr>
            <?= $article ?>
        </table>

</body>
</html>



