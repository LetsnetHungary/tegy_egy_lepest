<?

    $router = new CoreApp\Router();

    $router->get("", function(){
      $view = new CoreApp\View("Projektek");
      $view->render();
    });
