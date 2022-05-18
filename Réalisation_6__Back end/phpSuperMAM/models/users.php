<?php  
    class Users {
        // attributs pour se connecter à la BDD
        public $connect;
        private $table = 'users';

        //attributs de la classe selon ce que j'ai identifié
        // comme besoin et qui sont déjà implémenter dans la base de données

        private $id_user;
        private $name_user;
        private $firstName_user;
        private $phone_user;
        private $address_user;
        private $cp_user;
        private $mail_user;
        private $password;
        private $admin;//NB!!! BOOLEAN

        

        // constructeur qui va établir la connexion à la BDD
        public function __construct() {
            $this->connect = new MyDBConfig();
            $this->connect = $this->connect->getConnection();
        }

        //génération des getters et setters
        public function getTable(){
            return $this->table;
        }
    
        public function getId_user(){
            return $this->id_user;
        }
    
        public function getName_user(){
            return $this->name_user;
        }
        public function setName_user($name_user){
            $this->name_user = $name_user;
        }
    
        public function getfirstName_user(){
            return $this->firstName_user;
        }
        public function setfirstName_user($firstName_user){
            $this->firstName_user = $firstName_user;
        }
        public function getPhone_user(){
            return $this->name_user;
        }
        public function setPhone_user($phone_user){
            $this->phone_user = $phone_user;
        }
        public function getAddress_user(){
            return $this->address_user;
        }
        public function setAddress_user($address_user){
            $this->address_user = $address_user;
        }
        public function getCp_user(){
            return $this->cp_user;
        }
        public function setCp_user($cp_user){
            $this->cp_user = $cp_user;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getMail(){
            return $this->mail_user;
        }
        public function setMail($mail_user){
            $this->mail_user = $mail_user;
        }
/* ----------------------------------------est ce que je dois l'écrire???- c'est un boolean en plus--------------------
        public function getAdmin(){
            return $this->admin;
        }
        public function setAdmin($admin){
            $this->admin = $admin;
        }
    
        */

        //création des méthodes de base  CRUD

        // Read pour récupérer la liste de tous les utilisateurs
        public function getUsers() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            '.$this->table.' as u
                        JOIN
                        contract as c
                        JOIN
                        name_child as nch
                        WHERE
                        ch.id_user = nbc.number
                        AND 
                        ch.id_child = nbc.number';

            // stockage dans variable de la préparation de la requête
            $stmt = $this->connect->prepare($myQuery);

            //exécution de la requête
            $stmt->execute();

            // je retourne le résultat
            return $stmt;
        }

        //Read d'un seul utilisateur selon son pseudo
        //(peut-être modifié avec recherche par id ou mail, etc)

        public function getSingleUser() {
            // stokage de la requête dans une variable
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            '.$this->table.'
                        JOIN
                            contract,
                            child
                        WHERE
                            '.$this->table.'.id_contract = contract.id_contract
                        AND 
                            '.$this->table.'.child = child.id_child
                        AND 
                            name_child = :name_child';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(":name_child", $this->name_child);
            $stmt->execute();
            return $stmt;
        }

        // Création et donc insertion d'un nouvel utilisateur dans la BDD
        // dans un premier temps nous ne tiendrons pas compte des champs
        // idRoleSite et idRoleGame
        public function createUser() {
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            name_user = :name_user,
                            password = :password,
                            mail_user = :mail_user,
                            firstName_user = :firstName_user,
                            phone_user = :phone_user,
                            address_user =:address_user,
                            cp_user =:cp_user';
//INSERT INTO users SET name_user = 'Bond', password = 123, mail_user = '007@gmail.com', firstName_user = 'James', phone_user = 7894723, address_user = 'Nice', cp_user =47180 
/*
                            idRoleSite = :idRoleSite,
                            idRoleGame = :idRoleGame';*/
            // dans cette requête j'ai créé les paramètres :pseudo, :password et : mail 
            //auxquels j'attribuerais des valeurs lors du bind des paramètres

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':name_user', $this->name_user);
            $stmt->bindParam(':firstName_user', $this->firstName_user);
            $stmt->bindParam(':phone_user', $this->phone_user);
            $stmt->bindParam(':address_user', $this->address_user);
            $stmt->bindParam(':cp_user', $this->cp_user);
            
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':mail_user', $this->mail_user);
            /*
            $stmt->bindParam(':idRoleSite', $this->idRoleSite);
            $stmt->bindParam(':idRoleGame', $this->idRoleGame);
            $stmt->bindParam(':admin', $this->admin);*/



            return $stmt->execute();


        }

        // UPDATE mise à jour de l'utilisateur selon son pseudo
        public function updateUser(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            name_user = :name_user,
                            firstName_user = :firstName_user,
                            phone_user = :phone_user,
                            address_user = :address_user,
                            cp_user =:cp_user,

                            password = :password,
                            mail_user = :mail_user,

                        WHERE
                        name_user = :name_user2';
        //UPDATE users SET name_user = 'Sherlok', firstName_user = 'Bob', phone_user = 7874123, address_user = 'Paris', cp_user = 27180, password = 123, mail_user = 'boby@gmail.com' WHERE name_user = 'Boby'; 

            $stmt = $this->connect->prepare($myQuery);

            // bind des paramètres
            $stmt->bindParam(':name_user', $this->name_user);
            $stmt->bindParam(':firstName_user', $this->firstName_user);
            $stmt->bindParam(':phone_user', $this->phone_user);
            $stmt->bindParam(':address_user', $this->address_user);
            $stmt->bindParam(':cp_user', $this->cp_user);
            
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':mail_user', $this->mail_user);
            /*
            $stmt->bindParam(':idRoleSite', $this->idRoleSite);
            $stmt->bindParam(':idRoleGame', $this->idRoleGame);
            $stmt->bindParam(':admin', $this->admin);*/

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
        public function deleteUser() {
            $myQuery = 'DELETE FROM '.$this->table.' WHERE name_user = '.$this->name_user.'';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':name_user', $this->name_user);

            if($stmt->execute) {
                // je retourne true si mise à jour réussie
                return true;
            } else {
                return false;
            }
        }
         // vérification si un pseudo ou un mail est déjà existant
        public function verifyMail() {
            $myQuery = 'SELECT
                            *
                        FROM
                            '.$this->table.'
                        WHERE 
                        mail_user = :mail_user';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':mail_user', $this->mail_user);

            $stmt->execute();
            return $stmt;
        }

    }
?>