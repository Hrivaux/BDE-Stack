<?php
// On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
$page = $_SERVER['REQUEST_URI'];
$page = str_replace("/siteyetistudio/", "", $page);
?>

<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="<?php echo $url; ?>Administration/accueil.php" class="b-brand">
                <div class="b-bg">
                    <i class="fa fa-wrench"></i>
                </div>
                <span class="b-title">ADMINISTRATION</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="Accueil" <?php if ($pageactive == "Accueil") {  ?> class="nav-item active" <?php } ?>>
                    <a href="accueil.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Accueil</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>ÉVÉNEMENTS</label>
                </li>
                    <li data-username="Événement principal" <?php if ($pageactive == "EVPRINCIPAL") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/evenement_principal.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">Événément principal</span></a>
                    </li>
                    <li data-username="Créer un événement" <?php if ($pageactive == "EVADD") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/evenement_creer.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Créer un événement</span></a>
                    </li>
                    <li data-username="Supprimer un événement" <?php if ($pageactive == "EVDEL") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/evenement_supprimer.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-trash"></i></span><span class="pcoded-mtext">Supprimer un événement</span></a>
                    </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>COUPS DE COEUR</label>
                </li>
                    <li data-username="Ajouter" <?php if ($pageactive == "RDV1") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/add_coup_de_coeur.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Ajouter</span></a>
                    </li>
                    <li data-username="Archiver" <?php if ($pageactive == "RDV2") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/coup_de_coeur_liste.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-trash"></i></span><span class="pcoded-mtext">Archiver</span></a>
                    </li>
                    <li data-username="Les archives" <?php if ($pageactive == "RDV3") {  ?> class="nav-item active" <?php } ?>>
                        <a href="<?php echo $url; ?>Administration/coup_de_coeur_archives.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-delete"></i></span><span class="pcoded-mtext">Les archives</span></a>
                    </li>
                <?php if ($user['grade'] >= 2) { ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>ÉQUIPE</label>
                    </li>
                        <li data-username="Ajouter un membre" <?php if ($pageactive == "VIDEO") {  ?> class="nav-item active" <?php } ?>>
                            <a href="<?php echo $url; ?>Administration/equipe_ajouter.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Ajouter un membre</span></a>
                        </li>
                        <li data-username="Supprimer un membre" <?php if ($pageactive == "VIDEO2") {  ?> class="nav-item active" <?php } ?>>
                            <a href="<?php echo $url; ?>Administration/equipe_supprimer.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-trash"></i></span><span class="pcoded-mtext">Supprimer un membre</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                                <label>Ressources humaines</label>
                        </li>
                        <li data-username="Ajouter un compte" <?php if ($pageactive == "AM") {  ?> class="nav-item active" <?php } ?>>
                            <a href="<?php echo $url; ?>Administration/ajouter_compte.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Ajouter un compte</span></a>
                        </li>
                        <li data-username="Liste des comptes" <?php if ($pageactive == "ULISTE") {  ?> class="nav-item active" <?php } ?>>
                            <a href="<?php echo $url; ?>Administration/utilisateurs_liste.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Liste des comptes</span></a>
                        </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Administration</label>
                    </li>
                        <?php if ($user['grade'] >= 3) { ?>
                            <li data-username="Paramètres du site" <?php if ($pageactive == "PARAMS") {  ?> class="nav-item active" <?php } ?>><a href="<?php echo $url; ?>Administration/site_settings.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Paramètres du site</span></a></li>
                        <?php } ?>
                            <li data-username="Historique (logs)" <?php if ($pageactive == "LOGS") {  ?> class="nav-item active" <?php } ?>><a href="<?php echo $url; ?>Administration/logs.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Historique (logs)</span></a></li>
                            <li data-username="Newsletter" <?php if ($pageactive == "NEWSLETTER") {  ?> class="nav-item active" <?php } ?>><a href="<?php echo $url; ?>Administration/newsletter.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-mail"></i></span><span class="pcoded-mtext">Newsletter</span></a></li>
                        <?php } ?>

                <li class="nav-item pcoded-menu-caption">
                    <label>Mon compte</label>
                </li>
                <li data-username="Déconnexion" class="nav-item"><a href="<?php echo $url; ?>Administration/logout.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Déconnexion</span></a></li>
            </ul>
        </div>
    </div>
</nav>