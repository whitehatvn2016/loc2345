<?php
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));    
    $name = $_POST["name"];
    $price = $_POST["price"];
    $data = [
        'name' => $name,
        'price' => $price
    ];
    $stmt =  
        $pdo->prepare("INSERT INTO products(name, price) VALUES (:name,:price)");	
    $stmt->execute($data);
    echo("insert ok!");
 
?>