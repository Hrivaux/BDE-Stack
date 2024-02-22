<body class="color-theme-blue mont-font">
    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>

         <?php include('templates/menu.php'); ?>
        <!-- main content -->
        <div class="main-content right-chat-active">
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <?php if (isset($_SESSION['user'])) { ?><div class="row feed-body"><?php } else { ?><div class="row"><?php } ?>
                           <?php 
                                if (isset($_SESSION['user']) && ($grade_encours >= 2)) { 
                            ?>
                            <form action="inc/upload_handler.php" method="post" enctype="multipart/form-data">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                    <p>Bienvenue, publiez un nouveau message :</p>
                                    <div class="card-body p-0">   
                                        <input name="libelle_publication" class="h20 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" type="text" placeholder="Titre"></input>
                                    </div>
                                    <div class="card-body p-0 mt-3 position-relative">
                                        <textarea name="description" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="Description"></textarea>
                                    </div>
                                    <div class="card-body d-flex p-0 mt-0">
                                        <label class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4" style="cursor: pointer;">
                                            <input type="file" name="fileToUpload" id="fileToUpload" required style="display:none;">
                                            <i class="font-md text-success feather-image me-2"></i>
                                            <span>Photo</span>
                                        </label>
                                        <button type="submit" class="font-xssss fw-600 text-grey-500 p-0 d-flex align-items-center bg-transparent border-0">
                                            <i class="btn-round-sm font-xs text-primary ti-arrow-right me-2 bg-greylight"></i>
                                        </button>   
                                        <img id="imagePreview" src="" alt="Aperçu de l'image" style="display: none; max-width: 50%; max-height: auto; object-fit: cover; border-radius: 10px; margin: 25px; ">                        
                                    </div>
                                </div>
                            </form>
                            <?php } 
                                $sql = "SELECT publication.*, users.pseudo FROM publication INNER JOIN users ON publication.id_users = users.id";
                                $statement = $bdd->prepare($sql);

                                $statement->execute();
                                        
                                $publications = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    foreach($publications as $publication){  ?>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="col-xl-8 col-xxl-9 col-lg-8 ps-md-0">
                                    <?php } else { ?>
                                <div class="col-xl-12 col-xxl-9 col-lg-8 ps-md-0">
                                    <?php } ?>
                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                <div class="card-body p-0 d-flex">
                                    <figure class="avatar me-3"><img src="https://via.placeholder.com/50x50.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $publication['pseudo'];  ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $publication['date_publication'];  ?></span></h4>
                                    <a href="#" class="ms-auto"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                </div>
                                <div class="card-body p-0 me-lg-5">
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $publication['libelle_publication'];  ?></h4>
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2"><?php echo $publication['description']; ?></p>
                                </div>
                                <div class="card-body d-block p-0 mb-3">
                                    <div class="row ps-2 pe-2">
                                        <div class="col-sm-12 p-1"><img src="<?php echo htmlspecialchars($publication['chemin_image']); ?>" class="rounded-3 w-100" alt="image"></div>                                        
                                    </div>
                                </div>
                                <div class="card-body d-flex p-0">
                                    <a href="#" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a>
                                    <div class="emoji-wrap">
                                        <ul class="emojis list-inline mb-0">
                                            <li class="emoji list-inline-item"><i class="em em---1"></i> </li>
                                            <li class="emoji list-inline-item"><i class="em em-angry"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-anguished"></i> </li>
                                            <li class="emoji list-inline-item"><i class="em em-astonished"></i> </li>
                                            <li class="emoji list-inline-item"><i class="em em-blush"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-clap"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-cry"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-full_moon_with_face"></i></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Comment</span></a>
                                    <a href="#" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span class="d-none-xs">Share</span></a>
                                </div>
                            </div>
                                    </div>
                            <br>
                            
                            <?php
                             if (isset($_SESSION['user'])) { ?>
                        <div class="col-xl-4 col-xxl-3 col-lg-4 ps-md-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Les évènements que tu as manqués</h4>
                                    <a href="index.php" class="fw-600 ms-auto font-xssss text-primary">Tout voir </a>
                                </div>
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
                            WHERE 
                                E.id NOT IN (
                                    SELECT id_evenement
                                    FROM inscriptions_evenements
                                    WHERE id_user = $id_encours AND actif = 1
                                )
                            ORDER BY 
                                E.date DESC
                            LIMIT 3";
                                
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
                                <div class="" style="text-align: center;">
                                    <img src="images/uploads/evenements/couverture/<?php echo $evenement['photo_couverture']; ?> " alt="" style="height: 150px; width: auto;"><br><br>
                                    <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3"><?php echo $participants_text; ?></p>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $evenement['libelle_evenement']; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $evenement['adresse']; ?></span></h4>
                                </div>
                                <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                    <?php if (isset($_SESSION['user'])) {  
                                         if ($inscrit): ?>
                                    <a href="#" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">✅ INSCRIT</a></a>
                                    <?php else: ?>
                                    <a href="inc/actions/inscription_evenement.php?id_evenement=<?php echo $evenement['id']; ?>" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">S'INSCRIRE</a>
                                    <?php endif; 
                                    } ?>
                                    <a href="publications.php" class="p-2 lh-20 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl" style="white-space: nowrap;">Voir plus de détails</a>
                                </div> 
                                <?php } } ?>
                            </div>
                        </div> <?php } ?>
                            <?php }?>
                    </div>
                </div>
                 
            </div>            
        </div>
        
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
        </div>
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