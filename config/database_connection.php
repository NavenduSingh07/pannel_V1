<?php 

/**
 * ========================
 *   DATABASE CONNECTION
 * ======================== 
 */

class Database
{
	
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "panel";

	public function connection(){

		$conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
		if(mysqli_connect_error()){
			die("Error Failed to Connect Database");
		}else{
			return $conn;
		}
		
	}
}

$obj = new Database();
$conn = $obj->connection();

session_start();