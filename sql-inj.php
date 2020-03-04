<?php
$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass =  $_POST['password'];

    $query = "SELECT * FROM `users` WHERE name like '".$user."' and password like '". $pass. "'";
    // FOR LEARNING PURPOSE ONLY
    // echo $query; // ' or 1 #
    /*$stmt = $pdo->query($query);
    while ($row = $stmt->fetch())
    {
        echo $row['id'] . "<br>".$row['password'] . "<br>".$row['email'] . "<br>".$row['name'] . "<br>";
    }*/
    $stmt = $pdo->prepare('SELECT * FROM users WHERE name = :name AND password=:password');
    $stmt->execute(['name' => $user, 'password' => $pass]);
    while ($row = $stmt->fetch())
    {
        echo $row['id'] . "<br>".$row['password'] . "<br>".$row['email'] . "<br>".$row['name'] . "<br>";
    }
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
    <form method='post' action='sql-inj.php'>
        <input name='user' placeholder='user'> | <input name='password' placeholder='password'> | <button>send</button>
    </form>
</body>
</html>