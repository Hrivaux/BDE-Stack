<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Créer un événement";
$pageactive = "EVADD";

include('templates/meta.php');

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si un fichier a été sélectionné
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // Récupération des informations sur le fichier
        $nomFichier = $_FILES["image"]["name"];
        $nomTemporaire = $_FILES["image"]["tmp_name"];
        $typeFichier = $_FILES["image"]["type"];
        $description = $_POST['description'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $lieu = $_POST['lieu'];
        $date = $_POST['date'];

        // Vérification si le fichier est une image
        $formatsAcceptes = array("image/jpeg", "image/png", "image/gif");
        if (in_array($typeFichier, $formatsAcceptes)) {
            // Déplacement du fichier vers le dossier de destination
            $dossierDestination = "../assets/img/uploads/evenements/"; // Chemin local vers le dossier de destination
            $cheminDestination = $dossierDestination . $nomFichier;
            if (file_exists($cheminDestination)) {
                // Gérer le cas où un fichier avec le même nom existe déjà dans le dossier
                Header('Location: evenement_creer.php?action=existe');
                exit();
            }
            if (move_uploaded_file($nomTemporaire, $cheminDestination)) {
                try {
                    // Enregistrement des données dans la table "evenements"
                    $requeteInsertion = "INSERT INTO site_evenements (titre, image, description, contenu, lieu, date) VALUES (:titre, :image, :description, :contenu, :lieu, :date)";
                    $stmtInsertion = $bdd->prepare($requeteInsertion);
                    $stmtInsertion->bindParam(':titre', $titre);
                    $stmtInsertion->bindParam(':image', $nomFichier);
                    $stmtInsertion->bindParam(':description', $description);
                    $stmtInsertion->bindParam(':contenu', $contenu);
                    $stmtInsertion->bindParam(':lieu', $lieu);
                    $stmtInsertion->bindParam(':date', $date);
                    $stmtInsertion->execute();

                    if ($stmtInsertion->rowCount() > 0) {
                        // Logs
                        $action = "A publié un nouvel événement : " . $titre;
                        $req_logs = "INSERT INTO logs (user_id, type_log, action, date) VALUES (:id_encours, 'Création', :action, :today)";
                        $stmt_logs = $bdd->prepare($req_logs);
                        $stmt_logs->execute(['id_encours' => $id_encours, 'action' => $action, 'today' => $today]);
                    }   

                    Header('Location: evenement_creer.php?action=ok');
                    exit();
                         
                } catch (PDOException $e) {
                    // Gérer les erreurs de connexion à la base de données
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                }
            } else {
                Header('Location: evenement_creer.php?action=dossier');
                exit();
            }
        } else {
            Header('Location: evenement_creer.php?action=format');
            exit();
        }
    } else {
        Header('Location: evenement_creer.php?action=erreur');
        exit();
    }
}
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
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">
                                        Événements
                                    </h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href=""><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:">Site web</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Créer un événement</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card"><div class="card-header">
                                        <h5>Événement</h5>
                                        <p>Remplissez le formulaire ci-dessous afin de publier un nouvel événement sur le site web.</p>
                                    </div>
                                    <div class="card-body">
                                        <hr><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" action="" enctype="multipart/form-data">

                                                    <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre :</label>
                                                        <input class="form-control" type="text" name="titre" id="titre" placeholder="Insérez un titre"></input><br>

                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description courte (résumé) :</label>
                                                        <input class="form-control" type="text" name="description" id="description" placeholder="Insérez un texte bref"></input><br>

                                                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Importez votre image :</label>
                                                    <small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
                                                        <input class="form-control" type="file" name="image" id ="image" accept="image/jpeg, image/png, image/gif"></input><br>

                                                    <label for="contenu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu :</label>
                                                        <textarea class="form-control" name="contenu" id="contenu" placeholder="Insérez le contenu de l'événement"></textarea><br>

                                                    <label for="lieu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu :</label>
                                                        <input class="form-control" type="text" name="lieu" id="lieu" placeholder="Insérez le lieu de l'événement"></input><br>

                                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date :</label>
                                                        <input class="form-control" type="date" name="date" id="date"></input><br>
                                            </div>
                                        </div>
                                        <input type="submit" value="Publier" class="btn btn-primary" />
                                        </form>
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
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>

<div class="modal fade" id="ok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">L'événement vient d'être publié.</h3>
        </div>
    </div>
</div>
<div class="modal fade" id="erreur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">Merci de remplir tous les champs.</h3>
        </div>
    </div>
</div>
<div class="modal fade" id="format" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">Seuls les fichiers de type JPEG, JPG, PNG et GIF sont acceptés.</h3>
        </div>
    </div>
</div>
<div class="modal fade" id="dossier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">Erreur, le dossier de destination des images est introuvable.</h3>
        </div>
    </div>
</div>
<div class="modal fade" id="existe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="tbmodal">
            <h3 style="color:white;">Erreur, ce nom de document est déjà utilisé. <br/>Vous pouvez le renommer.</h3>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    $errlogin = htmlspecialchars($_GET['action']);

    switch ($errlogin) {
    case 'ok':
        ?>
        <script>
            $(document).ready(function () {
                $("#ok").modal('show');
            });
        </script>
    <?php
    break;

    case 'erreur':
    ?>
        <script>
            $(document).ready(function () {
                $("#erreur").modal('show');
            });
        </script>
    <?php
    break;

    case 'dossier':
    ?>
        <script>
            $(document).ready(function () {
                $("#dossier").modal('show');
            });
        </script>
    <?php
    break;

    case 'format':
    ?>
        <script>
            $(document).ready(function () {
                $("#format").modal('show');
            });
        </script>
    <?php
    break;

    case 'existe':
    ?>
        <script>
            $(document).ready(function () {
                $("#existe").modal('show');
            });
        </script>
        <?php
        break;
    }
}
?>
<script src="../assets/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#contenu',
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help'
    });
</script>

</body>

</html>
