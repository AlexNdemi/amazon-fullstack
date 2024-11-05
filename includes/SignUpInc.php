<?php
namespace includes;
use controllers\SignUpController;
require '../controllers/SignUpController.php';

if(!isset($_POST["sign-up"])){
  header("location:../index.php");
  exit();
}
$Ms =(string) (new \DateTime())->format('Uv') + $_POST["timeInMs"] + rand(1,86400);
$userId = $Ms;
$name = $_POST["yourName"];
$mobileNo = $_POST["mobileNo"];
$email = $_POST["email"];
$password = $_POST["pswd"];
$repeatPassword = $_POST["confirmPswd"];



$signUpController = new SignUpController($userId,$name,$mobileNo,$email,$password,$repeatPassword);
$signUpController-> addUser();
  
