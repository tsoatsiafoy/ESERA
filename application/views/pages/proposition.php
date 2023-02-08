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
            </div>
        </div>
</section>
<center><h2>Vos Produit a echanger</h2>
<hr>    
</center>
    <table class="table table-bordered table-hover">
        <thead>
            
            <tr>
                <th>Mon Produit</th>
                <th>Echange</th>
                <th>User</th>
                <th>Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                 for ($i=0; $i < count($prod); $i++) {  if(isset($idEchange[$i])) { ?>
                    <tr>
                        <td>
                            <span><em><?php echo $prod[$i]['nom'] ;?></em></span>
                            <span><?php echo $prod[$i]['descri'] ;?></span>
                        </td>
                        <td>
                            <span><em><?php echo $prod2[$i]['nom'] ;?></em></span>
                            <span><?php echo $prod[$i]['descri'] ;?></span>
                        </td>
                        <td>
                            <span><em><?php echo $listUser[$i]['nom'] ;?></em></span>
                        </td>
                        <td> 
                        <a href="<?php echo base_url() ;?>example/transactionValid/<?php echo $idEchange[$i] ;?>/<?php echo $prod[$i]['idProduit'] ?>/<?php echo $prod2[$i]['idProduit'] ?>/<?php echo $prod2[$i]['idUser'] ?>"><button type="button" class="btn btn-success">Valider</button>
                        <a href="<?php echo base_url() ;?>example/transactionRefuse/<?php echo $idEchange[$i] ;?>/<?php echo $prod[$i]['idProduit'] ?>/<?php echo $prod2[$i]['idProduit'] ?>"><button type="button" class="btn btn-danger">Refuser</button></a>
                        </td>
                        
                    </tr>
               <?php  
            }}
            ?>
        </tbody>
    </table>
    
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
    
    </body>
</html>