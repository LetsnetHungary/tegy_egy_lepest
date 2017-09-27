<?php
namespace Helpers;

class Authenticate {
  private $model;

  public function __construct(){
    include_once(_MODELS . "Login_Model" . _PHP_ENDING);
    $this->model = new \Login_Model();
  }
  public function cULI(){
    return $this->model->cULI();
  }
}
