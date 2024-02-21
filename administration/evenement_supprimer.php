<?php
@session_start();
require ('../global.php');

connected_only();

$pageinfo = "Supprimer un événement";
$pageactive = "EVDEL";

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
                                    <h5 class="m-b-10">Événement</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="accueil.php"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Site web</a></li>
                                    <li class="breadcrumb-item"><a href="">Supprimer un événement</a></li>
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
                                        <h5>Supprimer un événement</h5>
                                        <p>Retrouvez ci-dessous la liste des photos que vous pourrez supprimer.</p>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Supprimer</th>
                                                    <th>Titre</th>
                                                    <th>Description</th>
                                                    <th>Lieu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $requete = "SELECT * FROM site_evenements ORDER BY id DESC";
                                                $reqv = $bdd->prepare($requete);
                                                $reqv->execute();
                                                $resultat = $reqv->fetchAll();

                                                if (!empty($resultat)) {
                                                    foreach($resultat as $evenement)  {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?php echo $url; ?>inc/actions/supprimer_evenement.php?id=<?php echo $evenement['id'];?>"><img src="img/delete3.png" style="display:inline; width:30px; height: 30px;"/></a>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0"><?php echo htmlspecialchars_decode($evenement['titre']); ?></h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0"><?php echo htmlspecialchars_decode($evenement['description']); ?></h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-0"><?php echo htmlspecialchars_decode($evenement['lieu']); ?></h6>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>Il n'y a actuellement aucun événement.</td></tr>";
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
            <h3 style="color:white;">L'événement a bien été supprimé.</h3>
        </div>
    </div>
</div>
<?php
if(isset($_GET['actioncr'])) {
    $errlogin = htmlspecialchars($_GET['actioncr']);

    switch($errlogin)
    {
        case 'successcr':
            ?>
            <script>
                $(document).ready(function(){
                    $("#successcr").modal('show');
                });
            </script>
            <?php break; } } ?>
<div class="modal fade" id="erreur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">Une erreur est survenue, l'événement n'a pas été supprimé.</h3>
        </div>
    </div>
</div>
<?php
if(isset($_GET['action']))
{
    $errlogin = htmlspecialchars($_GET['action']);

    switch($errlogin)
    {
        case 'erreur':
            ?>
            <script>
                $(document).ready(function()
                {
                    $("#erreur").modal('show');
                });
            </script>
            <?php break; } } ?>
</body>
</html>
