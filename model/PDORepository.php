<?php


abstract class PDORepository {
    
    const USERNAME = "parcial2014-2";
    const PASSWORD = "asd";
	const HOST ="localhost";
	const DB = "parcial2014-2";
    
    
    public function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
        return $connection;
    }
    
    protected function queryList($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }
    
}
