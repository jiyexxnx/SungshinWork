<?php

$link = mysqli_connect('localhost','admin','admin','sakila');

$query = "
SELECT film.film_id, film.title, film_category.category_id, category.name 
FROM film 
INNER JOIN film_category ON film.film_id=film_category.film_id 
INNER JOIN category ON film_category.category_id=category.category_id 
ORDER BY film_id ASC;
";

$result = mysqli_query($link, $query);

$article = '';
while($row = mysqli_fetch_array($result)){
    $article .= '<tr><td>';
    $article .= $row['film_id'];
    $article .= '</td><td>';
    $article .= $row['title'];
    $article .= '</td><td>';
    $article .= $row['category_id'];
    $article .= '</td><td>';
    $article .= $row['name'];
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
        <h2><a href="index.php"> Home</a> | Movie&Category ListCheck </h2>
        <table border ="1">
            <tr>
                <th>Film Number</th>
                <th>title</th>
                <th>Category Number</th>
                <th>Category</th>
            </tr>
            <?= $article ?>
        </table>

</body>
</html>