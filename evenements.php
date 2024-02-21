<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>

         <?php include('templates/menu.php'); ?>
        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                                <div class="card-body d-flex align-items-center p-0">
                                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Nos événements</h2>
                                    <div class="search-form-2 ms-auto">
                                        <i class="ti-search font-xss"></i>
                                        <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Rechercher">
                                    </div>
                                    <a href="#" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i></a>
                                </div>
                            </div>
                            <div class="row ps-2 pe-1">
                            <?php if (isset($_SESSION['user']) && $grade_encours >= 2): ?>
                                        <button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" href="#ModalForm"> Créer un événement</button>
                                <?php endif; ?> 
                                <?php
                                    $requete = "SELECT 
                                                    E.id,
                                                    E.libelle_evenement,
                                                    E.photo_couverture,
                                                    E.id_categorie,
                                                    E.adresse,
                                                    E.ville,
                                                    C.libelle as 'catLibelle'
                                                FROM 
                                                    evenements E
                                                    INNER JOIN categories_evenements C ON C.id = E.id_categorie
                                                ORDER BY 
                                                    E.date DESC";
                                    $reqart = $bdd->prepare($requete);
                                    $reqart->execute();
                                    $resultat = $reqart->fetchAll();

                                    if (!empty($resultat)) {
                                        foreach ($resultat as $evenement) {
                                            $id_evenement = $evenement['id'];
                                            $requete_inscription = "SELECT COUNT(*) AS nb_participants FROM inscriptions_evenements WHERE id_evenement = ? and id_user = $id_encours and actif = 1";
                                            $req_inscription = $bdd->prepare($requete_inscription);
                                            $req_inscription->execute([$id_evenement]);
                                            $nb_participants = $req_inscription->fetchColumn();
                                        
                                            $inscrit = $nb_participants > 0;
                                        
                                            // Déterminez le texte approprié en fonction du nombre de participants
                                            $participants_text = $nb_participants > 1 ? "<b>$nb_participants</b> participants" : "<b>$nb_participants</b> participant";
                                ?>
                                            <div class="col-md-6 col-sm-6 pe-2 ps-2">
                                                <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                                    <div class="card-body position-relative h100 bg-image-cover bg-image-center" style="background-image: url(images/uploads/evenements/couverture/<?php echo $evenement['photo_couverture']; ?>); width: 500px; height: 100px;"></div>
                                                    <div class="card-body d-block w-100 pe-4 pb-4 pt-0 text-left position-relative">
                                                        <h4 class="fw-700 font-xsss mt-3 mb-1"><?php echo $evenement['libelle_evenement']; ?></h4>
                                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-0"><?php echo $evenement['adresse']." <br> ".$evenement['ville']; ?></p>
                                                        <br>
                                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3"><?php echo $participants_text; ?></p>
                                                        
                                                        <span class="badge badge-secondary"><?php echo $evenement['catLibelle']; ?></span>
                                                        
                                                        <span class="position-absolute right-15 top-0 d-flex align-items-center">
                                                            <?php if ($inscrit): ?>
                                                                <a href="inc/actions/desinscription_evenement.php?id_evenement=<?php echo $evenement['id']; ?>" class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-green font-xsssss fw-700 ls-lg text-blue inscrit-btn">✅ INSCRIT</a>
                                                            <?php else: ?>
                                                                <a href="inc/actions/inscription_evenement.php?id_evenement=<?php echo $evenement['id']; ?>" class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white sinscrire-btn">S'INSCRIRE</a>
                                                            <?php endif; ?>
                                                        </span>
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
        <!-- main content -->
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

                                            <input type="hidden" name="id_encours" value="<?php echo $id_encours; ?>">

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
        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

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

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De fabous</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
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
                        <p>Vous êtes désormais inscrit à l'événement.</p>
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
        </script>


        <!-- right chat -->
        
        <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
            <a href="default.php" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
            <a href="default-video.php" class="nav-content-bttn"><i class="feather-package"></i></a>
            <a href="default-live-stream.php" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>            
            <a href="shop-2.php" class="nav-content-bttn"><i class="feather-layers"></i></a>
            <a href="default-settings.php" class="nav-content-bttn"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 shadow-xss"></a>
        </div>

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

    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>