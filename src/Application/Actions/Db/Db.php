<?php

namespace App\Application\Actions\Db;

use PDO;
use Psr\Http\Message\ResponseInterface as Response;

Class Db {
private  $server = "mysql:host=127.0.0.1;dbname=dogs";
private  $user = "root";
private  $pass = "";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $con;

public function openConnection()
{
	try
	{
		$this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
		return $this->con;
	}
	catch (PDOException $e)
	{
		echo "There is some problem in connection: " . $e->getMessage();
	}
}
public function closeConnection() {
	$this->con = null;
}
}

