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

      private function checkLogin($email, $pw, $fingerprint, $lalo, $keepme){
        $res = json_decode($this->CURLWPOST($this->loginurl, array(
          "email" => $email,
          "uniquekey" => CoreApp\Session::get("logged"),
          "password" => $pw,
          "fingerprint" => $fingerprint,
          "keepmeloggedin" => $keepme,
          "lalo" => $lalo
        )), true);
        if($res["error"]){
          return array(
            "success" => false,
            "message" => $res["message"]
          );
        }
        $this->login($res["logged_user"], $fingerprint);
        //die(print_r($_SESSION));
        if(isset($res["cookie_hash"]) && $res["cookie_hash"] != "---"){
          setcookie("keepmeloggedin", $res["cookie_hash"], 2147483547, "/Login");
        }
        return array(
          "success" => true,
          "message" => $res["message"]
        );
      }
      private function login($uniq, $fingerprint){
        $_SESSION["logged"] = []; $_SESSION["logged"]["uniquekey"] = $uniq; $_SESSION["logged"]["fingerprint"] = $fingerprint;
      }

      public function lO(){
        return $this->logout($_SESSION["logged"], $_SESSION["logged"]["fingerprint"]);
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
        return $this->keepUserLoggedIn($hash, "---;---");
      }
      private function keepUserLoggedIn($hash, $lalo){
        $res = json_decode($this->CURLWPOST($this->keepmeloggedinurl, array(
           "hash" => $hash,
           "lalo" => $lalo
         )), true);

         if(!is_array($res))
            return false;
          if(!$res["error"]){
            $this->login($res["logged_user"], $res["fingerprint"]);
            return true;
          }
          else if($res["deletecookie"])
            setcookie("keepmeloggedin", "", time() - 3600, "/Login");
          return false;
      }
    }
