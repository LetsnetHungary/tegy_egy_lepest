<?
    $router = new CoreApp\Router();
    include_once(_MODELS . "Login_Model" . _PHP_ENDING);


    $router->get("", function(){
      CoreApp\Session::init();
      //print_r($_SESSION); die();
      shouldredirect();

      if(isset($_COOKIE["keepmeloggedin"]) && isset($_COOKIE["fingerprint"])){
        $model = new Login_Model();
        if($model->kULI($_COOKIE["keepmeloggedin"], $_COOKIE["fingerprint"])){
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
      if(!isset($_SESSION["logged"]))
        return;
      if($auth->cULI())
        header("Location: Admin");
    }
