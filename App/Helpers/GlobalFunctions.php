<?php
namespace Helpers;

class GlobalFunctions {
  public static function getErrorMessage($code){
    include_once("/App/Models/Login_Model.php");
    $model = new  \Login_Model();
    return $model->getErrorMessage($code);
  }
}
