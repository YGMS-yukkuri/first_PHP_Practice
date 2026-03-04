<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>連想配列</title>
</head>

<?php
$arr = [
    [
        "ID" => "1",
        "NAME" => "A",
        "EMAIL" => "a@a"
    ],
    [
        "ID" => "2",
        "NAME" => "B",
        "EMAIL" => "b@a"
    ],
    [
        "ID" => "3",
        "NAME" => "C",
        "EMAIL" => "c@a"
    ],
]

?>

<style>
    th {
        border: 1px #000 solid;
        padding: 0 2em;
    }
</style>

<body>
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($arr[0]) as $key): ?>
                    <th><?php echo $key ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arr as $user): ?>
                <tr>
                    <?php foreach($user as $val): ?>
                        <th><?php echo $val ?></th>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>