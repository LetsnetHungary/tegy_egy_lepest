<?

    class Projektek_Model extends CoreApp\Model {

        private $db;
        public function __construct() {
          $this->db = CoreApp\DB::init(CoreApp\AppConfig::getData("database=>config=>DB_NAME"));
        }

        public function loadProjects(){
          $stmt = $this->db->prepare("SELECT `project_id`, `type`, `content` FROM `projects` WHERE type = :type1 OR type = :type2 OR type = :type3");
          $stmt->execute(array(
            ":type1" => "title",
            ":type2" => "subtitle",
            ":type3" => "project"
          ));
          $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $return_array = [];
          foreach($array as $data){
            $return_array[$data["project_id"]][$data["type"]] = $data["content"];
          }
          return $return_array;
        }

        public function getProject($id){
          $stmt = $this->db->prepare("SELECT `project_id`, `type`, `content` FROM `projects` WHERE project_id = :id");
          $stmt->execute(array(
            ":id" => $id
          ));
          $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $return_array = [];
          foreach($array as $data){
            $return_array[0][$data["type"]] = $data["content"];
          }
          return $return_array;
        }
    }
