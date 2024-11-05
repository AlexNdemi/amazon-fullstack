<?php
namespace includes;
require '../controllers/LogInController.php';
use controllers\LogInController;
if(!isset($_POST["sign-in"])){
  header("location:../index.php");
  exit();
}
$emailOrPhoneNumber = $_POST["emailOrPhoneNo"];
$password=$_POST["pswd"];

$logInController = new LogInController($emailOrPhoneNumber,$password);
$logInController->logInUser();
