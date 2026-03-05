<?php
$Arraydata = json_decode(file_get_contents("datas.json"), true);

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $comment = $_POST["comment"];
    $datemili = new DateTime();
    $date = $datemili->modify("+9hours")->format("Y/m/d H:i:s");

    $arr = [
        "username" => $username,
        "comment" => $comment,
        "date" => $date
    ];
    array_push($Arraydata, $arr);
    $writeJson = json_encode($Arraydata, JSON_UNESCAPED_UNICODE);

    file_put_contents("datas.json", $writeJson);

    header("Location: ", $_SERVER["PHP_SELF"]);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json操作</title>
</head>

<body>
    <h1>json一覧</h1>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username" id="username" required>
        <label for="comment">comment</label>
        <input type="comment" name="comment" id="comment" required>
        <button type="submit">jsonに登録</button>
    </form>
    <?php if (isset($Arraydata[0])): ?>
        <table>
            <thead>
                <tr>
                    <?php foreach (array_keys($Arraydata[0]) as $key): ?>
                        <th><?php echo ($key) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Arraydata as $user): ?>
                    <tr>
                        <?php foreach ($user as $value): ?>
                            <th><?php echo (htmlspecialchars($value)) ?></th>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</body>

</html>