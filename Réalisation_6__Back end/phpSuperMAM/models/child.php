<?php  
    class Child {
        // attributs pour se connecter à la BDD
        public $connect;
        private $table = 'child';

        //attributs de la classe selon ce que j'ai identifié
        // comme besoin et qui sont déjà implémenter dans la base de données
        private $id_child;
        private $name_child;
        private $id_contract = 1; // valeur par défaut correspondant à l'id de la bdd
        private $id_user = 1;

        // constructeur qui va établir la connexion à la BDD
        public function __construct() {
            $this->connect = new MyDBConfig();
            $this->connect = $this->connect->getConnection();
        }

        //génération des getters et setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_child(){
            return $this->idRoleGame;
        }
        public function setId_child($id_child){
            $this->id_child = $id_child;
        }

        public function getName_child(){
            return $this->name_child;
        }
        public function setName_child($name_child){
            $this->name_child = $name_child;
        }

        public function getId_contract(){
            return $this->id_contract;
        }
        public function setId_contract($id_contract){
            $this->id_contract = $id_contract;
        }
    
        public function getId_user(){
            return $this->id_user;
        }
        public function setId_user($id_user){
            $this->id_user = $id_user;
        }
        //création des méthodes de base  CRUD

        public function getName_child() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT * FROM '.$this->table.'';

            // stockage dans variable de la préparation de la requête
            $stmt = $this->connect->prepare($myQuery);

            //exécution de la requête
            $stmt->execute();

            // je retourne le résultat
            return $stmt;
        }

        public function getSingleName_child() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT * FROM '.$this->table.' WHERE name_child = '.$this->name_child.'';

            // stockage dans variable de la préparation de la requête
            $stmt = $this->connect->prepare($myQuery);

            //exécution de la requête
            $stmt->execute();

            // je retourne le résultat
            return $stmt;
        }

        public function createName_child() {
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                        name_child = :name_child';

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':name_child', $this->name_child);

            return $stmt->execute();
        }

        // UPDATE mise à jour de l'utilisateur selon son pseudo
        public function updateName_child(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                        name_child = :name_child
                        WHERE
                        name_child = :name_child2';

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':name_child', $this->name_child);
            $stmt->bindParam(':name_child2', $this->name_child);

            if($stmt->execute) {
                // je retourne true si mise à jour réussie
                return true;
            } else {
                return false;
            }
            // ci-dessus je peux simplifier en écrivant return $stmt->execute();
        }

        public function deleteName_child() {
            $myQuery = 'DELETE FROM '.$this->table.' WHERE name_child = :name_child';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':name_child', $this->name_child);

            if($stmt->execute) {
                // je retourne true si mise à jour réussie
                return true;
            } else {
                return false;
            }
        }
    }
?>