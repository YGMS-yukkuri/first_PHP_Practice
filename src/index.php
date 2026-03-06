<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <h1>プロジェクトリスト</h1>
    <?php
    $dir = __DIR__;
    $ScanedFolders = scandir($dir);
    ?>
    <?php foreach ($ScanedFolders as $Folder): ?>
        <?php if ($Folder != "index.php" && $Folder != "." && $Folder != ".."): ?>
            <a href="<?php echo '/' . ($Folder) ?>"><?php echo ($Folder) ?></a>
        <?php endif ?>
    <?php endforeach ?>
</body>

</html>