<?php include('views/components/header.php');?>
<div>
    <?php if(isset
        ($_SESSION['name'])){ ?>
            <button class="btn btn-outline-dark position-relative m-5 ">Mes enfants</button>
            
    <?php } ?>
    </div>
<section class="p-5 align-middle text-center">
    <div class="container">
        <h3 class="text-center">Search</h3>
        <h5 class="text-center">Trouver une information plus rapidement</h5>
        <div class="row align-items-center offset-md-3">
            <div class="container py-4">
		    <form action="" method="post">
                <input type="search" name="search" placeholder="Nom...">
                <input type="submit" value="Rechercher">
		    </form>
	        </div>
        </div>
    </div>
</section>
<?php include('views/components/parallax.php');?>
<?php include('views/components/header.php');?>