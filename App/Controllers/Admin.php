<?
    CoreApp\Session::init();
    require _MODELS . "Admin_Model" . _PHP_ENDING;
    $router = new CoreApp\Router();

    $_SESSION["logged"] = true;

    $router->get("", function(){
      if(!$_SESSION["logged"]){
          header("Location: Login");
          return;
      }
      $model = new Admin_Model();
      $model->updateData($_POST);
      $view = new CoreApp\View("Admin");
      $view->contents = $model->getData();
      $view->render();
    });

    $router->post("upload", function(){
      if(!$_SESSION["logged"] || empty($_POST)){
          header("Location: /Login");
          return;
      }
      $model = new Admin_Model();
      $model->uploadData($_POST);
      header("Location: /Admin");
    });

    $router->post("update", function(){
      if(!$_SESSION["logged"] || empty($_POST)){
          header("Location: /Login");
          return;
      }
      $model = new Admin_Model();
      $model->updateData($_POST);
      header("Location: /Admin");
    });
