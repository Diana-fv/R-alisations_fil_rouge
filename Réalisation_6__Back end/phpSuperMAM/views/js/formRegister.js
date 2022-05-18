// je récupère mon formulaire tout en lui ajoutant une écoute
document.getElementById("registerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // je récupère les données du formulaire dans la variable (le formulaire est représenté par this)
    let data = new FormData(this);

    // je crée une variable qui est une instance d'une requête XMLHTTP
    let xhr = new XMLHttpRequest();

    // je fais appelle à la fonction onreadystatechange qui retourne les changements d'états du client (navigateur)
    // selon les résultat de la requete XML
    xhr.onreadystatechange = function () {
        // si le serveur me repond avec un code http 200 et que readyState est = à 4
        // le 4 signifie que la requête a bien été envoyé, que le serveur a traiter la requête
        // et qu'il a retourner une réponse et qu'enfin le navigateur a fini de télécharger le 
        // contenu de la réponse.
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            // je parse le json reçu pour pouvoir l'exploiter

            try {
                let res = JSON.parse(this.response);
                console.log(res);
                // si dans ma réponse je trouve le success égal à 1
                if (res.success == 1) {
                    // je crée un objet myUser avec une clé pseudo dont la valeur est vide 
                    let myUser = { "id": "", "name_user": "", "firstName_user": "", "phone_user": "", "address_user": "", "cp_user": "", "mail_user": "", "address_user": "" };
                    // puis a cette clé j'attribue la valeur reçu dans le résultat de la requête
                    myUser.id = res.data.idUser;
                    myUser.name_user = res.data.name_user;
                    myUser.firstName_user = res.data.firstName_user;
                    myUser.phone_user = res.data.phone_user;
                    myUser.address_user = res.data.address_user;
                    myUser.cp_user = res.data.cp_user;
                    myUser.mail_user = res.data.mail_user;
                    myUser.password = res.data.password;


                    // ensuite je crée une variable pour stocker le rendu du stringify sur mon objet myUser
                    let toJson = JSON.stringify(myUser);
                    // je crée l'item myUser dans le localStorage
                    localStorage.setItem('myUser', toJson);
                    // j'affiche une message pour avertir du bon enregistrement
                    alert(res.msg);
                    // je retourne sur la page index.html
                    document.location.href = "../index.html";
                } else {
                    // si le success n'est pas égal à 1 j'affiche un message d'erreur
                    alert(res.msg);
                }
            }
            catch (error) {
                console.log(error);
                // dans le cas où la requête XML échoue j'affiche également un message
                document.body.innerHTML = this.response ;

            }
        } else if (this.readyState == 4) {
            console.log("Une erreur est survenue... : " + this.msg);
            alert("Une erreur est survenue... : " + this.msg);
        }
    };

    // je demande à ma variable xhr contenant l'instance XMLHttpRequest
    // d'établir une connexion en POST vers le lien que je lui donne
    // le true signale que cette requête est en asynchrone
    xhr.open("POST", "../controllers/registerUser.php", true);
    // enfin je demande à ma variable d'envoyer le formulaire à mon controleur php en lui passant 
    // data en paramètre et qui représente toutes les données du formulaire
    xhr.send(data);

    // par défault je retourne un false pour ne pas bloqué le script js?
    return false;
});


