<?php 
session_start();

if(isset($_SESSION["postdata"])) {
    $postdata = $_SESSION["postdata"];
} else {
    $postdata = [];
};

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $title = $_POST["title"];
    $comment = $_POST["comment"];

    $postedData = [
            "username" => $username,
            "title" => $title,
            "comment" => $comment
        ];

    array_push($postdata,$postedData);
    $_SESSION["postdata"] = $postdata;

    header("Location: ". $_SERVER["PHP_SELF"]);
    exit;
};

if (isset($_GET["resetBtn"])) {
    session_destroy();
    header("Location: ". $_SERVER["PHP_SELF"]);
    exit;
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body form:nth-child(1) {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        input {
            text-align: center;
        }

        thead {
            background-color: #a6deff;
        }

        th {
            border: 1px #000 solid;
            padding: 0 1em;
        }
    </style>
</head>


<body>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment">
        <button type="submit">送信(データを登録)</button>
    </form>


    <div>
        <h2>登録済データ一覧</h2>
        <?php if (isset($postdata[0])): ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach (array_keys($postdata[0]) as $key): ?>
                            <th><?php echo $key ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postdata as $data): ?>
                        <tr>
                            <?php foreach ($data as $value): ?>
                                <th><?php echo $value ?></th>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>データなし</h3>
        <?php endif ?>
    </div>
    <form action="" method="get">
        <button name="resetBtn" type="submit">データをリセット</button>
    </form>
</body>

</html>