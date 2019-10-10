<?php

namespace App\Application\Actions\Dogs;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Db\Db;
use PDO;

class Dogs {
	static function getAllDogs() {
		$conn = Db::class;
		$database = new $conn;
		$output = array();
		$db = $database->openConnection();
		$sql = "select * from pants" ;
		foreach ($db->query($sql) as $row) {
			$output[] = $row;
		}
		$database->closeConnection();
		if ($output) {
			return $output;
		} else {
			return 'No results found';
		}
	}

	static function getDog($id) {
		$conn = Db::class;
		$database = new $conn;
		$output = array();
		$db = $database->openConnection();
		$sql = "select * from pants where id = ". $id ."" ;
		foreach ($db->query($sql) as $row) {
			$output[] = $row;
		}
		$database->closeConnection();
		if ($output) {
			return $output;
		} else {
			return 'No results found';
		}
	}

	static function getDogByName($name) {
		$conn = Db::class;
		$database = new $conn;
		$output = array();
		$db = $database->openConnection();
		$sql = "select * from pants where `name` LIKE '%".$name."%'";
		foreach ($db->query($sql) as $row) {
			$output[] = $row;
		}
		$database->closeConnection();
		if ($output) {
			return $output;
		} else {
			return 'No results found';
		}
	}

	static function getDogsByHeight($height) {
		$conn = Db::class;
		$database = new $conn;
		$output = array();
		$db = $database->openConnection();
		$sql = "select * from pants where `height` LIKE '%".$height."%'";
		foreach ($db->query($sql) as $row) {
			$output[] = $row;
		}
		$database->closeConnection();
		if ($output) {
			return $output;
		} else {
			return 'No results found';
		}
	}

	static function getDogsByLength($height) {
		$conn = Db::class;
		$database = new $conn;
		$output = array();
		$db = $database->openConnection();
		$sql = "select * from pants where `length` LIKE '%".$height."%'";
		foreach ($db->query($sql) as $row) {
			$output[] = $row;
		}
		$database->closeConnection();
		if ($output) {
			return $output;
		} else {
			return 'No results found';
		}
	}

	static function addDog($name,$height,$length) {
		$conn = Db::class;
		$database = new $conn;
		$sql = "INSERT INTO pants (name, height, length) VALUES ('$name', '$height', '$length')";
		try {
			$db = $database->openConnection();
			$db->prepare($sql);
			$db->exec($sql);
			$dogId = $db->lastInsertId();
			$database->closeConnection();
			$output['id'] = $dogId;
		} catch(PDOException $e) {
			$output = 'There was an error, please try again';
		}
		return $output;
	}

	static function updateDog($id,$name,$height,$length) {
		$conn = Db::class;
		$database = new $conn;
		$sql = "UPDATE pants set `name` = '$name', `height` = '$height', `length` = '$length' where `id` = $id";
		try {
			$db = $database->openConnection();
			$db->prepare($sql);
			$db->exec($sql);
			$output = 'Success';
		} catch(PDOException $e) {
			$output = 'There was an error, please try again';
		}
		return $output;
	}

	static function dogGone($id) {
		$conn = Db::class;
		$database = new $conn;
		$sql = "DELETE FROM pants WHERE id='$id'";
		try {
			$db = $database->openConnection();
			$db->prepare($sql);
			$db->exec($sql);
			$output = 'Success';
		} catch(PDOException $e) {
			$output = 'There was an error, please try again';
		}
		return $output;
	}
}

