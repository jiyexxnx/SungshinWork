<?php

$link = mysqli_connect('localhost','admin','admin','employees');

if(mysqli_connect_errno()){
    echo " Maria DB 접속에 실패 했습니다. 관리자에게 문의하세요. ";
    echo "<br>";
    echo mysqli_connect_error();
    exit();
}

$query = "
    SELECT d.dept_name, e.gender, COUNT(*) 
    FROM dept_emp de
    INNER JOIN departments d on d.dept_no = de.dept_no
    INNER JOIN employees e on e.emp_no = de.emp_no
    WHERE de.to_date='9999-01-01' 
    GROUP BY d.dept_name, e.gender
    ORDER BY d.dept_name, e.gender
";

$result = mysqli_query($link, $query);

$article = '';
while($row = mysqli_fetch_array($result)){
    $article .= '<tr><td>';
    $article .= $row['dept_name'];
    $article .= '</td><td>';
    $article .= $row['gender'];
    $article .= '</td><td>';
    $article .= $row['COUNT(*)'];
    $article .= '</td></tr>';
}

mysqli_free_result($result);
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 부서별, 성별 직원 수 </title>
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
        <h2><a href="index.php"> 직원 관리 시스템</a> | 부서별,성별 직원수 </h2>
        <table>
            <tr>
                <th>부서명</th>
                <th>성별</th>
                <th>직원수</th>
            </tr>
            <?= $article ?>
        </table>

</body>
</html>