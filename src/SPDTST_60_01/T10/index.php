<?php 
$arr1 = [1,2,3,4,5,6,7,8,9];
$arr2 = [2,4,6,8];

$arr3 = array_intersect($arr1,$arr2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo("共通項:". implode(",",$arr3))
    ?>
</body>
</html>