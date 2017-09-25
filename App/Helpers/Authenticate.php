<?php
namespace Helpers;

class Authenticate {
  private $model;

  public function __construct(){
    require _MODELS . "Authenticate_Model" . _PHP_ENDING;
    $this->model = new \Authenticate_Model();
  }
  public function cULI(){
    return $this->model->cULI();
  }
}
