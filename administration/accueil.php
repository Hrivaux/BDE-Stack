<?php
require('../global.php');

require_once('../inc/calculateur.php');

$pageinfo = "Gestion des comptes rendus";
$pageactive = "Accueil";

include('templates/meta.php');
?>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php include('templates/menu.php'); ?>

    <?php include('templates/header.php'); ?>

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4"><span style="text-transform: uppercase;"><?php echo $nomprenom; ?></span></h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-user-check text-c-blue f-30 m-r-10"></i><?php echo $uFonction; ?></h3>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-4">
                                    <div class="card Monthly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Utilisateurs totaux</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-users text-c-purple f-30 m-r-10"></i><?php echo $nbutilisateurs; ?></h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Publications totales
                                            </h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-file text-c-green f-30 m-r-10"></i><?php echo $nbpublicationstotales; ?></h3>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Tous les utilisateurs</h5><br>
                                            <?php if ($grade_encours >= 2) { ?><small>Cliquez sur le nom et prénom pour modifier le compte.</small><?php } ?>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php
                                                        $requete = ("SELECT * FROM utilisateurs");

                                                        $requser = $bdd->prepare($requete);
                                                        $requser->execute();


                                                        $resultat = $requser->fetchAll();


                                                        if (!empty($resultat)) {
                                                            foreach ($resultat as $users) {
                                                        ?>
                                                                <tr class="unread">
                                                                    <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-<?php if ($users['sexe'] == '1') {
                                                                                                                                                            echo "1";
                                                                                                                                                        } else {
                                                                                                                                                            echo "0";
                                                                                                                                                        } ?>.jpg?<?php echo rand(1, 758); ?>" alt="activity-user"></td>
                                                                    <td>
                                                                        <?php if ($grade_encours >= 2) { ?><a href="modification_compte.php?id=<?php echo $users['id']; ?>"><?php } ?>
                                                                            <h6 class="mb-1"><?php echo $users['prenom'] . " " . $users['nom']; ?></h6>
                                                                            <?php if ($grade_encours >= 2) { ?>
                                                                            </a><?php } ?>
                                                                        <p class="m-0"><?php echo $users['fonction']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0"><a href="mailto:<?php echo $users['email']; ?>"><?php echo $users['email']; ?></a></p>
                                                                    </td>
                                                                    <?php if ($users['droit_absolu'] != 1) { ?><td><?php if ($grade_encours > $users['grade'] || $droitAbsolu) { ?><a href="<?php echo $url; ?>inc/actions/delete_user.php?id=<?php echo $users['id']; ?>" class="label theme-bg2 text-white f-12">Supprimer</a></td><?php } ?><?php } ?>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-event">
                                        <!-- <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <h5 class="m-0">Prochain rendez-vous????</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right">65%</label>
                                                </div>
                                            </div>
                                            <h2 class="mt-3 f-w-300">45<sub class="text-muted f-14">Rendez-vous</sub></h2>
                                            <h6 class="text-muted mt-4 mb-0">Prévu à ce jour</h6>
                                            <i class="fab fa-angellist text-c-red f-50"></i>
                                        </div> -->
                                    </div>
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-zap f-30 text-c-red"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?php echo $nbpublications; ?></h3>
                                                    <span class="d-block text-uppercase">Coup<?php if ($nbpublications > 1) {
                                                                                                        echo "s";
                                                                                                    } ?> de coeur en ligne</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-settings f-30 text-c-blue"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?php echo $nbadmin; ?></h3>
                                                    <span class="d-block text-uppercase">Compte<?php if ($nbadmin > 1) {
                                                                                                    echo "s";
                                                                                                } ?> administrateur<?php if ($nbadmin > 1) {
                                                                                                                        echo "s";
                                                                                                                    } ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-file f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?php echo $nbredacteurs; ?></h3>
                                                    <span class="d-block text-uppercase">Compte<?php if ($nbredacteurs > 1) {
                                                                                                    echo "s";
                                                                                                } ?> rédacteur<?php if ($nbredacteurs > 1) {
                                                                                                                    echo "s";
                                                                                                                } ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo $url; ?>Administration/assets/js/vendor-all.min.js"></script>
    <script src="<?php echo $url; ?>Administration/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>Administration/assets/js/pcoded.min.js"></script>

    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le compte a bien été créé.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['action'])) {
        $errlogin = htmlspecialchars($_GET['action']);

        switch ($errlogin) {
            case 'success':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#success").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>

    <div class="modal fade" id="successcr" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le compte rendu a bien été créé.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['actioncr'])) {
        $errlogin = htmlspecialchars($_GET['actioncr']);

        switch ($errlogin) {
            case 'successcr':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successcr").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>

    <div class="modal fade" id="successno" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Votre notification a bien été envoyée.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['actionno'])) {
        $errlogin = htmlspecialchars($_GET['actionno']);

        switch ($errlogin) {
            case 'successno':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successno").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>

    <div class="modal fade" id="successmed" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Félicitations, l'utilisateur a bien été inscrit.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['actionno'])) {
        $errlogin = htmlspecialchars($_GET['actionno']);

        switch ($errlogin) {
            case 'successmed':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successmed").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>

    <div class="modal fade" id="successd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le compte a bien été supprimé.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['delete'])) {
        $errlogin = htmlspecialchars($_GET['delete']);

        switch ($errlogin) {
            case 'successd':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successd").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>
    <div class="modal fade" id="successd2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le membre de l'équipe a bien été supprimé.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['delete'])) {
        $errlogin = htmlspecialchars($_GET['delete']);

        switch ($errlogin) {
            case 'successd2':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successd2").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>
    <div class="modal fade" id="successdmed" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le coup de coeur a bien été archivé.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['delete'])) {
        $errlogin = htmlspecialchars($_GET['delete']);

        switch ($errlogin) {
            case 'successdmed':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successdmed").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>
    <div class="modal fade" id="repost" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h1 style="color:white;font-size:25px">Le coup de coeur a bien été remis en ligne.</h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['delete'])) {
        $errlogin = htmlspecialchars($_GET['delete']);

        switch ($errlogin) {
            case 'repost':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#repost").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>
</body>

</html>