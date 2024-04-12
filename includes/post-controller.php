<?php

class postsController
{
    public $connect;

    public function __construct()
    {
        require_once("database.php");
        $databaseObject = new databaseConnection;
        $this->connect = $databaseObject->connect();
    }

    public function posts()
    {
        $stmt = $this->connect->prepare("select * from post order by id");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt-> rowCount() > 0) {
            return $posts;
        }else {
            return false;
        }
    }
}
