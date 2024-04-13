<?php
class userLogin
{
    private $userId;
    private $username;
    private $userPassword;
    private $userEmail;

    public $connect;

    public function __construct()
    {
        require_once("database.php");
        $databaseObject = new databaseConnection;
        $this->connect = $databaseObject->connect();
    }

    function setUserId($userId)
    {
        $this->userId = $userId;
    }

    function getUserId()
    {
        return $this->userId;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    function getUserPassword()
    {
        return $this->userPassword;
    }

    function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    function getUserEmail()
    {
        return $this->userEmail;
    }

    function checkUserBlockedOrNot(){
        $query = "
		SELECT * FROM banned_users 
		WHERE user_id = :email
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':email', $this->userEmail);

		if($statement->execute())
		{
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		}
		return $user_data;
    }

    function get_user_data_by_email()
	{
		$query = "
		SELECT * FROM users 
		WHERE email = :email
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':email', $this->userEmail);

		if($statement->execute())
		{
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		}
		return $user_data;
	}
}
