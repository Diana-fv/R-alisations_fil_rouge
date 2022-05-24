<?php // router
session_start();
require_once ('config.php');
require_once ('controler/controler.php');

// TO DO: fixer les urls qui contiennent des "/" pour que les path restent corrects

$page = strtolower($_SERVER['REQUEST_URI']); // Récupère ce qu'il y a après le http:// de l'url (par exemple supermam/adduser)

switch($page) {
    case path_to('login'):  //on regarde si les champs sont rempli
        if (!empty($_POST['login_user']) && !empty($_POST['password_user'])) {
            login($_POST['login_user'], $_POST['password_user']);
        } else {
            display_login_form();
        }
        break;
    case path_to('add_user'):   //on affiche le formulaire
        if (
            !empty($_POST['name_user']) &&
            !empty($_POST['firstName_user']) &&
            !empty($_POST['login_user']) &&
            !empty($_POST['password_user'])
        ) {
            handle_add_user(
                $_POST['name_user'],
                $_POST['firstName_user'],
                $_POST['login_user'],
                $_POST['password_user']
            );
        }
        display_add_user_form();
        break;
    case path_to('update_user'):   
        
        handle_update_user();
        break;
    case path_to('delete_user'):   
    
        handle_delete_user();
        break;
    case path_to('add_child'):   

        handle_add_child();
        break;
    case path_to('update_child'):   

        handle_update_child();
        break;
    case path_to('delete_child'):   

        handle_delete_child();
        break;
    case path_to('search'):   

        handle_search_child();
        break;
    case path_to('logout'):   
        logout(); 
        break;
    default:
        display_homepage();
        break;
}