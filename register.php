<?php
@session_start();
require('global.php');

connected_only();

include('templates/meta.php');
?>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <a href="default.php"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Sociala. </span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.php" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>

                <a href="index.php" class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl" data-toggle="modal" data-target="#Modallogin">Se Connecter</a>
               

            </div>
            
            
        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Créer <br>Ton compte</h2>                        
                        <form action="inc/actions/inscription.php" method="post">
                            
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input name="nom" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Ton nom">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input name="prenom" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Ton prénom">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input name="pseudo" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Ton pseudo">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input name="email" type="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Ton email">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input name="date_naissance" type="date" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Ta date de naissance">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                            <input type="radio" name="sexe" value="0"> une Femme
                            <input type="radio" name="sexe" value="1"> un Homme<br>
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="tel" name="telephone" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Numéro de téléphone">                        
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Mot de passe">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <!--<div class="form-group icon-input mb-1">
                                <input type="password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirmation mot de passe">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <!--<div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck1">Accepter Termes et Conditions</label>
                                <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                                <button class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>SE CONNECTER</button>
                            </div>
                        </form>
                         
                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><a href="#" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">S'inscrire</a></div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Tu as déjà un compte ?<a href="index.php" class="fw-700 ms-1">Connecte-toi</a></h6>
                        </div>
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>

    



    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>