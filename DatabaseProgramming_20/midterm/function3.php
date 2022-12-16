<?php

$link = mysqli_connect('localhost','admin','admin','sakila');

if(mysqli_connect_errno()){
    echo " Maria DB 접속에 실패 했습니다. 관리자에게 문의하세요. ";
    echo "<br>";
    echo mysqli_connect_error();
    exit();
}

$query = "
select A.film_id, A.title, B.*
from film A
join (
	select inv.film_id, count(ren.rental_id) times_rented
	from rental ren
	join inventory inv
	on ren.inventory_id = inv.inventory_id
	group by inv.film_id
) B
on A.film_id = B.film_id
order by B.times_rented desc;
";

$result = mysqli_query($link, $query);

$article = '';
while($row = mysqli_fetch_array($result)){
    $article .= '<tr><td>';
    $article .= $row['film_id'];
    $article .= '</td><td>';
    $article .= $row['title'];
    $article .= '</td><td>';
    $article .= $row['film_id'];
    $article .= '</td><td>';
    $article .= $row['times_rented'];
    $article .= '</td></tr>';
}

mysqli_free_result($result);
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Movie Category List & Check </title>
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
        <h2><a href="index.php"> Home</a> | The most frequently rented movies </h2>

        <table border ="1">
            <tr>
                <th>Film id</th>
                <th>title</th>
                <th>Film id</th>
                <th>times rented</th>
            </tr>
            <?= $article ?>
        </table>

</body>
</html>