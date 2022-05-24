<?php
require_once 'model/user.php';

try{
    $query = database()->query('SELECT * FROM users');

    $check = false;

    while($data = $query->fetch()){
        if($data['login_user'] == $login_user && $data['password_user'] == $password_user){ //NB true / faule
            $check = true; // ajout passwordverifi
        } 
    }


    if($check == true){
        list_childs();
        //header('Location: ../controler/childs.php');
        //ajouter session start
    } else {

        echo "<script type='text/javascript'>alert('Login ou mot de passe incorrect!');</script>";
    }

} catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
}

function query () {
    try {
        $query = database()->prepare(" "); 
            
        $execution = $query->execute();
        return $query;
    } catch (EXCEPTION $e) {
    
        die($e);
    }

}
?>