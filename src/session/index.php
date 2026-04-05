<?php
session_start();
$count = 0;

if (isset($_SESSION["count"])) {
    $count = $_SESSION["count"];
    $count = $count + 1;
} else {
    $count = 1;
}
$_SESSION["count"] = $count;

if (isset($_POST["reset"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
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
    <h1>
        <?php
        if (isset($_SESSION["count"])) {
            echo ($count . "回このサイトにアクセスしました");
        } else {
            echo ("セッションが無効です");
        }
        ?>
    </h1>

    <form method="post" action="">
        <label for="">セッションをリセット:</label>
        <button type="submit" name="reset">リセット</button>
    </form>
</body>

</html>