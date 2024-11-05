<?php
declare(strict_types=1);
$error = $_GET["error"] ?? false;
function getUrlparameter(string $queryParameter){
  if(isset($_GET[$queryParameter])){
     $queryParameterValue = $_GET[$queryParameter];
     return $queryParameterValue;
  }
  return '';
}
function addErrorClass(string $parameter){
  global $error;
  if($error && (stripos($error,$parameter) !== false)){
    return "error";
  }
  return "";
} 
function addErrorMessage(string $parameter){
  global $error;
  if($error && (stripos($error,$parameter) !== false)){
    return $error;
  }
  return "";
}
//$error = getUrlparameter("error");
$email = getUrlparameter("email");
$mobile = getUrlparameter("mobile");
$name = getUrlparameter("name");

$emailErrorClass = addErrorClass("email");
$mobileErrorClass = addErrorClass("mobile");
$nameErrorClass = addErrorClass("name");
$passwordErrorClass = addErrorClass("password");
$passwordConfirmErrorClass = addErrorClass("repeat");
$emailErrorMessage = addErrorMessage('email');
$mobileErrorMessage = addErrorMessage("mobile");
$nameErrorMessage = addErrorMessage("name");
$passwordErrorMessage = addErrorMessage("password");
$passwordConfirmErrorMessage = addErrorMessage("Repeat");

