<?php include('views/components/header.php');?>
<div>
    <?php if(isset
        ($_SESSION['name'])){ ?>
            <button class="btn btn-outline-dark position-relative m-5 ">Mes enfants</button>
            
    <?php } ?>
    </div>
<section class="p-5 align-middle text-center">
    <div class="container">
        <div class="row align-items-center offset-md-3">
            <div class="container py-4">
                <form action="" method="POST">
                    <h5>Modifier les informations à un enfant</h5>
                        <input type="text" name="name_child" placeholder="Nom de l'enfant" required>
                        <select name="field" id="field" required>
                                <option value="" disabled selected hidden>Ce que vous voulez modifier</option>
                                <option value="name_child">Nom de l'enfant  </option>
                                <option value="firstName_child">Prénom de l'enfant</option>
                                <option value="date_of_birth">date de l'anniversaire</option>
                        </select> 
                        <input type="text" name="modification" placeholder="Modification" required>
                    <input type="submit" value="Valider">
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('views/components/parallax.php');?>
<?php include('views/components/footer.php');?>