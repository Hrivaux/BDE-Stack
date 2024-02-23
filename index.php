<?php 
require_once 'inc/upload_handler.php';
require_once 'inc/ImageUploader.php';

?>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>
    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>
        <!-- navigation top -->

        <!-- navigation left -->

         <?php include('templates/menu.php'); ?>

        <!-- navigation left -->
        <!-- main content -->
        <div class="main-content">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-lg-8">
                            <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                                <div class="card-body d-flex align-items-center p-0">
                                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Nos événements</h2>
                                       <div class="search-form-2 ms-auto">
                                        <i class="ti-search font-xss"></i>
                                        <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Rechercher">
                                    </div>
                                    <select id="categorieFilter" class="form-select ms-2 bg-greylight theme-dark-bg rounded-3">
                                        <option value="" style="padding-right: 30px;">
                                            Filtrer par ...
                                        </option>
                                        <?php
                                        $sql_categories = "SELECT * FROM categories_evenements";
                                        $requete_categories = $bdd->query($sql_categories);
                                        while ($categorie = $requete_categories->fetch()) {
                                            echo '<option value="' . $categorie['id'] . '">' . $categorie['libelle'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <div class="row ps-2 pe-1">
                            <?php if (isset($_SESSION['user']) && $grade_encours >= 2): ?>
                                        <button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" href="#ModalForm"> Créer un événement</button>
                                <?php endif; ?> 
                                <?php
                                    $requete = "SELECT 
                                                    E.id,
                                                    E.libelle_evenement,
                                                    E.participants_max,
                                                    E.photo_couverture,
                                                    E.id_categorie,
                                                    E.adresse,
                                                    E.ville,
                                                    E.description,
                                                    E.prix,
                                                    E.date,
                                                    C.libelle as 'catLibelle'
                                                FROM 
                                                    evenements E
                                                    INNER JOIN categories_evenements C ON C.id = E.id_categorie
                                                WHERE 
                                                    (SELECT COUNT(*) FROM inscriptions_evenements WHERE id_evenement = E.id AND actif = 1) < E.participants_max
                                                ORDER BY 
                                                    E.date DESC";
                                    $reqart = $bdd->prepare($requete);
                                    $reqart->execute();
                                    $resultat = $reqart->fetchAll();

                                    if (!empty($resultat)) {
                                        foreach ($resultat as $evenement) {
                                                $id_evenement = $evenement['id'];
                                                
                                                // Vérifier le nombre de participants
                                                $requete_participants = "SELECT COUNT(*) AS nb_participants FROM inscriptions_evenements WHERE id_evenement = ? AND actif != 0";
                                                $req_participants = $bdd->prepare($requete_participants);
                                                $req_participants->execute([$id_evenement]);
                                                $nb_participants = $req_participants->fetchColumn();

                                                // Vérifier si l'utilisateur est inscrit à cet événement
                                                $requete_inscription_user = "SELECT COUNT(*) AS nb_inscriptions FROM inscriptions_evenements WHERE id_evenement = ? AND id_user = ? AND actif != 0";
                                                $req_inscription_user = $bdd->prepare($requete_inscription_user);
                                                $req_inscription_user->execute([$id_evenement, $id_encours]); // Assurez-vous de remplacer $id_utilisateur par l'id de l'utilisateur connecté
                                                $nb_inscriptions_user = $req_inscription_user->fetchColumn();

                                                $inscrit = $nb_inscriptions_user > 0;

                                                // Déterminez le texte approprié en fonction du nombre de participants
                                                $participants_text = $nb_participants > 1 ? "<b>$nb_participants</b> participants" : "<b>$nb_participants</b> participant";
                                        ?>
                                            <div class="col-md-6 col-sm-6 pe-2 ps-2 evenement">
                                                 <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                                    <a data-bs-toggle="modal" href="#Modal_<?php echo $evenement['id']; ?>">
                                               <div class="card-body position-relative h100 bg-image-cover bg-image-center" style="background-image: url(images/uploads/evenements/couverture/<?php echo $evenement['photo_couverture']; ?>); width: 500px; height: 100px;"></div>
                                                    <div class="card-body d-block w-100 pe-4 pb-4 pt-0 text-left position-relative">
                                                        <h4 class="fw-700 font-xsss mt-3 mb-1"><?php echo $evenement['libelle_evenement']; ?> </h4>
                                                        <span class="badge badge-secondary" style="float:right" data-categorie-id="<?php echo $evenement['id_categorie']; ?>">
                                                            <?php echo $evenement['catLibelle']; ?>
                                                        </span>
                                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-0">
                                                            <?php echo $evenement['adresse']." <br> ".$evenement['ville']; ?>
                                                            <br><br>
                                                            <?php echo $participants_text." / ".$evenement['participants_max']." (max)"; ?> 
                                                            <br><br>
                                                            Prix :<?php echo $evenement['prix']."€";?>
                                                            <br><br>
                                                        </p>
                                                        
                                                        <?php if (isset($_SESSION['user'])) { ?>
                                                            <span class="position-absolute right-15 top-0 d-flex align-items-center" style="float:right">
                                                            <?php if ($inscrit): ?>
                                                                <a href="inc/actions/desinscription_evenement.php?id_evenement=<?php echo $evenement['id']; ?>" class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-green font-xsssss fw-700 ls-lg text-blue inscrit-btn">✅ INSCRIT</a>
                                                            <?php else: ?>
                                                                <a href="inc/class/eventRegistration.php?id_evenement=<?php echo $evenement['id']; ?>" class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white sinscrire-btn">S'INSCRIRE</a>
                                                            <?php endif; ?>
                                                        </span>
                                                         <?php if ($grade_encours == 3) : ?>
                        <a href="inc/DeleteEv.php?id_evenement=<?php echo $evenement['id']; ?>" class="ms-auto" >
                            <i class="feather-trash font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500" style="float:right"></i>
                        </a>
                    <?php endif; ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                            </a>
                                            </div>

                                            <div class="portfolio-modal modal fade" id="Modal_<?php echo $evenement['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="container">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-8">
                                                                    <div class="modal-body">

                                                                        <h2 class="text-uppercase"><?php echo $evenement['libelle_evenement']; ?></h2>
                                                                        <img class="img-fluid d-block mx-auto" src="images/uploads/evenements/couverture/<?php echo $evenement['photo_couverture']; ?>" alt="<?php echo $evenement['libelle_evenement']; ?>" />
                                                                        <p><?php echo $evenement['description']; ?></p>
                                                                        <ul class="list-inline">
                                                                            <li>
                                                                                <strong>Catégorie :</strong><br>
                                                                                <?php echo $evenement['catLibelle']; ?>
                                                                            </li>
                                                                            <br>
                                                                            <li>
                                                                                <strong>Date :</strong><br>
                                                                                <?php echo $evenement['date']; ?>
                                                                            </li>
                                                                            <br>
                                                                            <li>
                                                                                <strong>Lieu :</strong><br>
                                                                                <?php echo $evenement['adresse']." <br> ".$evenement['ville']; ?>
                                                                            </li>
                                                                            <br>
                                                                            <li>
                                                                                <strong>Prix :</strong><br>
                                                                                <?php echo $evenement['prix']."€"; ?>
                                                                            </li>
                                                                        </ul>
                                                                        <?php echo $participants_text." / ".$evenement['participants_max']." (max)"; ?> 
                                                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                                                            type="button">
                                                                            <i class="fas fa-xmark me-1"></i>
                                                                            FERMER
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </div>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>            
        </div>

            <div class="portfolio-modal modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container"><img src="images/removedbg.png" width="80px" style="margin-right: 10px; position: absolute;">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center mt-3">
                                            <h5 class="text-uppercase"><b>Créer un événement</b></h5>
                                        </div>
                                        <hr>
                                        <form method="post" action="inc/actions/add_event.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Insérez un titre" required>
                                                <label for="titre">Titre :</label>
                                            </div>

                                            <label for="image">Importez votre image :</label><br>
                                                <small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
                                                <input class="form-control" type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required><br>

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="contenu" name="contenu" placeholder="Insérez le contenu de l'événement" required></textarea>
                                                <label for="contenu">Contenu :</label>
                                            </div>

                                             <label for="categorie">Catégorie :</label>
                                                <select class="custom-select" name="categorie" id="categorie" required>
                                                    <?php
                                                    // Récupération des catégories d'événements depuis la base de données
                                                    $requeteCategories = "SELECT * FROM categories_evenements";
                                                    $resultatCategories = $bdd->query($requeteCategories);
                                                                                
                                                    // Boucle pour afficher les options du champ select
                                                    while ($row = $resultatCategories->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['libelle'] . '</option>';
                                                    }
                                                    ?>
                                                </select><br><br>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="ville" name="ville" placeholder="Insérez la ville de l'événement" required>
                                                <label for="ville">Ville :</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Insérez l'adresse de l'événement" required>
                                                <label for="adresse">Adresse :</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" id="date" name="date" required>
                                                <label for="date">Date :</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="float" class="form-control" id="prix" name="prix" required>
                                                <label for="prix">Prix :</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="nbmax" name="nbmax" required>
                                                <label for="nbmax">Participants max :</label>
                                            </div>

                                            <?php if (isset($_SESSION['user'])) { ?>
                                                <input type="hidden" name="id_encours" value="<?php echo $id_encours; ?>">
                                            <?php } ?>

                                            <button class="btn btn-success btn-xl text-uppercase" type="submit">PUBLIER</button>
                                            <button class="btn btn-danger btn-xl text-uppercase" style="float:right" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i> x FERMER
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Inscription -->
        <div id="modal-popup-inscription" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inscription réussie !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Vous êtes désormais inscrit à l'événement.<br>Un mail de confirmation vous a été envoyé.</p>
                    </div>
                </div>
            </div>
        </div>
                                        
        <!-- Modal Erreur -->
        <div id="modal-popup-erreur" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Erreur d'inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Une erreur est survenue lors de l'inscription.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="modal-popup-evenementOK" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Publication d'un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Félicitations, l'événement a bien été ajouté.</p>
                    </div>
                </div>
            </div>
        </div>
                      
        <div id="modal-popup-evenementNonOK" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Publication d'un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Une erreur est survenue.</p>
                    </div>
                </div>
            </div>
        </div>   
                      
        <div id="modal-popup-existe" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Publication d'un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Le document existe déjà dans la base. Vous pouvez le renommer.</p>
                    </div>
                </div>
            </div>
        </div>   
          
        <div id="modal-popup-format" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Publication d'un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Le format est incorrect.</p>
                    </div>
                </div>
            </div>
        </div>  

        <div id="modal-popup-desinscritOk" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Désinscription à un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Vous êtes désormais désinscrit.</p>
                    </div>
                </div>
            </div>
        </div>  

        <div id="modal-popup-desinscritNonOk" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Désinscription à un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 1.5rem;position: absolute;top: 0.8rem;right: 0.5rem;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Une erreur est survenue.</p>
                    </div>
                </div>
            </div>
        </div>  

        <script>
            const params = new URLSearchParams(window.location.search);
            const inscription = params.get('inscription');
                if (inscription === 'inscrit') {
                    $('#modal-popup-inscription').modal('show');
                } else if (inscription === 'erreur') {
                    $('#modal-popup-erreur').modal('show');
                }
            
            const params2 = new URLSearchParams(window.location.search);
            const addE = params.get('addE');
                if (addE === 'evenementOK') {
                    $('#modal-popup-evenementOK').modal('show');
                } else if (addE === 'evenementNonOK') {
                    $('#modal-popup-evenementNonOK').modal('show');
                } else if (addE === 'format') {
                    $('#modal-popup-format').modal('show');
                } else if (addE === 'existe') {
                    $('#modal-popup-existe').modal('show');
                }

            const params3 = new URLSearchParams(window.location.search);
            const desinscription = params.get('desinscription');                      
                if (desinscription === 'desinscritOk') {
                    $('#modal-popup-desinscritOk').modal('show');
                } else if (addE === 'desinscritNonOk') {
                    $('#modal-popup-desinscritNonOk').modal('show');
                 }

                 document.getElementById('categorieFilter').addEventListener('change', function() {
                    var selectedCategoryId = this.value;
                    var evenements = document.querySelectorAll('.evenement');

                    evenements.forEach(function(evenement) {
                        var categorieBadge = evenement.querySelector('.badge-secondary');
                        if (selectedCategoryId === '' || categorieBadge.dataset.categorieId === selectedCategoryId) {
                            evenement.style.display = 'block';
                        } else {
                            evenement.style.display = 'none';
                        }
                    });
                });
        </script>


        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div> 

    <div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="https://via.placeholder.com/450x800.png" alt="image"></div>
                            <div class="item"><img src="https://via.placeholder.com/450x800.png" alt="image"></div>
                            <div class="item"><img src="https://via.placeholder.com/450x800.png" alt="image"></div>
                            <div class="item"><img src="https://via.placeholder.com/450x800.png" alt="image"></div>
                            
                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">               
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message"><div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div></div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2"><div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div></div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing"><div class="stage"><div class="dot-typing"></div></div></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div> 
    </div>

     
    

   


    <script src="js/plugin.js"></script>

    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/imagePreview.js"></script>                          
    
</body>

</html>