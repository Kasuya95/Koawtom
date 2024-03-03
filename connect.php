<?php      
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbname = "kaowtom";

try {
    $conn = new PDO(
        "mysql:host=$serverName;dbname=$dbname;charset=UTF8",
        $userName,
        $userPassword
    );

    if ($conn) {
        echo "Online!!!";
    }


} catch (PDOException $e){
    echo "Ofline!!!!";
}
