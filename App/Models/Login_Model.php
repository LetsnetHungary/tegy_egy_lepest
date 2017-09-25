<?

    class Login_Model extends CoreApp\Model {
      private $id;
      private $keepmeloggedinurl;
      private $checkurl;
      private $logouturl;

      public function __construct() {
        CoreApp\Session::init();
        $this->id = CoreApp\AppConfig::getData("authenticate=>appid");
        $this->keepmeloggedinurl = CoreApp\AppConfig::getData("authenticate=>keepmeloggedinURL").$this->id;
        $this->loginurl = CoreApp\AppConfig::getData("authenticate=>loginURL").$this->id;
        $this->logouturl =  CoreApp\AppConfig::getData("authenticate=>logoutURL").$this->id;
      }
      public function lUI($array){
        return $this->checkLogin($array["email"], $array["password"], $array["fingerprint"], $array["lalo"], $array["keepmeloggedin"]);
      }

      private function checkLogin($email, $pw, $devkey, $lalo, $keepme){
        $res = json_decode($this->CURLWPOST($this->loginurl, array(
          "email" => $email,
          "uniquekey" => CoreApp\Session::get("logged"),
          "password" => $pw,
          "fingerprint" => $devkey,
          "keepmeloggedin" => $keepme,
          "lalo" => $lalo
        )), true);
        if($res["error"]){
          return array(
            "success" => false,
            "message" => $res["message"]
          );
        }
        $this->login($res["logged_user"]);
        if(isset($res["cookie_hash"]) && $res["cookie_hash"] != "---"){
          setcookie("keepmeloggedin", $res["cookie_hash"], 2147483547, "/Login");
        }
        return array(
          "success" => true,
          "message" => $res["message"]
        );
      }
      private function login($uniq){
        CoreApp\Session::set("logged", $uniq);
      }

      public function lO(){
        return $this->logout($_SESSION["logged"], "52e4ceec7c8f3ce37fa7cb898d52b501");
      }

      private function logout($user, $devkey){
        $res = json_decode($this->CURLWPOST($this->logouturl, array(
          "uniquekey" => $user,
          "fingerprint" => $devkey
        )), true);

        //die(print_r($this->logouturl));
        if($res["error"])
          return false;

        setcookie("keepmeloggedin", "", time() - 3600, "/Login");
        unset($_SESSION);
        return true;
      }

      public function kULI($hash){
        return $this->keepUserLoggedIn($hash, "52e4ceec7c8f3ce37fa7cb898d52b501", "2345678");
      }
      private function keepUserLoggedIn($hash, $devkey, $lalo){
        $res = json_decode($this->CURLWPOST($this->keepmeloggedinurl, array(
           "hash" => $hash,
           "lalo" => $lalo,
           "fingerprint" => $devkey
         )), true);

         if(!is_array($res))
            return false;
          if(!$res["error"]){
            $this->login($res["logged_user"]);
            return true;
          }
          else if($res["deletecookie"])
            setcookie("keepmeloggedin", "", time() - 3600, "/Login");
          return false;
      }
    }
