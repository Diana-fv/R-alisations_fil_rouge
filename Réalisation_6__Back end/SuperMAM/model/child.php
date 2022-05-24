<?php
    function get_user_childs($id_user){
        try {
            $query = database()->prepare('SELECT * FROM child
                JOIN have ON child.id_child = have.id_child
                WHERE have.id_user = :id_user');
            $query->bindValue(':id_user', $id_user);
            $query->execute();

            return $query;
        } catch (EXCEPTION $e) {
            die("Une erreur est survenue : ".$e);
        }
    }

    function add_child($name_child, $firstName_child, $date_of_birth) {
            try {
                $query = database()->prepare("INSERT INTO child SET 
                    name_child = :name_child,
                    firstName_child = :firstName_child,
                    date_of_birth = :date_of_birth"
                ); 

                $execution = $query->execute(array(
                    ':name_child' => $name_child, 
                    ':firstName_child' => $firstName_child, 
                    ':date_of_birth' => $date_of_birth
                ));
                if ($execution){
                    echo "<script type='text/javascript'>alert('L'enfant a bien été ajouté.');</script>";
                    list_childs();
                }

            } catch (EXCEPTION $e) {
                die("Une erreur est survenue : ".$e);
            }

    }

    function update_child($field, $modif, $name_child) {
        try {
            $query = database()->prepare("UPDATE child 
                    SET $field = '$modif'
                    WHERE name_child = '$name_child' "); 
                    //UPDATE child  SET name_child = 'Rony' WHERE name_child = 'ron';
    
            $execution = $query->execute();
            
            if ($execution){
                echo "<script type='text/javascript'>alert('Les info l'enfant a bien été modifié.');</script>";
                list_childs();
                //echo "<script type='text/javascript'>window.location.replace('../controler/childs.php');</script>"; //
            }
        } catch (EXCEPTION $e) {
    
            die("L'enfant n'a pas pu être modifié." .$e);
        }

    }


    function delete_child($name_child) {
        try {
            $query = database()->prepare("DELETE FROM child WHERE name_child = :name_child"); 
            $execution = $query->execute(array(
                'name_child' => $name_child
            ));
            if ($execution){
                echo "<script type='text/javascript'>alert('Les info l'enfant a bien été supprimé.');</script>";
                list_childs();
                //echo "<script type='text/javascript'>window.location.replace('../controler/childs.php');</script>";//
            }
        } catch (EXCEPTION $e) {
            die("Les info l'enfant n'a pas pu être supprimé.");
        }

    }



    function search_child($search) {
        try{

            $query = database()->query("SELECT * FROM child 
            INNER JOIN contract ON child.id_child = contract.id_contract 
            INNER JOIN getting ON child.id_child = getting.id_child 
            INNER JOIN absence ON getting.id_absence = absence.id_absence 
            WHERE name_absence LIKE '%$search%'
            ");
            
            while($data =$query->fetch()){
                if($data['name_absence'] == "vacances"){
                    echo "<p>L'enfant a ete en vacances</p>";
                } else{
                    $data['name_absence'] = "congés";
                    echo "<p>L'enfant a ete en congés</p>";
                }
    
    
                echo 
                    '<div>
                        <section>
                            <p><strong>Nom:</strong> '.$data['name_child'].'</p>
                            <p><strong>Prenom:</strong> '.$data['firstName_child'].'</p>
                            <p><strong>Date anniversaire:</strong> '.$data['date_of_birth'].'</p>
                        </section> 
                    </div>';
            }
        } catch(Exception $e){
                die('Erreur : ' .$e->getMessage());
        }
    }
?>