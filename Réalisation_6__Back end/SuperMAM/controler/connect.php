<?php
  // ajout des headers dont celui qui autorise les methods en POST 
    // et celui qui autorise toutes les origines
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    
    // appel des fichiers nécessaires
    include_once('views/connection.php');
    include_once('config.php');

    // connexion à la bdd
    //require '../config.php';
    //require_once (__DIR__ . '/../../config.php');


    // validation formulaire
    if(isset($_POST['login_user'], $_POST['password_user'])){
        $login_user = $_POST['login_user'];
        $password_user = $_POST['password_user'];


        // Récupérer le pwd hashé en BDD

        $query = database()->prepare("SELECT password_user FROM users WHERE
            login_user = :login_user"
        );

        $query->execute(array(
            ':login_user' => $login_user,  
        ));

        $hashed_pwd = $query->fetchAll()[0]['password_user'];

        // Fin de récup

        // Comparer le pwd envoyé dans le formulaire et le pwd hashé 
        if(password_verify($password_user,$hashed_pwd)) {
            echo'Le mot de passe est valide !';
            // sauvegarder la variable de session ici
            // Il faudra que je t'explique comment fonctionnent les sessions
            //D'après ce que je vois en dessous, ça n'est pas clair.
        } else {
            echo 'Le mot de passe est invalide!';
}

        if (password_verify($_POST['password_user'], $password_user)) {
            //$_SESSION['user_id'] = $user['id'];

            
        // on démarre notre session
        session_start ();

            $_SESSION['login_user'] = $_POST['login_user'];
            $_SESSION['password_user'] = $_POST['password_user'];

            header ('location:./index.php');
            exit();
        }

        require 'model/connection.php'; // il devrait être là??????????????? où avant  }?


    } else {
        // Le visiteur n'a pas été reconnu comme étant membre de site. 
		echo "<script type='text/javascript'>alert('Membre non reconnu...');</script>";
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
    
?>