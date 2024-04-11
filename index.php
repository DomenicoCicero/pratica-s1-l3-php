<?php

$host = 'localhost';
$db = 'praticas1l3';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// comando che connette al db
$pdo = new PDO($dsn, $user, $pass, $options);

// selezione di tutte le righe dalla tabela
$stmt = $pdo->query('SELECT * FROM users');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">USERS</h1>
    <a href='http://localhost/pratica-s1-l3-php/add.php/' class="btn btn-primary my-3 ms-4">Add New User</a>
    <?php
     foreach ($stmt as $row) {
          echo "  <div class='card'>
    <div class='card-body'>
    <h2 class='card-title'>$row[username]</h2>
    <p class='card-text'><span class='fw-semibold'>Email: </span>$row[email]</p>
    <p class='card-text'><span class='fw-semibold'>Password: </span>$row[password]</p>
    <a href='http://localhost/pratica-s1-l3-php/details.php/?id=$row[id]' class='d-block'>Visualizza i dettagli</a>
    <a href='http://localhost/pratica-s1-l3-php/edit.php/?id=".urlencode($row['id'])."&username=".urlencode($row['username'])."&email=".urlencode($row['email'])."&password=".urlencode($row['password'])."' class='btn btn-warning mt-3'>Edit</a>

    </div> ";
    };
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>