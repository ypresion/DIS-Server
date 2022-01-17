<?php

namespace src\model;
/**
 * Connect and interact with an SQLite database.
 * 
 * This class provides basic methods for seetting up a connection 
 * with an SQLite database and executing SQL queries.
 * 
 * @author Sylwia Krupa | w18015597 <w18015597@northumbria.ac.uk>
 * @version 2021.01
 */
class Database 
{
    private $dbConnection;
   
    public function __construct($dbName) {
        $this->setDbConnection($dbName);
    }

    private function setDbConnection($dbName) {
        try {           
            $this->dbConnection = new \PDO('sqlite:'.$dbName);
            $this->dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch( \PDOException $e ) {
            echo "Database Connection Error: " . $e->getMessage();
            exit();
        }
     }

    public function executeSQL($sql, $params=[]) { 
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}