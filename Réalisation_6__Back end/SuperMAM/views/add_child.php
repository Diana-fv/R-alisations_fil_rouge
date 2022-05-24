<?php include('views/components/header.php');?>
<div>
    <?php if(isset
        ($_SESSION['name'])){ ?>
            <button class="btn btn-outline-dark position-relative m-5 ">Mes enfants</button>
            
    <?php } ?>
    </div>
    <section class="p-5 align-middle text-center">
    
    <div class="container">
    <h5 class="text-center">Ajouter un enfant</h5>
        <div class="row align-items-center offset-md-3">
            <div class="container py-4">
            <form action="" method="POST" class="form-horizontal">
                

            <div class="mb-4">
            <div class="col-lg-7">
                <label class="form-label" for="name_child">Saisissez le nom</label>
                <input class="form-control" type="text" name="name_child" placeholder="Nom" />
            </div>
            </div>
            <br>
            <div class="mb-4">
            <div class="col-lg-7">
            <label class="form-label" for="firstName_child">Saisissez le prenom</label>
            <input class="form-control" type="text" name="firstName_child" placeholder="Prenom" />
            </div>
            </div>
            <br>
            <div class="mb-4">
            <div class="col-lg-7">
            <label class="form-label" for="date_of_birth">Saisissez la date d'anniversaire</label>
            <input class="form-control" type="date" name="date_of_birth"placeholder="la date d'anniversaire" />
            <br>

            <input type="submit" class="btn btn-outline-dark position-relative m-3" value="Valider">
            </div>
            </div>
            
        </form>
            </div>
        </div>
    </div>
</section>
<?php include('views/components/footer.php');?>