<?php
namespace views;
class UserView extends \models\UserModel{
  public function showAllUsers(){
    $users = $this->getAllUsers();
    foreach($users as $user){
      echo $user['name'].'<br/>';
    }
  }
}