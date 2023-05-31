<?php
// uspesan update - kod njega je ovo prikaz.php
require_once 'DAOStudent.php';
//error_reporting(0);
if(!isset($_SESSION)) session_start(); 


if ($_SESSION["student"]!=""){
	$dao=new DAO();
	$student=$dao->getStudent($_SESSION['student']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
Id:<?= $student["id"]?><br>
Ime:<?= $student["ime"]?><br>
Prezime:<?= $student["prezime"]?><br>
Broj indeksa:<?= $student["indeks"]?><br>
<a href="controllerStudent.php?action=logout">LOGOUT</a>

</body>
</html>

<?php 
}else{
	header("Location:index.php");
}
?>