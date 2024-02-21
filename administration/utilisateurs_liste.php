<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Listes des utilisateurs";
$pageactive = "ULISTE";

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


    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Liste des utilisateurs</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="accueil.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a>Ressources Humaines</a></li>
                                        <li class="breadcrumb-item"><a href="">Liste des utilisateurs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Liste des utilisateurs</h5>
                                            <p>Retrouvez ci-dessous la liste des utilisateurs que vous pourrez supprimer ou modifier</p>
                                            <small><b style="color:red;">Toute suppression de compte est DÉFINITIVE.</b></small>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Supprimer</th>
                                                            <th>Modifier</th>
                                                            <th>Nom</th>
                                                            <th>Prénom</th>
                                                            <th>Fonction</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $requete = ("SELECT * FROM utilisateurs");

                                                        $requser = $bdd->prepare($requete);
                                                        $requser->execute();


                                                        $resultat = $requser->fetchAll();


                                                        if (!empty($resultat)) {
                                                            foreach ($resultat as $users) {
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?php echo $url; ?>inc/actions/delete_user.php?id=<?php echo $users['id']; ?>"><img src="img/delete3.png" style="display:inline; width:35px; height: 35px;" /></a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo $url; ?>Administration/modification_compte.php?id=<?php echo $users['id']; ?>"><img src="img/edit.png" style="display:inline; width:40px; height: 40px;" /></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $users['nom']; ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $users['prenom']; ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $users['fonction']; ?></h6>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "Il n'y a actuellement aucun utilisateur.";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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
    </section>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
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




    <div class="modal fade" id="erreur" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Une erreur est survenue, votre compte rendu n'a pas été modifié.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['action'])) {
        $errlogin = htmlspecialchars($_GET['action']);

        switch ($errlogin) {
            case 'erreur':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#erreur").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>



    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <div class="modal fade" id="successcr" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le compte rendu a bien été modifié.</h3>
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

    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <div class="modal fade" id="successcrmodif" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Le compte rendu a bien été modifié.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['actioncrmodif'])) {
        $errlogin = htmlspecialchars($_GET['actioncrmodif']);

        switch ($errlogin) {
            case 'successcrmodif':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#successcrmodif").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>
    <div class="modal fade" id="pbvisite" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="tbmodal">
                <h3 style="color:white;">Vous devez saisir une date de nouvelle visite.</h3>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['action'])) {
        $errlogin = htmlspecialchars($_GET['action']);

        switch ($errlogin) {
            case 'pbvisite':
    ?>
                <script>
                    $(document).ready(function() {
                        $("#pbvisite").modal('show');
                    });
                </script>
    <?php break;
        }
    } ?>


</body>

</html>