<?

    class Authenticate_Model extends CoreApp\Model{
        private $id;
        private $checkurl;
        private $logouturl;

        public function __construct() {
          \CoreApp\Session::init();
          $this->id =  \CoreApp\AppConfig::getData("authenticate=>appid");
          $this->checkurl = \CoreApp\AppConfig::getData("authenticate=>checkIfLoggedInURL").$this->id;
        }
        public function cULI(){
          return $this->checkLoggedin($_SESSION["logged"], "52e4ceec7c8f3ce37fa7cb898d52b501");
        }

        private function checkLoggedin($user, $devkey){
          $res = $this->CURLWPOST($this->checkurl, array(
            "uniquekey" => $user,
            "fingerprint" => $devkey
          ));
          $res = json_decode($res, true);
          if($res["logged_in"])
            return $res;
          unset($_SESSION["logged"]);
          return false;
        }
    }
