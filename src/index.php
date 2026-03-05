<?php
$Arraydata = json_decode(file_get_contents("datas.json"), true);

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $comment = $_POST["comment"];
    $datemili = new DateTime();
    $date = $datemili->modify("+9hours")->format("Y/m/d H:i:s");

    $arr = [
        "ユーザー名" => $username,
        "内容" => $comment,
        "データ登録日時" => $date
    ];
    array_push($Arraydata, $arr);
    $writeJson = json_encode($Arraydata, JSON_UNESCAPED_UNICODE);

    file_put_contents("datas.json", $writeJson);

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
};

if (isset($_POST["deleteIdx"])) {
    $focusIdx = (int)$_POST["deleteIdx"];

    if (isset($Arraydata[$focusIdx])) {
        array_splice($Arraydata, $focusIdx, 1);
        $writeJson = json_encode($Arraydata, JSON_UNESCAPED_UNICODE);

        file_put_contents("datas.json", $writeJson);

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
};
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json操作</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 30px 0;
        }

        th {
            border: 1px solid #000;
            padding: 0 2em;
        }

        td {
            border: 1px solid #000;
            padding: 0 1em;
            text-align: center;
        }

        td:nth-child(4) {
            padding: 1px;
        }

        td form {
            width: 100%;
            padding: 0;
        }

        td button {
            width: 100%;
            background-color: #ffc3c3;
            cursor: pointer;
        }

        td button:hover {
            background-color: #d4a2a2;
        }
    </style>

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
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Arraydata as $index => $user): ?>
                    <tr>
                        <?php foreach ($user as $value): ?>
                            <td><?php echo (htmlspecialchars($value)) ?></td>
                        <?php endforeach ?>

                        <td>
                            <form action="" method="post" onsubmit="return confirm(`<?php echo ($user['ユーザー名'] . 'さんの' . $user['内容'] . 'を削除しますか？') ?>`)">
                                <input type="hidden" name="deleteIdx" value="<?php echo ($index) ?>">
                                <button type="submit">削除</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</body>

</html>