<?php  
    class Contract {
        // attributs pour se connecter à la BDD
        public $connect;
        private $table = 'contract';

        //attributs de la classe selon ce que j'ai identifié
        // comme besoin et qui sont déjà implémenter dans la base de données
        private $id_contract;
        private $number;

        // constructeur qui va établir la connexion à la BDD
        public function __construct() {
            $this->connect = new MyDBConfig();
            $this->connect = $this->connect->getConnection();
        }

        //génération des getters et setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_contract(){
            return $this->id_contract;
        }
        public function setId_contract($Id_contract){
            $this->id_contract = $id_contract;
        }

        public function getNumber(){
            return $this->roleSiteName;
        }
        public function setNumber($number){
            $this->number = $number;
        }

        //création des méthodes de base  CRUD

        public function getNumber() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT * FROM '.$this->table.'';

            // stockage dans variable de la préparation de la requête
            $stmt = $this->connect->prepare($myQuery);

            //exécution de la requête
            $stmt->execute();

            // je retourne le résultat
            return $stmt;
        }

        public function getSingleNumber() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT * FROM '.$this->table.' WHERE number = '.$this->number.'';

            // stockage dans variable de la préparation de la requête
            $stmt = $this->connect->prepare($myQuery);

            //exécution de la requête
            $stmt->execute();

            // je retourne le résultat
            return $stmt;
        }

        public function createNumber() {
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                        number = :number';

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':number', $this->number);

            return $stmt->execute();
        }

        // UPDATE mise à jour de l'utilisateur selon son pseudo
        public function updateNumber(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                        number = :number
                        WHERE
                        number = :number2';

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':number', $this->number);
            $stmt->bindParam(':number2', $this->number);

            if($stmt->execute) {
                // je retourne true si mise à jour réussie
                return true;
            } else {
                return false;
            }
            // ci-dessus je peux simplifier en écrivant return $stmt->execute();
        }

        // DELETE suppression d'un utilisateur selon pseudo 
        // (on peut aussi avec un autre attribut selon son besoin)
        public function deleteNumber() {
            $myQuery = 'DELETE FROM '.$this->table.' WHERE number = :number';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':number', $this->number);

            if($stmt->execute) {
                // je retourne true si mise à jour réussie
                return true;
            } else {
                return false;
            }
        }
         // vérification si un pseudo ou un mail est déjà existant
        public function verifyNumberContract() {
            $myQuery = 'SELECT
                            *
                        FROM
                            '.$this->table.'
                        WHERE 
                        number = :number';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':number', $this->number);

            $stmt->execute();
            return $stmt;
        }
    }
?>