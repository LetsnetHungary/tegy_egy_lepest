<?
require _MODELS . "Projektek_Model" . _PHP_ENDING;
    $router = new CoreApp\Router();

    $router->get("", function(){
      $view = new CoreApp\View("Index");
      $model = new Projektek_Model();
      $projects = $model->loadProjects();
      $view->contents = $projects;
      $view->render();
    });
