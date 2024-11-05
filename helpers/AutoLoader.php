<?php
declare(strict_types=1);
spl_autoload_register(function ($class){
  $path = str_replace("\\",DIRECTORY_SEPARATOR,$class);
  echo $path.'<br>';
  if (!file_exists(ROOT_DIRECTORY.DIRECTORY_SEPARATOR."$path.php")){
    echo ROOT_DIRECTORY.DIRECTORY_SEPARATOR."$path.php does not exist.<br/>";
    return;
  }
  require_once ROOT_DIRECTORY.DIRECTORY_SEPARATOR."$path.php";
  
});