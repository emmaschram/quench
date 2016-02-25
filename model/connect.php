<?php
    
try {
    $db = new PDO("mysql:dbname=quench; host=localhost", "root", "root");
} catch(PDOException $e) {
    echo "FAIL";
}

?>