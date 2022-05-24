<?php
	function display_homepage(){
		include 'views/homepage.php';
	}

	function display_add_user_form(){
		include 'views/add_user.php';
	}

	function display_login_form($error = ''){
		if (isset($error)){
			// traiter le ou les cas d'erreurs.
            /*echo "<script type='text/javascript'>alert('$error');</script>";*/
			include 'views/connection.php';
		} else {
			include 'views/connection.php';
		}
	}

	function logout(){
		session_destroy();
		header('Location: home');
	}

    function path_to($path){
        return BASE_PATH . strtolower($path);
    }

    function login($login, $password){
    	require_once 'model/user.php';
    	$user = get_user($login);

    if (isset($user) && password_verify($password, $user['password_user'])){
    		$_SESSION['name'] = $user['name_user'];
    		$_SESSION['firsname'] = $user['firstName_user'];
    		$_SESSION['login'] = $user['login_user'];
            $_SESSION['id_user'] = $user['id_user'];
            display_list_childs();
    		//display_homepage();
    	} else {
    		display_login_form();
    	}
        
    }

    function display_list_childs(){
        include 'model/child.php';
        $childs_query = get_user_childs($_SESSION['id_user']);
        
        // ajout de la vue
        include 'views/childs.php';
    }
//---------------------------------------------------------- user ---------------------------------------//
//-----------------add user----------------//
function handle_add_user($name, $firstname, $login, $pwd) {
    require_once 'model/user.php';

    if(get_user($login) !== null ){ // On pourrait faire d'autres vérifications si on le voulait.
        display_login_form();
    }else{
        $name_user = trim($name);
        $firstName_user = trim($firstname);
        $login_user= trim($login);
        $password_user= password_hash($pwd, PASSWORD_BCRYPT);

        add_user($name_user, $firstName_user, $login_user, $password_user);
        header('Location: login');
    }           
}

function handle_update_user() {
//pour modifie des info d'utilisateur:
    require 'views/modify_user.php';
	
	require 'config.php';
	
    if(isset(
        $_POST['name_user'],
        $_POST['field'],
        $_POST['modification']
        )){
            $name_child = $_POST['name_user'];
            $field = $_POST['field'];
            $modif = $_POST['modification'];
            
            //require '../model/modify.php';
            updateUser($name_child, $field, $modif);
	}
}
function handle_delete_user() {
        //supprime les info d'utilisateur NB!!! il faut creer le view!!!
        require 'views/delete_user.php';
            
        require 'config.php';
        
        if(isset(
        $_POST['name_user'])){
            $name_user = $_POST['name_user'];

            //require '../model/delete.php';
            deleteUser($name_user);
        }
}

//---------------------------------------------------------- child ---------------------------------------//
function handle_add_child() {
//-----------------add_child----------------//
    // ajout de la vue
    require 'views/add_child.php';

    // connexion à la bdd
    require 'config.php';

    // vérification des champs de formulaire
    if(isset(
        $_POST['name_child'],
        $_POST['firstName_child'],
        $_POST['date_of_birth']
        )) {
            $name_child = $_POST['name_child'];
            $firstName_child = $_POST['firstName_child'];
            $date_of_birth= $_POST['date_of_birth'];


        //require '../model/add_child.php';
        add_child($name_child, $firstName_child,$date_of_birth);
    }
}

function handle_update_child() {
//pour modifie des info d'enfant:
    require 'views/modify_child.php';
	
	require 'config.php';
	
    if(isset(
        $_POST['name_child'],
        $_POST['field'],
        $_POST['modification']
        )){
            $name_child = $_POST['name_child'];
            $field = $_POST['field'];
            $modif = $_POST['modification'];
            
            //require '../model/modify.php';
            update_child($name_child, $field, $modif);
	}
}

function handle_delete_child() {
    //supprime les info d'un enfant
        require 'views/delete.php';
            
        require 'config.php';

        if(isset(
        $_POST['name_child'])) {
            $name_child= $_POST['name_child'];

            //require '../model/delete.php';
            delete_child($name_child);
        }
}

function handle_search_child() {
    require 'views/search.php';
	
	require 'config.php';
	
	if(isset(
	$_POST['search'])){
		$search = $_POST['search'];
        
        echo "<script type=“text/javascript”>
        window.onbeforeunload = function() {
        window.name = “reloader”;
        }</script>";
	}
    search_child($search);
}
