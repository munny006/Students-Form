<?php


class DataBase{

public $host = DB_HOST;
public $user = DB_USER;
public $pass = DB_PASS;
public $dbname = DB_NAME;

public $link;
public $error;


public function __construct(){
	$this->connectionDB();

}

private function connectionDB(){

	$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);

	if (!$this->link) {
		$this->error = "connection failed".$this->link->connect_error;
		return false;
	}



}


//read or select data


public function select($query){


$result = $this->link->query($query) or die($this->link->error.__LINE__);
if ($result->num_rows > 0 ) {
	return $result;
}
else
{
	return false;
}

}

// insert data


public function insert($query){
	$insertData = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($insertData) {
		header("Location:index.php?msg=".urlencode("Data inserted successfully"));
		exit();
	}
	else
	{
		die("Error:(".$this->link->errno.")".$this->link->error);
	}
}

// update data


public function update($query){
	$updateData = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($updateData) {
		header("Location:index.php?msg=".urlencode('Data updated successfull'));
		exit();
	}
	else
	{
		die("Error :(".$this->link->errno.")".$this->link->error);
	}
}

// delete data


public function delete($query){
	$deleteData = $this->link->query($query) or die($this->link->error.__LINE__);
	if ($deleteData) {
		header("Location: index.php?msg=".urlencode('Data deleted successfully'));
		exit();
	}
	else
	{
		die("Error:(".$this->link->errno.")".$this->link->error);
	}
}



}
















?>