<?
    include_once(_MODELS . "Admin_Model" . _PHP_ENDING);

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

    $router->post("saveimage", function(){
      shouldredirect();
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          die("File is not an image.");
          $uploadOk = 0;
      }
      if (file_exists($target_file)) {
          die("Sorry, file already exists.");
          $uploadOk = 0;
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
          $uploadOk = 0;
      }
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
        }
      header("Location: /Admin");
    });
    $router->post("deleteimage/(:imagename)", function($param){
      shouldredirect();
      unlink("images/".$param["imagename"]);
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
