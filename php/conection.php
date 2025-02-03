<?php


$dsn="mysql:host=localhost;dbname=project";
$dbUsername="Stina";//nese nuk e ndrron vet emrin ne xamp vet automatikisht e ka usernamin root edhe pasin
$dbPaswword="Stina123.";//ne window root e ne mac root


try{
$pdo=new PDO($dsn,$dbUsername,$dbPaswword);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// me i ndrru to atribute te pdo si psh qysh me i handle qato probleme kur conectohum me databazen
}
catch(PDOException  $e ){//$e plasechlder te PDOExeception
echo "connectin failed: " . $e->getMessage();
}
//try-per me shkru ni block of cod