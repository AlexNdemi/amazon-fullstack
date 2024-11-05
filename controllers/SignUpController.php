<?php
namespace controllers;
use models\UserModel;
//require '../models/UserModel.php';
define('ROOT_DIRECTORY','..');
require_once '../helpers/AutoLoader.php';

class SignUpController extends UserModel{

   public function __construct(
    private string $userId,
    private string $username,
    private string $mobileNo,
    private string $email,
    private string $password,
    private string $passwordRepeat){

  }
  private function emptyInput(){

    if(empty($this->username)){
      header("location:../sign-up.php?error=username+should+not+be+blank&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    } 
    if(empty($this->mobileNo)){
      header("location:../sign-up.php?error=MoblieNo+should+not+be+blank&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    } 
    if(empty($this->email)){
      header("location:../sign-up.php?error=email+should+not+be+blank&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    if(empty($this->password)){
      header("location:../sign-up.php?error=Password+should+not+be+blank&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();

    } 
    if (empty($this->passwordRepeat)){
      header("location:../sign-up.php?error=repeat+password+should+not+be+blank&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();

    }{
    }
    return false;
  }
  private function invalidName(){
    if(!preg_match("/^[A-Z][a-zA-Z]{3,}(?: [A-Z][a-zA-Z]*){0,2}$/",$this->username)){
      header("location:../sign-up.php?error=please+enter+a+valid+name&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    return false;
  }
  private function isPasswordLongEnough(){
    return strlen($this->password) >= 8; 
  }
  private function pwdMatch(){
    if($this->password !== $this->passwordRepeat){
      header("location:../sign-up.php?error=passwords+do+not+match&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    return true;
  }
  private function invalidEmail(){
    if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
      header("location:../sign-up.php?error=please+enter+a+valid+email&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    return false;
  }
  // private function isUsernameTaken(){
  //     if($this->checkUsername($this->username)){
  //       header("location: ../sign-up.php?error=username+already+taken&name=$this->username&mobile=$this->mobileNo&email=$this->email");
  //       exit();
  //     }
  //     return false;
  // }
  private function isEmailAlreadyInUse(){
    if($this->checkEmail($this->email)){
      header("location: ../sign-up.php?error=email+already+in+se&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    return false;

  }
  private function isMobileNumberAlreadyInUse(){
    if($this->checkMobileNo($this->mobileNo)){
      header("location: ../sign-up.php?error=mobile+number+already+in+use&name=$this->username&mobile=$this->mobileNo&email=$this->email");
      exit();
    }
    return false;
  }
  public function addUser(){
    if(
      !$this->emptyInput() && !$this->invalidName() && !$this->invalidEmail() && 
      $this->isPasswordLongEnough()&&
      $this->pwdMatch() && !$this->isMobileNumberAlreadyInUse() &&
      !$this->isEmailAlreadyInUse()
      ){
    $this->insertUser($this->userId,$this->username,$this->mobileNo,$this->email,$this->password);
    header("location:../sign-in.php?Your+account+has+been+successfully+created");
    }
  }  
}