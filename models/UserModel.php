<?php
namespace models; 
class UserModel extends \Dbh{
  protected function getAllUsers(){
   $sql = "SELECT * FROM Users";
   $stmt = $this->connect()->query($sql);
   $results = $stmt->fetchAll();
   $stmt = null;
   return $results;
  }
  protected function insertUser(string $userId,string $name,string $mobile_no,string $email,string $password){
    $sql = "INSERT INTO Users(user_id,name, mobile_no, email,password) VALUES(?,?,?,?,?)";
    $hashedPswd = password_hash($password,PASSWORD_DEFAULT);
    $stmt = $this->connect()->prepare($sql);
    $stmt ->execute([$userId,$name,$mobile_no,$email,$hashedPswd]);
    $stmt = null;
  }
  protected function checkUsername(string $username){
    $sql = "SELECT * FROM Users WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute([$username])){
      $stmt = null;
      header("location: ../sign-up.php?error=usernameStmtFailed");
      exit();
    }
    $exists = $stmt->rowCount() > 0;
    $stmt = null;
    return $exists;

  }
  protected function checkMobileNo(string $mobileNo){
    $mobileNo=$this->parseMobileNo($mobileNo);
    $sql = "SELECT * FROM Users WHERE mobile_no LIKE ?";
    $stmt = $this->connect()->prepare($sql);
    $pattern = "%$mobileNo";
    
    if (!$stmt->execute([$pattern])) {
        $stmt = null;
        header("location: ../sign-up.php?error=usernameStmtFailed");
        exit();
    }
    $exists = $stmt->rowCount() > 0;
    return $exists;
}

  protected function checkAccount(string $emailOrMobileNo){
    $possiblyAMobileNo = $this->parseMobileNo($emailOrMobileNo);
    echo $possiblyAMobileNo;
    // Use a conditional query based on whether we have a valid mobile number pattern
    if ($possiblyAMobileNo !== null) {
        $sql = "SELECT * FROM Users WHERE email = ? OR mobile_no LIKE ?";
        $pattern = "%$possiblyAMobileNo";
        $params = [$emailOrMobileNo, $pattern];
    } else {
        $sql = "SELECT * FROM Users WHERE email = ?";
        $params = [$emailOrMobileNo];
    }


    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute($params)) {
        $stmt = null;
        header("location: ../index.php?error=usernameStmtFailed");
        exit();
    }
    $result=$stmt->fetch();
    return $result;

  }
  private function parseMobileNo(string $mobileNo){
      if(!preg_match("/^\d+$/",$mobileNo)){
        return null;
      };
      return substr($mobileNo, 0, 1) === '0' ? substr($mobileNo, 1) : $mobileNo;
  }
  protected function checkEmail(string $email){
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute([$email])){
      $stmt = null;
      header("location: ../sign-up.php?error=emailStmtFailed");
      exit();
    }
    $exists = $stmt->rowCount() > 0;
    return $exists;
  }
  protected function getUser(string $email){
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute([$email])){
      $stmt = null;
      header("location: ../sign-up.php?error=emailStmtFailed");
      exit();
    }
    $results = $stmt->fetchAll();
    return $results;
  }

}