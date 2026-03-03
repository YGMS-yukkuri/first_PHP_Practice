<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_colorPicker</title>
</head>

<?php
if (isset($_GET['colorInp'])) {
    $bgcolor = $_GET["colorInp"];
} else {
    $bgcolor = "#ffffff";
}
echo ("<p>" . "$bgcolor" . "</p>");
?>

<body style="
background-color:<?php echo ($bgcolor) ?>">
    <form action="" method="get">
        <h2>Choose bgColor</h2>
        <input type="color" name="colorInp" value="<?php echo($bgcolor); ?>">
        <button type="submit">set Color</button>
    </form>
</body>

</html>