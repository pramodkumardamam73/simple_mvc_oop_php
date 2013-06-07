<?php 

class Database
{
  private $connection;

	public function __construct()
	{
		$this->openConnection();
		$this->selectDb(DATABASE);
	}

	private function openConnection()
	{
		$this->connection = mysql_connect(DATABASE_ADDRESS, DATABASE_USERNAME, DATABASE_PASSWORD);
	}

	public function closeConnection()
	{
			if(isset($this->connection)) {
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	private function selectDb($db)
	{
		mysql_select_db($db,$this->connection);
	}

	public function query($query)
	{
		$rs=mysql_query($query);
		return $rs;
		
	}

	public function resultSet($query)
	{
		$retList=array();
		while($row=mysql_fetch_array($query)){
			array_push($retList,$row);
		}
		return $retList;
	}

	public function getRecentInsertId()
	{
		return mysql_insert_id();
	}

	public function insertInto($table,$keys,$values)
	{
		$query="INSERT INTO $table (";
		$count=0;
		foreach($keys as $key)
		{
			$query.="$key";
			if(count($keys) != ($count+1)){
				$query.=",";
			}
			$count++;
		}
		$query.=") VALUES (";
		$count=0;
		foreach($values as $value)
		{
			if($value!="now()"){
				$query.="'$value'";
			}else{
				$query.="$value";
			}
			if(count($values) != ($count+1)){
				$query.=",";
			}
			$count++;
		}
		$query.=")";
		
		return $this->query($query);
	}
	
	public function updateTable($table_name,$keys,$values,$where)
	{
		$query="UPDATE $table_name SET ";
		$i=0;
		$size=count($keys);
		while($i<$size){
			$query.=$keys[$i]."='".$values[$i]."'";
			$i++;
			if($i!=$size){
				$query.=", ";
			}
		}
		$query.=" WHERE ".$where;
		
		$this->query($query);
	}
}
?>
