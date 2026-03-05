<?php
$Arraydata = json_decode(file_get_contents("datas.json"), true);

if (isset($_POST["Title"])) {
    $Title = $_POST["Title"];
    $comment = $_POST["comment"];
    $datemili = new DateTime();
    $date = $datemili->modify("+9hours")->format("Y/m/d H:i:s");

    $arr = [
        "タイトル" => $Title,
        "内容" => $comment,
        "データ登録日時" => $date,
        "済" => false,
        "完了日時" => ""
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

if (isset($_POST["successedIdx"])) {
    $changeSuccessIdx = $_POST["successedIdx"];

    if (isset($_POST["successed"])) {
        $Arraydata[$changeSuccessIdx]["済"] = false;

        $Arraydata[$changeSuccessIdx]["完了日時"] = "";
    } else {
        $Arraydata[$changeSuccessIdx]["済"] = true;
        $datemili = new DateTime();
        $date = $datemili->modify("+9hours")->format("Y/m/d H:i:s");

        $Arraydata[$changeSuccessIdx]["完了日時"] = $date;
    }

    $writeJson = json_encode($Arraydata, JSON_UNESCAPED_UNICODE);

    file_put_contents("datas.json", $writeJson);

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json操作</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>ToDo</h1>
    <form action="" method="post" class="reg">
        <label for="Title">タイトル</label>
        <input type="text" name="Title" id="Title" required>
        <label for="comment">内容</label>
        <textarea type="comment" name="comment" id="comment" required></textarea>
        <button type="submit">予定を登録</button>
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
                <?php foreach ($Arraydata as $index => $titles): ?>
                    <!-- 読み込んだ配列からそのインデックスと内容をそれぞれForEachで格納 -->
                    <tr>

                        <?php foreach ($titles as $value): ?>
                            <!-- 上で読み込んだ内容からキー1つ1つのvalueをForEachで取得 -->

                            <?php if ($value === true || $value === false): ?>
                                <!-- もし読み込んだvalueがbool(チェックボックスのデータ)なら -->
                                <td><!-- チェックボックスの生成 -->
                                    <form action="" method="post" class="successlabel">
                                        <input type="checkbox" name="successed" id="successed"
                                            value="true" <?= $titles["済"] ? 'checked' : '' ?>>
                                        <input type="hidden" name="successedIdx" value="<?php echo ($index) ?>">
                                        <button type="submit"></button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <!-- valueがbool(チェックボックスデータ)でない場合 -->
                                <td><?php echo (htmlspecialchars($value)) ?></td>
                                <!-- 内容をtableに表示 -->
                            <?php endif ?>

                        <?php endforeach // titleデータのForEachの終了 
                        ?>

                        <td><!-- 削除ボタン部分 -->
                            <form action="" method="post" onsubmit="return confirm(`<?php echo ('タイトル' . $titles['タイトル'] . 'の' . $titles['内容'] . 'を削除しますか？') ?>`)">
                                <input type="hidden" name="deleteIdx" value="<?php echo ($index) ?>">
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach // ArrayのForEachの終了 
                ?>
            </tbody>
        </table>

    <?php else: // もしデータがないとき?>
        <h2>登録されたデータはありません</h2>
    <?php endif ?>
</body>

</html>