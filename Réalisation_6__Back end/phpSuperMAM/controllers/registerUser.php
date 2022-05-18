<?php

    // ajout des headers dont celui qui autorise les methods en POST 
    // et celui qui autorise toutes les origines
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    
    // appel des fichiers nécessaires
    include_once('../utils/mydbconfig.php');
    include_once('../models/users.php');


    //création de variables pour les retourner en json
    $success = 0;
    $msg = "Une erreur est survenue dans le php";
    $data = [];

    // vérification des champs
    if(!empty($_POST['name_user'])
        &&(!empty($_POST['firstName_user']))
        &&(!empty($_POST['phone_user']))
        &&(!empty($_POST['address_user']))
        &&(!empty($_POST['cp_user']))

        && !empty($_POST['password'])
        && !empty($_POST['confPassword'])
        && !empty($_POST['mail_user'])
        && !empty($_POST['confMail'])) {

        // je commence par créer des variables qui vont stocker les données envoyées par l'utilisateur 
        // en enlevant les blanc devant et derrière chaque données

        $name_user = trim($_POST['name_user']);
        $firstName_name = trim($_POST['firstName_user']);
        $phone_user = trim($_POST['phone_user']);
        $address_user = trim($_POST['address_user']);
        $cp_user = trim($_POST['cp_user']);
        
        $password = trim($_POST['password']);
        $confPassword = trim($_POST['confPassword']);
        $mail_user = trim($_POST['mail_user']);
        $confMail = trim($_POST['confMail']);


        if($password !== $confPassword) {

            $msg = 'Vos mots de passe ne sont pas identiques!!!';
        } else {

            if(!filter_var($mail_user, FILTER_VALIDATE_EMAIL)){

                $msg = "Cette adresse e-mail n'est pas valide!!!";
            }
          
            else if(!filter_var($confMail, FILTER_VALIDATE_EMAIL)){
         
                $msg = "Cette confirmation d'adresse e-mail n'est pas valide!!!";
            }
         
            else if($mail_user !== $confMail){
          
                $msg = "Vos emails ne sont pas identiques!!!";
            } else {
                $verifPassword = htmlspecialchars(strip_tags($password));
                $verifMail = htmlspecialchars(strip_tags($mail_user));
                $verifName = htmlspecialchars(strip_tags($name_user));
                $veriffirstName_user = htmlspecialchars(strip_tags($firstName_name));
                $verifphone_user = htmlspecialchars(strip_tags($phone_user));
                $verifaddress_user = htmlspecialchars(strip_tags($address_user));
                $verifcp_user = htmlspecialchars(strip_tags($cp_user));
           

                // je crée maintenant une nouvelle instance d'utilisateur
                $newUser = new Users();
                

                // et j'utilise les setters de la classe User pour affecter les valeurs des variables aux attributs de la classe

                $newUser->setPassword(password_hash($verifPassword, PASSWORD_BCRYPT));
                $newUser->setName_user($verifName);
                $newUser->setMail($verifMail);
                $newUser->setfirstName_user($veriffirstName_user);
                $newUser->setPhone_user($verifphone_user);
                $newUser->setAddress_user($verifaddress_user);
                $newUser->setCp_user($verifcp_user);

                // avant de pourvoir procéder à l'insertion en base de données
                // je vais vérifier que le pseudo ou le mail n'existe pas déjà 
                // dans ma base de données
                // je stocke dans une variable le retour de la fonction qui se trouve dans ma classe User
                $retourDelaclasse = $newUser->verifyMail();
                // puis je stocke dans une variable le résultat du décompte du nombre de ligne
                // de ce retour grâce à la fonction PHP rowCount()
                $nbrLignes = $retourDelaclasse->rowCount();

                if($nbrLignes>0) {
                    $msg = "Mail déjà utlisé, veuillez renouveler votre demande avec d'autres informations";
                } else {
                    // une fois toutes les étapes précédentes réalisées, il ne me reste plus qu'à appeler la fonction
                    // createUser incluse dans la classe User.
                    // avec l'ajout de la classe ErrorMessage je vais également retourner une information
                    // pour confirmer la création ou non de l'utilisateur
                    if($newUser->createUser()) {
                        $success = 1;   
                        $msg = "Utilisateur créé avec succès";
                        $data['id_user'] =  $newUser->connect->lastInsertId() ;
                        $data['name_user'] = $newUser->getName_user();
                    } else {
                        // je passe une valeur à la variable $msg pour traiter cette erreur
                        $msg = "Erreur lors de l'enregistrement, veuillez renouveler votre demande!!!";
                    }
                   
                }
            }
        }
    } else {
        // je passe une valeur à la variable $msg pour traiter cette erreur
        $msg = "Veuillez remplir tous les champs!";
    }
    
    // si ma variable $success est égal à 1
    if($success == 1){
        // je crée un tableau qui contiendra le success, un msg et de la data
        $res = ["success" => $success, "msg" => $msg, "data" => $data];
        // puis j'encode le tout en json pour le retourner
        echo json_encode($res);
    } else {
        // sinon je retourne seulement un tableau contenant success et msg
        $res = ["success" => $success, "msg" => $msg];
        echo json_encode($res);
    }
    
?>