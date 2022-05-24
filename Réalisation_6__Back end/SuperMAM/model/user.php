<?php
    function get_user($login){
        try {
            $query = database()->prepare("SELECT * FROM users WHERE login_user = :login_user");
            $query->bindValue(':login_user', $login);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if ($user == false){ 
                return null;
            }
            else{
                return $user;
            }
        } catch (EXCEPTION $e) {
            die("Une erreur est survenue : ".$e);
        }
    }
    
    function add_user($name, $firstName, $login, $password) {
            try {
                $query = database()->prepare("INSERT INTO users SET 
                    name_user = :name_user,
                    firstName_user = :firstName_user,
                    login_user = :login_user,
                    password_user = :password_user"
                );
                    // bind des paramètres
                $query->bindValue(':name_user', $name);
                $query->bindValue(':firstName_user', $firstName);
                $query->bindValue(':login_user', $login);
                $query->bindValue(':password_user', $password);

                if ($query->execute()){
                    echo "<script type='text/javascript'>alert('Utilisateur a bien été ajouté.');</script>";
                    echo "<script type='text/javascript'>window.location.replace('../index.php');</script>";
                }
            
            } catch (EXCEPTION $e) {
                die("Une erreur est survenue : ".$e);
            }
    }

    function updateUser($field, $modif, $name_user) { 
        try {
            $query = database()->prepare("UPDATE INTO users SET  /*NB! ecrire views pour modidfier user*/
                SET $field = '$modif'
                WHERE name_user = '$name_user' "
            ); 

            $execution = $query->execute();
            if ($execution){
                echo "<script type='text/javascript'>alert('Les info l'utilisateur a bien été modifié.');</script>";
                list_childs();
                //echo "<script type='text/javascript'>window.location.replace('../controler/childs.php');</script>"; /*-????*/
            }

        } catch (EXCEPTION $e) {
            die("Une erreur est survenue : ".$e);
        }
    }

    function deleteUser($name_user) {
            try {
                $query = database()->prepare("DELETE FROM users SET 
                    name_user = :name_user"
                ); 

                $execution = $query->execute(array(
                    ':name_user' => $name_user
                ));
                if ($execution){
                    echo "<script type='text/javascript'>alert('Utilisateur a bien été supprimé.');</script>";
                    list_childs();
                    //echo "<script type='text/javascript'>window.location.replace('../index.php');</script>";//
                }

            } catch (EXCEPTION $e) {
                die("Une erreur est survenue : ".$e);
            }
    }
