<?php
session_start();
$host="localhost";
$user="root";
$password="123456";
$db="maqola_db";

try{
    $conn=new PDO("mysql:host=$host;dbname=$db", $user,$password);
    $conn->getAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->getAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->getAttribute(PDO::ATTR_EMULATE_PREPARES, false);

}catch(PDOException  $e){
    echo $e->getMessage();
}





?>