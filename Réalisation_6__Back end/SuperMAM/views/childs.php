<?php include('views/components/header.php');?>

    <!-- ========================= section menu ========================= -->
    <div>
    <?php if(isset
        ($_SESSION['name'])){ ?>
            <button class="btn btn-outline-dark position-relative m-5 ">Mes enfants</button>
            
    <?php } ?>
    </div>
    <section id="menu">
        <div class="container px-4">
            <div class="row gx-5 justify-content-between">
                <div class="col m-3 p-3 card">
                    <div class="text-center">
                        <img src="assets/img/crayon.jpg" class="img-fluid justify-content-center rounded-circle border-dark" style="max-width: 100px; max-height: 100px" alt="...">
                    </div>
                    <div class="text-center">
                        <a href="add_child" class="btn position-relative mb-5"><input type="submit" value="Ajouter un enfant"></a> <!--a href="../controler/add_child.php" -->
                    </div>
                </div>

                <div class="col m-3 p-3 card">
                    <div class="text-center">
                        <img src="assets/img/pied.jpg" class="img-fluid justify-content-center rounded-circle border-dark" style="max-width: 100px; max-height: 100px" alt="...">
                    </div>
                    <div class="text-center">
                        <a href="search" class="btn position-relative mb-5"><input type="submit" value="Rechercher"></a><!--a href="../controler/search.php" -->
                    </div>
                </div>

                <div class="col m-3 p-3 card">
                    <div class="text-center">
                        <img src="assets/img/rocket.jpg" class="img-fluid justify-content-center rounded-circle border-dark" style="max-width: 100px; max-height: 100px" alt="...">
                    </div>
                    <div class="text-center">
                        <a href="update_child" class="btn position-relative mb-5"><input type="submit" value="Modifier"></a>
                    </div>
                </div>

                <div class="col m-3 p-3 card">
                    <div class="text-center">
                        <img src="assets/img/date.jpg" class="img-fluid justify-content-center rounded-circle border-dark" style="max-width: 100px; max-height: 100px" alt="...">
                    </div>
                    <div class="text-center">
                        <a href="delete_child" class="btn position-relative mb-5"><input type="submit" value="Supprimer"></a> <!--a href="../controler/delete.php -->
                    </div>
                </div>

                <div class="col m-3 p-3 card">
                    <div class="text-center">
                        <img src="assets/img/booties.jpg" class="img-fluid justify-content-center rounded-circle border-dark" style="max-width: 100px; max-height: 100px" alt="...">
                    </div>
                    <div class="text-center">
                        <a href="logout" class="btn position-relative mb-5"><input type="submit" value="Se déconnecter"></a> <!--a href="../controler/connect.php -->
                    </div>
                </div>
            </div>
        </div>
<?php
    while($data =$childs_query->fetch()){
?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <p class="card-text"><h5>Nom:</h5><?= $data['name_child'] ?></p>
                    </div>
                    <div class="col">
                    <p class="card-text"><h5>Prenom:</h5><?= $data['firstName_child'] ?></p>
                    </div>
                    <div class="col">
                    <p class="card-text"><h5>Date anniversaire:</h5><?= $data['date_of_birth'] ?></p>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
?>
    
        </section>
<?php include('views/components/parallax.php');?>
<?php include('views/components/footer.php');?>
