<?php
require_once 'db.php';

class DAO {
	private $db;

	private $AVERAGEGOALS = "SELECT AVG(brgolova) FROM fudbaleri";

	private $GETFUDBALER = "SELECT * FROM fudbaleri WHERE brojgolova>n";

	private $FUDBALER = "SELECT * FROM fudbaleri where id=?";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getFubalerID($id)
	{	
		$statement = $this->db->prepare($this->FUDBALER);
		$statement->bindValue(1, $id, PDO::PARAM_INT);	
		$statement->execute();
		// $result = $statement->fetchAll();
		// return $result;
		if($statement->fetch()){
			return true;
		}
		else{
			return false;
		}
	}


	public function getFudbaler($n)
	{	
		$statement = $this->db->prepare($this->GETFUDBALER);
		$statement->bindValue(1, $n, PDO::PARAM_INT);	
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}

	public function brojGolova($brgolova)
	{
		$statement = $this->db->prepare($this->AVERAGEGOALS);
		$statement->bindValue(1, $brgolova);
		if($statement->fetch()){
			return true;
		}
		else{
			return false;
		}
	}
}
?>
