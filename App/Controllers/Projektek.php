<?

    $router = new CoreApp\Router();
    require _MODELS . "Projektek_Model" . _PHP_ENDING;

    $router->get("", function(){
      $model = new Projektek_Model();
      $view = new CoreApp\View("Projektek");
      $projects = $model->loadProjects();
      $view->contents = $projects;
      $view->render();
    });
    $router->get("(:projectid)", function($param){
      $model = new Projektek_Model();
      $view = new CoreApp\View("Openprojekt");
      $view->contents = $model->getProject($param["projectid"]);
      $view->render();
    });
