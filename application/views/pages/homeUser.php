<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--

Template 2093 Flight

http://www.tooplate.com/view/2093-flight

-->
    <title>Bienvenu</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/fontAwesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/hero-slider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/owl-carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeUser/css/tooplate-style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/homeUser/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
                            <a href="<?php echo base_url(); ?>example/listProposition">Liste des propositions</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form" style="height: 319px;">
                                <h4>Inserer un <em>Objet</em>:</h4>
                                <form id="form-submit" action="<?php echo base_url(); ?>example/save" method="get">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">Nom</label>
                                                <input name="nom" type="text" class="form-control " id="deparure" placeholder="Nom..." required>
                                            </fieldset>
                                            <fieldset>
                                                <label for="departure">Description</label>
                                                <!-- <input name="nom" type="text" class="form-control " id="deparure" placeholder="Nom..." required > -->
                                                <textarea name="desc" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </fieldset>


                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">Prix</label>
                                                <input name="prix" type="number" class="form-control " id="deparure" placeholder="Prix..." required>
                                            </fieldset>
                                            <fieldset>

                                                <label for="departure">Categorie</label>
                                                <select name="categories" id="input" class="form-control" required="required">
                                                    <?php $cat[] = $cat;
                                                    for ($i = 0; $i < count($cat); $i++) { ?>
                                                        <option value="<?php echo $cat[$i]['idCat']; ?>"><?php echo $cat[$i]['nom']; ?></option>
                                                    <?php } ?>
                                                </select>


                                            </fieldset>

                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn">Creer</button>
                                                +
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>


                    <!-- -->
                    <!-- <div class="col-md-5 "> -->

                </div>
                <!--  -->
            </div>
        </div>
    </section>
    <div class="row">
    <div class="col-md-12">
        <div class="section-heading" style="padding-top: 30px;">
            <h2>Rechercher</h2>
        </div>
    </div>
    <center>
        <div class="col-md-offset-5 col-md-2 ">
            <form action="<?php echo base_url();?>example/rechercher" method="post">
            <input type="text" name="name" id="input" class="form-control" value="" required="required" placeholder="rechercher">
            <label for="departure">Categorie</label>
            <select name="idCat" id="input" class="form-control" required="required">
                <?php $cat[] = $cat;
                for ($i = 0; $i < count($cat); $i++) { ?>
                    <option value="<?php echo $cat[$i]['idCat']; ?>"><?php echo $cat[$i]['nom']; ?></option>
                <?php } ?>
            </select>
            <p><button type="submit" class="btn btn-primary">Rechercher</button></p>
            </form>
        </div>
    </center>
    </div>
    <div class="list">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Vos Produits</h2>
            </div>
        </div>
        <div class="col-md-12">
            <ul>
                <?php
                $listes = array();
                $listes = $list;
                $sary = array();
                $sary = $image;
                //  var_dump($sary);
                // var_dump($list);
                for ($i = 0; $i < count($listes); $i++) {  ?>
                    <li>

                        <div class="item col-md-2">
                            <div class="visited-item">
                                <a href="<?php echo base_url(); ?>detailC/show/<?php echo $listes[$i]['idProduit']; ?>"> <img src="<?php echo base_url(); ?>assets/image/<?php echo $sary[$i][0]['nom']; ?>" alt=""></a>
                                <div class="text-content">
                                    <h4><?php echo $listes[$i]['nom']; ?></h4>
                                    <span><?php echo $listes[$i]['descri']; ?></span>
                                    <span><?php echo $listes[$i]['prix']; ?> Ar</span>
                                    <span>
                                        <p> <a href="<?php echo base_url(); ?>example/getById/<?php echo $listes[$i]['idProduit']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
                                            <a href="<?php echo base_url(); ?>example/delete/<?php echo $listes[$i]['idProduit']; ?>"><button type="button" class="btn btn-primary">Supprimer</button></a>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php }
                ?>
            </ul>
        </div>
    </div>

    <section id="most-visited">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Produits Echengeables</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="owl-mostvisited" class="owl-carousel owl-theme">
                        <?php
                        $tous = array();
                        $tous = $all;
                        $img = array();
                        $img = $image;
                        // var_dump($tous);
                        for ($i = 0; $i < count($tous); $i++) { ?>

                            <div class="item col-md-12">
                                <div class="visited-item">
                                    <!-- <img src="<?php //echo base_url(); 
                                                    ?>assets/image<?php //echo $img[$i][0]['nom']; 
                                                                    ?>" alt=""> -->
                                    <div class="text-content">
                                        <h4><?php echo $tous[$i]['nom']; ?></h4>
                                        <span><?php echo $tous[$i]['descri']; ?></span>
                                        <span><?php echo $tous[$i]['prix']; ?> Ar</span>
                                        <br>
                                        <center>
                                            <span>
                                                <a href="<?php echo base_url(); ?>example/echanger/<?php echo $tous[$i]['idProduit']; ?>"><button type="button" class="btn btn-primary">Echanger</button></a>
                                            </span>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container">


            <div class="row">

                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="<?php echo base_url() ?>welcome/deconexion" class="">Log Out</a>
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
        window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/homeUser/js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="<?php echo base_url(); ?>assets/homeUser/js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/homeUser/js/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeUser/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeUser/js/main.js"></script>

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