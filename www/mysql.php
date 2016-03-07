<?php
date_default_timezone_set('Europe/Paris');

echo "oui " . date("H:i:s");

$dblink = new PDO('mysql:host=mysqltest;port=3306;dbname=dbtest','paf','mdp');

$req = $dblink->exec('CREATE TABLE IF NOT EXISTS tabletest (
  `one` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `two` varchar(10) COLLATE utf8_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');

$req = $dblink->exec('INSERT INTO tabletest values ("oui","oui")');

$req = $dblink->prepare('SELECT * FROM tabletest');
$reponse = $req->execute() or var_dump($dblink->errorInfo());
$values= $req->fetchAll(PDO::FETCH_CLASS);

var_dump($values);

?>