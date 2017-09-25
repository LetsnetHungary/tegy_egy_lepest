<?
    require _MODELS . "Admin_Model" . _PHP_ENDING;

    $router = new CoreApp\Router();

    $router->get("", function(){
      shouldredirect();

      $model = new Admin_Model();
      $view = new CoreApp\View("Admin");
      $view->contents = $model->getData();
      $view->render();
    });

    $router->post("upload", function(){

      $model = new Admin_Model();
      $model->uploadData($_POST);
      header("Location: /Admin");
    });

    $router->post("update", function(){
      shouldredirect();

      $model = new Admin_Model();
      if(isset($_POST["save"])){
        $model->updateData($_POST);
      }
      else{
        $model->deleteData($_POST);
      }
      header("Location: /Admin");
    });

    function shouldredirect(){
      CoreApp\Session::init();
      $auth = new Helpers\Authenticate();
      if(!isset($_SESSION["logged"]))
        header("Location: Login");
      if(!$auth->cULI())
        header("Location: Login");
    }
