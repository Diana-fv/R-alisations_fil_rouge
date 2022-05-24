<?php include('components/header.php'); ?>

    <!--========================= section about ========================= -->
        <section id="about_page">
            <div class="about_page">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="about_title">SuperMAM</h2>
                        <div class="hr"><div> </div></div>
                        <p class="paragraph-center ps-3 pe-3">Notre MAM -une assistante maternelle qui est une partie de votre famille.
                            Le SuperMAM se veut être un lieu de vie accueillant et chaleureux dans un cadre familial pour les jeunes enfants de (en général) 2 mois à 3 ans.Un mode d’accueil atypique et innovant qui propose une alternative, entre la crèche et l’assistant(e) maternel(le) favorisant un passage plus souple du milieu familial vers l’école maternelle.Au travers des découvertes, de la socialisation, de l’apprentissage de l’autonomie, des jeux libres et de la créativité, chaque enfant pourra vivre une expérience en collectivité.
                        </p>
                        <div id="bouton" class="text-center mb-1">
                            <h3 id="helloMsg">Voulez-vous <span id="nameSlot"></span></h3>
                            <div class="btn-group btn-group-lg">
                                <a href="add_user" class="btn btn-outline-dark mb-3 mt-5 "> M'enregister</a>
                                <a href="login" class="btn btn-outline-dark mb-3 mt-5"> Me connecter</a>
                                <a href="logout" class="btn btn-outline-dark mb-3 mt-5"> Me déconnecter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ps-0 pe-0 mw-100 !important">	
                        <img src="assets/img/happy.jpg" class="img-fluid fullscreen ps-0 pe-0 mw-100 !important" width="100%" height="auto" alt="">
                    </div>
                </div>	
            </div>
        </section>
    

    <!-- ========================= menu_description ========================= -->
        <section id="menu_description" class="parallax" style="background-image:url('assets/img/background.jpg');">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 m-5 p-5 card">
                        <div class="text-center">
                            <h3 class="section-tittle center-algiment">Différence entre une Crèche et une Mam ?</h3> 
                            <div class="hr"><div> </div></div>
                                <p class="paragraph-center">Ce type d’accueil de qualité, favorise le passage plus souple du milieu familial vers la collectivité; en mettant en pratique une approche respectueuse et dynamique de l’enfant et de sa famille. C’est un mode de garde qui conserve à la fois les avantages de la crèche et ceux de l’assistante maternelle. Dans le cadre de la politique de diversification des modes d’accueil de la petite enfance, une assistante maternelles, peut dorénavant exercer son métier en dehors de son domicile. D’ou l’idée de regrouper dans une maison commune au minimum 2 maximum 4 assistantes maternelles, accueillant jusqu’à 4 enfants chacune (en fonction de leur agrément).Chaque assistante maternelle garde son statut et gère ces contrats avec les parents-employeurs.</p>
                                <p class="paragraph-center">Les regroupements d’assistantes maternelles offrent une solution supplémentaire dans le choix du mode d’accueil. Ils permettent à la fois aux professionnels de se sentir reconnus professionnellement, de séparer vie professionnelle et vie familiale, de partager les responsabilités et de répartir les activités en fonction des aptitudes et des préférences de chacune mais également de mutualiser leurs compétences et les moyens. Les assistant(e)s maternel(le)s qui se regroupent ne sont financièrement pas à la charge des communes, elles sont rémunérées directement par les parents. Depuis 2008, les maisons d’assistantes maternelles se développent sur tout le territoire français.</p>
                                <button type="button" class="btn btn-outline-dark">En savois +</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ========================= image - Carousel??? ========================= -->
        <section id="background">
            <div id="carousel" class="carousel slide align-items-center justify-content-center" data-bs-ride="carousel">
                <div class="carousel-inner" style="height: 600px; padding: 5%;">
                    <div class="carousel-item active">
                        <img src="assets/img/batman.jpg" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/lego.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/rocket.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </section>
 <!-- ========================= reviews // box_avis========================= -->
        <section id="reviews">
            <div class="container p-3">
                <div class="text-center">
                    <i class="fas fa-quote-left"></i>
                    <h3 class="section-tittle center-algiment fst-italic">Julia</h3> 
                    <img src="assets/img/girl.jpg" class="img-fluid justify-content-center rounded-circle border-dark" alt="..." width="200" height="200">
                    <div class="container d-flex align-items-center justify-content-center">
                        <p class="col-6 paragraph-center tittle">L'équipe est professionnelle et sympathique. 
                        Juste parfait, ma fille a évolué très rapidement. Activités nombreuses et très bon tremplin pour l'entrée à l'école. Un grand merci à toute l'équipe </p>
                    </div>
                    <div class="text-center"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
        </section>
   <!-- ========================= photo //boxs_sliders ========================= -->
        <section id="photo">
        	<div class="container">
        		<div class="row">
        			
        			<div class="col">
        				<img src="assets/img/boy-gb.jpg" class="img-fluid" alt="...">
        			</div>
        			<div class="col">
        				<img src="assets/img/sheep.jpg" class="img-fluid" alt="...">
        			</div>
        		
        			<div class="col">
        				<img src="assets/img/colored.jpg" class="img-fluid" alt="...">
        			</div>
        			<div class="col">
        				<img src="assets/img/puppet.jpg" class="img-fluid" alt="...">
        			</div>
        		</div>
        	</div>
        </section>

        <script>
            $('.carousel').carousel({ interval: 1000 });
        </script> 

<?php include('components/footer.php');?>