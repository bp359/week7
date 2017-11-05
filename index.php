<?php
//error reporting on
ini_set("display_errors",'On');
error_reporting(E_ALL);

$hostname ='sql.njit.edu';
$user="bp359";
$password="bTDLnIOQ";
$dsn='mysql:dbname=bp359';
$connection=NULL;
try{
    $connection=new PDO("mysql:host=$hostname;dbname=bp359",$user,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo'Connected Successfully'.'<br>';
}
catch (PDOException $error){
    echo'Connection Failed '.$error->getMessage().'<br>';
}
try{
    $query=$connection->prepare("SELECT *FROM accounts where id<6");
    $query->execute();
    $output=$query->setFetchMode(PDO::FETCH_ASSOC);
    $output=$query->fetchAll();
    print_r($output);
}
?>