<?php

require_once 'controllerStudent.php';
$action=isset($_REQUEST['action'])?$_REQUEST['action']:"";


switch($_SERVER["REQUEST_METHOD"])
{

    case "GET":
        {
            switch($action){
                case "forma":
                    include '../forma.php';
                    break;
                case "logout":
                    $controller=new controllerStudent();
                    $controller->logout();
                    break;
            }
        }
    break;

    case "POST":
        {
            switch($action)
            {
                case "update":
                    $controller=new controllerStudent();
                    $controller->update();
                    break;
            }
        }
}


?>