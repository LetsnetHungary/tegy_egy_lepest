<?
    $router = new CoreApp\Router();
    require _MODELS . "Login_Model" . _PHP_ENDING;


    $router->get("", function(){
      shouldredirect();

      if(isset($_COOKIE["keepmeloggedin"])){
        $model = new Login_Model();
        if($model->kULI($_COOKIE["keepmeloggedin"])){
          header("Location: /Admin");
        }
      }
      
      $view = new CoreApp\View("Login");
      $view->render();
    });

    $router->post("loginrequest", function(){
      shouldredirect();

      $model = new Login_Model();
      print_r(json_encode($model->lUI($_POST)));
    });

    $router->post("logout", function(){
      $model = new Login_Model();
      if($model->lO()){
        header("Location: /Login");
      }
      die("Error occured");
    });

    function shouldredirect(){
      $auth = new Helpers\Authenticate();
      if($auth->cULI())
        header("Location: Admin");
    }
