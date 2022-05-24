<?php include('views/components/header.php');?>
<div>
    <?php if(isset
        ($_SESSION['name'])){ ?>
            <button class="btn btn-outline-dark position-relative m-5 ">Mes enfants</button>
            
    <?php } ?>
    </div>
<section class="p-5 align-middle text-center">
    <div class="container">
    <h5 class="text-center">Supprimer</h5>
        <div class="row align-items-center offset-md-3">
            <div class="container py-4">
                <form action="" method="post">
                <div class="mb-4">
                    <div class="col-lg-7">
                        <label class="form-label" for="name_user">Saisissez le nom</label>
                        <input type="text" name="name_child" placeholder="Nom de l'enfant" required>
                        <input type="submit" value="Supprimer">
                    </div>
                </div>
            </form>
            </div>
	    </div>
    </div>
</section>

<?php include('views/components/parallax.php');?>
<?php include('views/components/footer.php');?>