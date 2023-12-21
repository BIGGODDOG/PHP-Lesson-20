<?php
define("HOST", "localhost");
define("DATABASE", "classicmodels");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", "");

if (isset($_POST["name"]) && isset($_POST["text"])) {
    $sql = "INSERT INTO messages (user, text) VALUES (?, ?);";
    $params = array($_POST["name"], $_POST["text"]);
    
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET, USER, PASSWORD);

    $result = $pdo->prepare($sql);
    $result->execute($params);
}

if (isset($_POST["name"])) {
    setcookie("name", $_POST["name"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Database on anonymous messages</h1>
    <form action="index.php" method="post" name="addMessage">
        <input type="text" name="name" placeholder="Name" value="<?= isset($_COOKIE["name"]) ? $_COOKIE["name"] : "" ?>">
        <br>
        <input type="text" name="text" placeholder="Your text" size="50">
        <br>
        <button type="submit">Send message</button>
    </form>
</body>

</html>