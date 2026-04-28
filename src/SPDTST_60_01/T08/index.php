<?php
$filename = "log.json";
if(file_exists($filename)) {
    $file = file_get_contents($filename);
    $json = json_decode($file, true);
} else {
    $json = [];
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $body = $_POST["body"];
    $day = date("Y/m/d H:i:s");
    $array = [
        "name" => $name,
        "body" => $body,
        "day" => $day
    ];
    array_push($json,$array);
    $newK = json_encode($json,JSON_UNESCAPED_UNICODE);
    file_put_contents($filename,$newK);
    header("Location:". $_SERVER["PHP_SELF"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">名前</label>
        <input type="text" name="name" id=""required>
        <label for="">内容</label>
        <input type="text" name="body" id=""required>
        <button type="submit">送信</button>
    </form>
    <table>
        <tr>
            <th>名前</th>
            <th>内容</th>
            <th>投稿日時</th>
        </tr>
        <?php foreach ($json as $key => $value): ?>
            <tr>
                <td><?= $value["name"] ?></td>
                <td><?= $value["body"] ?></td>
                <td><?= $value["day"] ?></td>
            </tr>
        <? endforeach ?>
    </table>
</body>
</html>