<?php 
require_once(LIB_PATH.DS.'config.php');

class MySQLDatabase{

	private $connection;
	public $last_query;

	function __construct(){
		$this->open_connection();
	}
	function open_connection(){		
		$this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
		if(!$this->connection){
			die("Database connection failed: ".mysql_error());
		} else{
			$db_select = mysqli_select_db($this->connection,DB_NAME);
			if(!$db_select){
				die("Database selection failed: ".mysql_error());
			}
		} 
	}
	public function close_connection(){
		if(isset($this->connection)){
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}
	public function query($sql){
		$this->last_query =$sql;
		$result = mysqli_query($this->connection,$sql );
		$this->confirm_query($result);
		return $result;
	}
	private function confirm_query($result){
		if(!$result){
			$output = "databse querry failed: ".mysql_error()."<br/><br/>";

			$output .= "Last SQL query: ".$this->last_query;
			die($output);
		}	
	}
	public function num_rows($result){
		return mysqli_num_rows($result);
	}
	public function insert_id(){
		return mysqli_insert_id($this->connection);
	}
	public function fetch_array($result){
		return mysqli_fetch_array($result);
	}
	public function escape_value($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		if($new_enough_php){
			/* undo any magic quote effects so mysql_real_escape_string can do the work*/
			if($magic_quotes_active){
				$value = stripslashes($value);
			}
				$value = mysqli_real_escape_string($this->connection,$value);
			}else{
				/*if magic quotes aren't already on them then add slashes manulaly*/
				if(!$magic_quotes_active){
					$value = addslashes($value);
				  }
				}
				return $value;
	}
	public function affected_rows(){
		return mysqli_affected_rows($this->connection);
	}


}

$database = new MySQLDatabase();

?> 