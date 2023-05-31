<?php
// controller
require_once 'DAO.php';

class controllerStudent{

    function logout(){
        if($_SESSION["student"]!=""){
            session_unset();
            session_destroy();
            include '../public/forma.php';
        }
    }

    function update(){
        $id = isset($_POST["id"])?$_POST['id']:"";
        $ime = isset($_POST["ime"])?$_POST['ime']:"";
        $prezime = isset($_POST["prezime"])?$_POST['prezime']:"";
        $indeks = isset($_POST["indeks"])?$_POST['indeks']:"";

        if(!empty($id)&&!empty($ime)&&!empty($prezime)&&!empty($indeks)){
            $dao = new DAO();
            $postoji=$dao->getStudent($id);

                if($postoji){
                    $dao->updateStudent($id, $ime, $prezime, $indeks);
                    $_SESSION["student"]=$id;
                    include '../public/success.php';
                }
                else{
                        $message="Student sa ovim brojem indeksa ne postoji!";
                        include '../public/forma.php';
                }
        }
        else {
            $message="Validacija neuspesna!";
            include '../public/forma.php';
        }

    }


}
?>