<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Archiver les coups de coeur";
$pageactive = "RDV2";

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
                                        <h5 class="m-b-10">Archiver un coup de coeur</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="accueil.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a>PAGE COUPS DE COEUR</a></li>
                                        <li class="breadcrumb-item"><a href="">Archiver</a></li>
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
                                            <h5>Archiver un coup de coeur</h5>
                                            <p>Retrouvez ci-dessous la liste des coups de coeur que vous pourrez archiver.</p>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Archiver</th>
                                                            <th>Titre</th>
                                                            <th>Auteur</th>
                                                            <th>Prix</th>
                                                            <th>Date de publication</th>
                                                            <th>Ajouté par</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $requete = ("
													SELECT 
														P.id,
														P.titre,
														P.texte,
														P.url_image,
                                                        P.auteur,
                                                        P.editeur,
                                                        P.prix,
														P.date_publication,
														P.publie_par,
														P.visible as visible,
														CONCAT(U.nom, ' ', U.prenom) as auteur_cc
												
													FROM 
														publications P
														LEFT JOIN utilisateurs U ON U.id = P.publie_par
													WHERE
														visible = '1'
                                                    ORDER BY
                                                        P.date_publication DESC
													");
                                                        $reqv = $bdd->prepare($requete);
                                                        $reqv->execute();

                                                        $resultat = $reqv->fetchAll();
                                                        if (!empty($resultat)) {
                                                            foreach ($resultat as $publication) {
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?php echo $url; ?>inc/actions/archiver_publication.php?id=<?php echo $publication['id']; ?>&titre=<?php echo $publication['titre']; ?>"><img src="img/archiver3.png" style="display:inline; width:30px; height: 30px;" /></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $publication['titre']; ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $publication['auteur']; ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $publication['prix']; ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo strftime('%d-%m-%Y', strtotime($publication['date_publication'])); ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="m-0"><?php echo $publication['auteur_cc']; ?></h6>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "Il n'y a actuellement aucun coup de coeur.";
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
    

</body>

</html>