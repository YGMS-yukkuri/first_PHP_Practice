<?php session_start();

if (isset($_SESSION["logon"])) {
} else {
    $_SESSION["logon"] = false;
}
$password = "password123";


if (isset($_GET['password'])) {
    if ($_GET['password'] == $password) {
        $_SESSION["logon"] = true;
        header("Location: " . $_SERVER["PHP_SELF"]);
    } else $_SESSION["logon"] = false;
}

if (isset($_GET["logoff"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php if ($_SESSION["logon"]): ?>

    <body>
        <h1>WELCOME!</h1>
        <h2>this is a seacret content</h2>
        <form action="" method="get">
            <button name="logoff">Logout</button>
        </form>
    </body>

<?php else: ?>

    <body>
        <form action="" method="get">
            <label for="passinp">Password:</label>
            <input type="password" name="password" id="passinp">
            <button type="submit">Auth</button>
        </form>
    </body>
<?php endif; ?>

</html>