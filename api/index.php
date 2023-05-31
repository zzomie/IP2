<?php
require 'flight/Flight.php';
require_once '../PHP/DAO.php';

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET ', function($id){
    $dao=new DAO();
    $result=$dao->getStudent($id);
    echo json_encode($result);
});
Flight::route('PUT ', function($id){
    $dao=new DAO();
    var_dump(Flight::request()->data->ime);
    $ime=Flight::request()->data->ime;
    $prezime=Flight::request()->data->prezime;
    $indeks=Flight::request()->data->indeks;
    $result=$dao->updateStudent($id,$ime,$prezime,$indeks);
    echo json_encode($result);
});


Flight::start();
