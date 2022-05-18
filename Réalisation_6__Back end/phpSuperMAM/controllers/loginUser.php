<?php

    // ajout des headers dont celui qui autorise les methods en POST 
    // et celui qui autorise toutes les origines
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");

    // appel des fichiers nécessaires
    include_once('../utils/mydbconfig.php');
    include_once('../models/users.php');
    include_once('../models/child.php');
    include_once('../models/contract.php');

    //création de variables pour les retourner en json
    $success = 0;
    $msg = "Une erreur est survenue dans le php";
    $data = [];

    // vérification des champs
    if(!empty($_POST['name_user']) && !empty($_POST['firstName_user']) && !empty($_POST['password'])) {
        // voir registerUser.php pour explications
        $name_user = trim($_POST['name_user']);
        $firstName_user = trim($_POST['firstName_user']);
        $password = trim($_POST['password']);

        // voir registerUser.php pour explications
        $verifMail = htmlspecialchars(strip_tags($mail_user));
        $verifPassword = htmlspecialchars(strip_tags($password));

        // je crée des instances de User, RoleGame et RoleWebSite
        $itemUser = new Users();
        $itemRoleGame = new Child();
        $itemRoleSite = new Contract();

        // je donne des valeurs aux attributs de itemUser avec les données reçues
        $itemUser->setNumber($verifyNumberContract);
        $itemUser->setPassword($verifPassword);

        // j'appelle la fonction getSingleUser qui va chercher les utilisateurs ayant le pseudo reçu
        // je stocke le retour dans une variable
        $myReturn = $itemUser->getSingleUser();
        
        // puis je stocke dans une variable le résultat du décompte du nombre de ligne
        // de ce retour grâce à la fonction PHP rowCount()
        $nbrUsers = $myReturn->rowCount();

        // si aucune ligne
        if($nbrUsers == 0) {
            $msg = "Pas d'utilisateur ayant ce pseudo trouvé, vérifiez votre saisie!!!";
        // si plus de 1 ligne
        } else if($nbrUsers > 1 ) {
            $msg = "Il semblerait qu'il y ait une erreur, veuillez contacter un administrateur";
        // si seulement qu'une ligne
        } else if ($nbrUsers == 1) {
            while($rowUser = $myReturn->fetch()) {
                extract($rowUser);
                // je compare mot de passe reçu avec celui de la BDD
                // si il ne sont pas identiques je retourne un message d'erreur
                if(!password_verify($verifPassword, $rowUser['password'])) {
                    $msg = "Erreur dans votre mot de passe, veuillez recommencer!!!";
                // s'ils sont identiques je continue le log
                } else if (password_verify($itemUser->getPassword(), $rowUser['password'])) {
                    // je donne des valeurs aux attributs idRole de RoleSite et RoleGame
                    $itemContract->setId_contract($rowUser['id_contract']);
                    $itemChild->setId_child($rowUser['id_child']);
                    // je récupère ces 2 roles gràace à leurs méthodes get
                    $returnContract = $itemContract->getSingleNumber();
                    $returnChild = $itemChild->getSingleName_child();
                    // je crée 2 variables pour les données de roleSite
                    $id_contract;
                    $number;
                    while($rowContract = $returnContract->fetch()) {
                        extract($rowContract);
                        // en parcourant le retour j'attribut des valeurs aux variables
                        $id_contract =  intval($rowContract['id_contract'], 10);
                        $roleContract = $rowContract['number'];
                    }
                    // je fais la même chose que ci-dessus avec roleGame
                    $id_child;
                    $name_child;
                    while($rowName_child = $returnName_child->fetch()) {
                        extract($rowName_child);
                        $id_child =  intval($rowName_child['id_child'], 10);
                        $name_child = $rowName_child['name_child'];
                    }
                    // une fois terminé j'attribut des valeurs à mes retours
                    $success = 1;
                    $msg = "Connexion réussie";
                    $data['id_user'] = intval($rowUser['id_user'], 10);
                    $data['name_child'] = $rowUser['name_child'];
                    $data['id_child'] = $id_child;
                    $data['name_child'] = $name_child;
                    $data['id_contract'] = $id_contract;
                    $data['number'] = $number;
                }
            }
        }
    } else {
        // je passe une valeur à la variable $msg pour traiter cette erreur
        $msg = "Veuillez remplir tous les champs!!!";
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