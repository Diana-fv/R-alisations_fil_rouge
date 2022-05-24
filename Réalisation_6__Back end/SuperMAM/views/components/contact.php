<?php include('header.php'); ?>

<!-- ========================= contact ========================= -->
<section id="contact">
            <div class="container align-items-center">
                <h3 class="section-tittle text-center">At Your Service</h3>
                <h5 class="section-tittle center-algiment text-center">Vous avez des questions?</h5>
                <div class="row">
                    <div class="col-md-6 offset-md-3"><p class="paragraph-center text-center">Envoyez nous rapidement vos questions ou demandes depuis ce formulaire. Nous vous répondrons dans les plus brefs délais.</p></div>
                </div>
                
            </div>
            
            <div class="container align-items-center">
                <div class="row align-items-center offset-md-3">
                    <div class="container py-4">
                        <!-- Bootstrap 5 starter form -->
                        <form id="contactForm" class="form-horizontal">
                        <!-- Name input -->
                        <div class="mb-4">
                            <div class="col-lg-7">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Name" />
                            </div>
                        </div>
                
                        <!-- Email address input -->
                        <div class="mb-4">
                            <div class="col-lg-7">
                            <label class="form-label" for="emailAddress">Email Address</label>
                            <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
                            </div>
                        <!-- Message input -->
                        <div class="mb-4">
                            <div class="col-lg-7">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
                            </div>
                        </div>
                
                        <!-- Form submit button -->
                        <div class="d-grid">
                            <div class="col-lg-4">
                                <button class="btn btn-dark btn-sm" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                
            </div>
    </section>

<?php include('parallax.php');?>
<?php include('footer.php');?>