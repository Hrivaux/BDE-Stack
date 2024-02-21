<?php
@session_start();
include ("inc/functions.php");

already_connected();
include ("templates/meta.php")?>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <a href="index.php"><img src="images/removedbg.png" width="100px"/><span class="d-inline-block ls-3 fw-600 text-current font-xxl logo-text mt-2" style="color:#fff !important; font-family: Philosopher;">BDE de Sciences U. </span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="index.php" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>

                <a href="index.php" class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded">Connexion</a>
                <a href="register.php" class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded">Inscription</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(images/bg1_index.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Se connecter</h2>
                        <form action="inc/actions/login.php" method="post">
                            
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="email" name="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Votre adresse email">                        
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input name="password" type="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Votre mot de passe">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <br>
                            <div class="col-sm-12 p-0 text-left">
                                <button class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>SE CONNECTER</button>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Vous n'avez pas de compte ?<a href="register.php" class="fw-700 ms-1">Inscription</a></h6>
                            </div>
                        </form>
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>

    <div class="modal fade" id="email_non_valide" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Votre adresse email n'est pas confirmée. Veuillez vérifier votre boîte de réception et cliquer sur le lien de confirmation.</h3>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const loginErr = urlParams.get('login_err');
            if (loginErr === 'email_non_valide') {
                alert('Votre adresse email n\'est pas confirmée. Veuillez vérifier votre boîte de réception et cliquer sur le lien de confirmation.');
            }
        });
    </script>
</body>
</html>