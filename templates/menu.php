<nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>Accueil </span></div>
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="index.php" class="nav-content-bttn open-font" ><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Accueil</span></a></li>
                            <li><a href="default-member.php" class="nav-content-bttn open-font" ><i class="feather-users btn-round-md bg-gold-gradiant me-3"></i><span>Utilisateurs</span></a></li>
                            <li><a href="publications.php" class="nav-content-bttn open-font" ><i class="feather-send btn-round-md bg-mini-gradiant me-3"></i><span>Nos publications</span></a></li>
                          </ul>
                    </div>

                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Mon compte</div>
                        <ul class="mb-1">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <li><a href="default-settings.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings me-3 text-grey-500"></i><span>Paramètres</span></a></li>
                                <li><a href="logout.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings me-3 text-grey-500"></i><span>Déconnexion</span></a></li>
                            <?php } else { ?>
                                <li><a href="se-connecter.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-user me-3 text-grey-500"></i><span>Se connecter</span></a></li>
                                <li><a href="register.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-user-plus me-3 text-grey-500"></i><span>S'inscrire</span></a></li>
                            <?php } ?>
                            </ul>
                    </div>
                </div>
            </div>
        </nav>