<?

    $router = new CoreApp\Router();

    $router->get("", function(){
      $view = new CoreApp\View("Projektek");
      $view->render();
    });
    $router->get("Openprojekt", function(){
      $view = new CoreApp\View("Openprojekt");
      $view->render();
    });
