<?php

//Mysql
const DBDRIVE = 'mysql';
const DBHOST = 'localhost';
const DBNAME = 'banco';
const DBUSER = 'root';
const DBPASS = '';
const DBPORT = '3306';

try {
    $con = new PDO(DBDRIVE . ':host=' . DBHOST .
        ';port='. DBPORT .';charset=utf8;dbname=' . DBNAME, DBUSER, DBPASS);

    return $con;
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}