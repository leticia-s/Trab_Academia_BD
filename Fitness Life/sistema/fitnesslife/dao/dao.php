<?php

abstract class Dao {

    public static function getInstance() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=fitness_life", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
