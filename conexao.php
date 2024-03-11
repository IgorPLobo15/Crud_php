<?php
try{
    //Faz conexão com o BD
    $conectar= new PDO("mysql:host=localhost;port=3306;dbname=pdo;", "root", "");
    
}   
catch(PDOException $e) {
    //Exibição caso ocorra erro
    echo 'Falha ao conectar com o banco de dados:'.$e->getMessage();
}
?>