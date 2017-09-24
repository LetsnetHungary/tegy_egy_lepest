<?

    class Admin_Model extends CoreApp\Model {

        private $db;
        public function __construct() {
          $this->db = CoreApp\DB::init(CoreApp\AppConfig::getData("database=>config=>DB_NAME"));
        }

        public function uploadData($array){
          $mykey = md5(microtime().rand());
          foreach ($array as $key => $value) {
            $stmt = $this->db->prepare("INSERT INTO projects (project_id, type, content) VALUES (:id, :type, :content)");
            $stmt->execute(array(
              ":id" => $mykey,
              ":type" => $key,
              ":content" => $value
            ));
          }
        }

        public function updateData($array){
          $id = $array["id"];
          unset($array["id"]);
          foreach ($array as $key => $value) {
            if(!empty($value)){
              echo($key);
              $stmt = $this->db->prepare("UPDATE projects SET content= :content WHERE project_id = :id AND type = :type");
              $stmt->execute(array(
                ":id" => $id,
                ":type" => $key,
                ":content" => $value
              ));
            }
          }
        }
        public function deleteData($array){
              $stmt = $this->db->prepare("DELETE FROM projects WHERE project_id = :id");
              $stmt->execute(array(
                ":id" => $array["id"]
              ));
        }
        public function getData(){
          $stmt = $this->db->prepare("SELECT `project_id`, `type`, `content` FROM `projects` WHERE 1 = 1 ");
          $stmt->execute();
          $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $return_array = [];
          foreach($array as $data){
            $return_array[$data["project_id"]][$data["type"]] = $data["content"];
          }
          return $return_array;
        }

        public function uploadImage($files){
          $uploaddir = '../../assets/images/';
          $uploadfile = $uploaddir . basename($files['file']['name']);

          return move_uploaded_file($files['file']['tmp_name'], $uploadfile);
        }
    }
