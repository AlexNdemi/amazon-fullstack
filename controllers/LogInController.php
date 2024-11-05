<?php
declare(strict_types=1);
namespace controllers;
use models;
define("ROOT_DIRECTORY","..");
require_once '../helpers/AutoLoader.php';
class LogInController extends models\UserModel{
  public function 
  __construct(
    private string $emailorMobileNo,
    private string $password){
  }
  private function emptyInput(){
    if(!$this->emailorMobileNo){
      header("location:../sign-in.php?error=This+field+should+not+be+blank");
      exit();
    }
    if(!$this->password){
      header("location:../sign-in.php?error=Password+should+not+be+blank&name=$this->emailorMobileNo");
      exit();
    }
    return false;

  }
  private function invalidPhoneNumberOrEmail(){
    $validEmail = filter_var($this->emailorMobileNo,FILTER_VALIDATE_EMAIL);
    $validMobileNo = preg_match("/^\d+$/",$this->emailorMobileNo);
    if(!$validEmail && !$validMobileNo){
      header("location:../sign-in.php?error=invalid+email+or+phone+number&emailOrMobile=$this->emailorMobileNo");
      exit();
    }
    return false;
  }
  private function getUserDetails(){
    $user=$this->checkAccount($this->emailorMobileNo);
    if(!$user){
      header("location:../sign-in.php?This+account+does+not+exist&emailOrMobile=$this->emailorMobileNo");
      exit();
    }
    return $user;
  }
  private function verifyUser(){
    $uid=$this->getUserDetails();
    $pwdHashed =$uid["password"]; 
    $checkPwd = password_verify($this->password,$pwdHashed);

    if($checkPwd === false){
      header("location:../sign-in.php?error=incorrect+password&emailOrMobile=$this->emailorMobileNo");
      exit();
    }
    session_start();
    $_SESSION["userid"] = $uid["user_id"];
    $_SESSION["username"] =$uid["name"];
    header("location:../index.php");
  }
  public function logInUser(){
    if(!$this->emptyInput() && !$this->invalidPhoneNumberOrEmail()){
       $this->verifyUser();
    } 
  }
}
