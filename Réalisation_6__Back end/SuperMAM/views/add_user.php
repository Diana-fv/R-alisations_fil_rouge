<?php include('views/components/header.php');?>
    <section class="p-5 align-middle text-center">
    <div>
    <div class="container">
    <h5 class="text-center">Ajouter un utilisateur</h5>
        <div class="row align-items-center offset-md-3">
            <div class="container py-4">
            <form action="" method="POST" class="form-horizontal">
                

            <div class="mb-4">
            <div class="col-lg-7">
                <label class="form-label" for="name_user">Saisissez le nom</label>
                <input class="form-control" type="text" name="name_user" placeholder="Nom" />
            </div>
            </div>
            <br>
            <div class="mb-4">
            <div class="col-lg-7">
            <label class="form-label" for="firstName_user">Saisissez le prenom</label>
            <input class="form-control" type="text" name="firstName_user" placeholder="Prenom" />
            </div>
            </div>
            <br>
            <div class="mb-4">
            <div class="col-lg-7">
            <label class="form-label" for="login_user">Saisissez login</label>
            <input class="form-control" type="text" name="login_user"placeholder="Login" />
            <br>

            <div class="mb-4">
            <div class="col-lg-7">
            <label class="form-label" for="password_user">Saisissez password</label>
            <input class="form-control" type="password" name="password_user" placeholder="Password" />
            <br>

            <input type="submit" class="btn btn-outline-dark position-relative m-3" value="Valider">
            </div>
            </div>
            
        </form>
            </div>
        </div>
    </div>
    </div>
</section>
    
<?php include('views/components/footer.php');?>