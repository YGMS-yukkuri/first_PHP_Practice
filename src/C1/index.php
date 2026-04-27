<?php
$json = json_decode(file_get_contents("bbs.json"), true);

if ($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST["name"])) {
    $newData = [];
    
    $id = $json[array_key_last($json)]["id"] + 1;
    $username = $_POST["name"];
    $Rmessage = $_POST["message"];


    $newData = [
        "id" => $id,
        "name" => $username,
        "message" => $Rmessage
    ];
    array_push($json,$newData);

    $newJson = json_encode($json, JSON_UNESCAPED_UNICODE);
    file_put_contents("bbs.json", $newJson);
    header("Location: ". $_SERVER["REQUEST_URI"]);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post">
        <label for="">ユーザーネーム</label>
        <input type="text" name="name" required>
        <label for="">メッセージ</label>
        <input type="text" name="message" id="message" maxlength="100" required>
        <button type="submit">送信</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ユーザーネーム</th>
                <th>メッセージ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_reverse($json) as $post): ?>
                <tr>
                    <th><?php echo ($post["name"]) ?></th>
                    <td><?php echo ($post["message"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>