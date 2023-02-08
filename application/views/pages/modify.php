<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--

Template 2093 Flight

http://www.tooplate.com/view/2093-flight

-->
    <title>Home</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/fontAwesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/hero-slider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/owl-carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/tooplate-style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/home/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>


<section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="left-side">
                        <div class="logo">
                            <img src="<?php echo base_url(); ?>assets/homeUser/img/logo.png" alt="Flight Template">
                        </div>
                        <div class="tabs-content">
                            <h4>Choose Your Direction:</h4>
                            <ul class="social-links">
                                <li><a href="http://facebook.com">Find us on <em>Facebook</em><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://youtube.com">Our <em>YouTube</em> Channel<i class="fa fa-youtube"></i></a></li>
                                <li><a href="http://instagram.com">Follow our <em>instagram</em><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="page-direction-button">
                            <a href="#">Visiter la page</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form" style="height: 319px;">
                                <h4>Modifier <em>Produit</em>:</h4>
    
                                <form id="form-submit" action="<?php echo base_url(); ?>example/modifyProduit" method="get">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <fieldset>
                                                
                                                <label for="departure">Nom</label>
                                                <input name="nom" type="text" class="form-control " id="deparure" placeholder="Nom..." value="<?php echo $byId['nom'];?>" required>
                                            </fieldset>
                                            <fieldset>
                                                <label for="departure">Description</label>
                                                <!-- <input name="nom" type="text" class="form-control " id="deparure" placeholder="Nom..." required > -->
                                                <textarea name="desc" class="form-control" id="" cols="30" rows="5" value=""><?php echo $byId['descri'] ;?></textarea>
                                            </fieldset>


                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">Prix</label>
                                                <input name="prix" type="number" class="form-control " id="deparure" placeholder="Prix..." value="<?php echo $byId['prix'] ;?>" required>
                                                <input type="hidden" name ="id" value="<?php echo $byId['idProduit'];?>">
                                            </fieldset>
                                            <fieldset>

                                                <label for="departure">Categorie</label>
                                                <!-- <select name="categories" id="input" class="form-control" required="required">
                                                    <?php// $cat[] = $cat;
                                                   // for ($i = 0; $i < count($cat); $i++) { ?>
                                                        <option value="<?php //echo $cat[$i]['idCat']; ?>"><?php //echo $cat[$i]['nom']; ?></option>
                                                    <?php //} ?>
                                                </select> -->


                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn">modifier</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

                                
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="<?php echo base_url()?>welcome/deconexion" class="">Log Out</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p><i class="fas fa-user"></i>Razafindratandra Miradomahefa Fitahiana Etu_1905</p>
                    <p><i class="fas fa-user"></i>Ramorasata Idealisoa Miangalihanta Etu_1848</p>
                    <p><i class="fas fa-user"></i>Njakasaigny Kassim Jaotombo Etu_1791</p>
                </div>
            </div>
        </div>
    </footer>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/home/js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="<?php echo base_url(); ?>assets/home/js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/home/js/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {



            // navigation click actions 
            $('.scroll-link').on('click', function(event) {
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function(event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed) {
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({
                scrollTop: targetOffset
            }, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() {}
            };
        }
    </script>
</body>

</html>