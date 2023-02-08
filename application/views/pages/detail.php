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


    <section class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <img src="<?php echo base_url();?>assets/img/logo.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="page-direction-button">
                            <a href="index.html"><i class="fa fa-home"></i>Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Prix: <?php echo $donne['byId']['prix']; ?></h2>
                        <p>Details: <?php echo $donne['byId']['descri'] ;?></p>
                    </div>
                </div>
                <?php 
                    for ($i=0; $i < count($sary); $i++) { ?>  
                <div class="col-md-6">
                <center> <img src="<?php echo base_url();?>assets/image/<?php echo $sary[$i]['nom'];?>" alt="" srcset=""></center>
                </div>
                <?php } ?>    
            </div>
        </div>
    </section>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Ajouter une photo de votre produit</h2>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form" style="height: 234px;">
                                <h4>uploader une <em>Image</em>:</h4>
                                <form id="form-submit" action="<?php echo base_url(); ?>detailC/do_upload" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <fieldset>
                                            <label for="departure">objets</label>
                                            <select name="objet" id="input" class="form-control" required="required">
                                                <option value="<?php echo $donne['byId']['idProduit']; ?>"><?php echo $donne['byId']['nom']; ?></option>
                                            </select>
                                            <input type="file" name="up" id="" class="form-control">
                                        </fieldset>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn">uploader</button>
                                            </fieldset>
                                        </div>
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