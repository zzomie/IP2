<?php
require_once 'db.php';

class DAO {
	private $db;

	// za 2. nacin resenja
	private $STUDENTEXIST = "SELECT * FROM student where id=?";
	private $UPDATESTUDENT = "UPDATE student SET= ime=>?, prezime=>?, indeks=>? WHERE id=?";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getStudent($id)
	{	
		$statement = $this->db->prepare($this->STUDENTEXIST);
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

	public function updateStudent($id, $ime, $prezime, $indeks)
	{
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $id);
		$statement->bindValue(2, $ime);
		$statement->bindValue(3, $prezime);
		$statement->bindValue(4, $indeks);
		
		$statement->execute();
	}

}
?>
