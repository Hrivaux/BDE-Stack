

<body class="color-theme-blue mont-font">
    
    <div class="main-wrapper">

    <?php 
        include('templates/header.php'); 
        include('templates/menu.php'); 

        // Compteur nombre de publication 
        $nbpubli = $bdd->query("SELECT count(*) as nb FROM publication WHERE id_users = $id_encours");
        $data = $nbpubli->fetch();
        $nb_publicationducompte = $data['nb'];

?>

        <!-- main content -->
        <div class="main-content right-chat-active">
        <?php
                                                    $requete = $bdd->prepare("SELECT * FROM users WHERE id = $id_encours");
                                                    $requete->execute();
                                                    $profilconnecte = $requete->fetch();
                                                    ?>
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                <div class="card-body position-relative h240 bg-image-cover bg-image-center" style="background-image: url('images/uploads/photo_couverture/<?php echo $profilconnecte['photo_couverture']?>');"></div>
                                <div class="card-body d-block pt-4 text-center position-relative">
                                    <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 ms-auto me-auto"><img src="images/uploads/photo_profil/<?php echo $profilconnecte['photo_profil']?>" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>

                                    <h4 class="font-xs ls-1 fw-700 text-grey-900"><?php echo $prenomnom ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $profilconnecte['pseudo']; ?></span></h4>
                                    
                                    <div class="d-flex align-items-center pt-0 position-absolute left-15 top-10 mt-4 ms-2">
                                        <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2"><b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark"><?php echo $nb_publicationducompte; ?></b> Publication<?php if ($nb_publicationducompte > 1) { echo "s"; } ?></h4>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center position-absolute right-15 top-10 mt-2 me-2">
                                       <a type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" href="#ModalForm"> Modifier mon profil</a>
                                        <a href="#" id="dropdownMenu8" class="d-none d-lg-block btn-round-lg ms-2 rounded-3 text-grey-700 bg-greylight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more font-md"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu8">
                                            <div class="card-body p-0 d-flex">
                                                <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-0">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-block p-4">
                                    <h4 class="fw-700 mb-3 font-xsss text-grey-900">Description <a data-bs-toggle="modal" href="#ModalForm" id="openModal" ><i class="feather-edit-2 text-grey-500 me-3 font-lg"></i></a></h4>

                                    
                                    <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0"><?php echo $profilconnecte['status']; ?></p>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-eye text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Ecole <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $profilconnecte['ecole']; ?></span></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $profilconnecte['ville']; ?></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-users text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Genarel Group</h4>
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
                                <h5 class="text-uppercase"><b>Modifier mes informations personnelles : </b></h5>
                            </div>
                            <hr>

                              <form method="post" action="inc/ModificationInformationUser.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Insérez un titre" value="<?php  echo $profilconnecte['status']; ?>">
                                    <label for="status">Description :</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="ecole" name="ecole" placeholder="Insérez le contenu de l'événement"><?php echo $profilconnecte['ecole']; ?></textarea>
                                    <label for="ecole">Ecole :</label>
                                </div>

                                <label for="ville">Ville :</label>
                                <textarea class="form-control" id="ville" name="ville" placeholder="Insérez la ville"><?php echo $profilconnecte['ville']; ?></textarea>
                                <br><br>

                                <!-- Les images nécessitent une gestion différente -->
                                <div>
                                    <label for="photo_profil">Changez votre photo de profil :</label><br>
                                    <small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
                                    <input class="form-control" type="file" name="photo_profil" id="photo_profil" accept="image/jpeg, image/png, image/gif"><br>
                                    <!-- Afficher l'image actuelle si elle existe -->
                                    <?php if (!empty($utilisateur['photo_profil'])): ?>
                                        <img src="chemin/vers/les/images/<?php echo $utilisateur['photo_profil']; ?>" alt="Photo de profil" style="max-width: 100px;">
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <label for="photo_couverture">Changez votre photo de couverture :</label><br>
                                    <small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
                                    <input class="form-control" type="file" name="photo_couverture" id="photo_couverture" accept="image/jpeg, image/png, image/gif"><br>
                                    <!-- Afficher l'image de couverture actuelle si elle existe -->
                                    <?php if (!empty($utilisateur['photo_couverture'])): ?>
                                        <img src="chemin/vers/les/images/<?php echo $utilisateur['photo_couverture']; ?>" alt="Photo de couverture" style="max-width: 100px;">
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-success btn-xl text-uppercase" type="submit">MODIFIER</button>
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







                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Événement</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">Voir tout</a>
                                </div>
                                <?php
$requete = $bdd->prepare("SELECT * FROM evenements LIMIT 3");
$requete->execute();
$reqev = $requete->fetch();

if ($reqev !== false) {?>
                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600"><?php echo $reqev['date'];?></h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2"><?php echo $reqev['libelle_evenement'];?><span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500"><?php echo $reqev['adresse'];?></span> </h4>
                                </div><?php
                    }
                    else
                    {
                    echo "Il n'y a pas d'évènement à venir";
                    }
                    ?>
   
                            </div>

                        </div>
                        <div class="col-xl-8 col-xxl-9 col-lg-8">

                          

                      
                                    <?php
                                    $requete = $bdd->prepare("SELECT * FROM publication WHERE id_users  = $id_encours");
                                    $requete->execute();
                                    $reqpubli = $requete->fetch();

                                    if ($reqpubli !== false) { ?>

                                                      <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="card-body p-0 d-flex">
                                    <figure class="avatar me-3"><img src="images/uploads/photo_profil/<?php echo $photo_profil?>" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $profilconnecte['pseudo']; ?>
                                  
                                    <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">
                                        <?php
                                            $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
                                            $date = date("d", strtotime($reqpubli['date_publication'])) . ' ' . $mois[date("n", strtotime($reqpubli['date_publication'])) - 1] . ' ' . date("Y", strtotime($reqpubli['date_publication']));
                                            echo $date;
                                        ?>         
                                    </span></h4>
                                     <?php if ($grade_encours >= 2 && $reqpubli['id_users'] == $id_encours) : ?>
                                    <a href="inc/DeletePubli.php?id_publication=<?php echo $reqpubli['id']; ?>" class="ms-auto">
                                        <i class="feather-trash font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500"></i>
                                    </a>
                                <?php endif; ?>
                                </div>
                                <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                    <h2 style="text-align: center;"><?php echo $reqpubli['libelle_publication']; ?></h2>
                                    <div class="row ps-2 pe-2">
                                        <div class="col-sm-12 p-1"><img src="images/uploads/publication/<?php echo $reqpubli['chemin_image']; ?>" class="rounded-3 w-100" alt="image"></div>                                        
                                    </div>
                                </div>
                                <div class="card-body p-0 me-lg-5">
                                    <p class="fw-500 text-black-500 lh-26 font-xssss w-100 mb-2"><?php echo $reqpubli['description']; ?></p>
                                </div>
                            </div>
                            <?php
}
else
{
   echo "Vous n'avez pas de publication";
}
?>
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
    <script src="js/scripts.js"></script>
    <script src="js/lightbox.js"></script>

    
</body>

</html>