<?php

class postsFunctions
{
    public $connect;

    public function __construct()
    {
        require_once("database.php");
        $databaseObject = new databaseConnection;
        $this->connect = $databaseObject->connect();
    }

    public function deleteData($id, $table)
    {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertNewData($data, $table)
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->connect->prepare($sql);

        foreach ($data as $key => $row) {
            $stmt->bindParam(":$key", $row);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
}
