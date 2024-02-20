<?php
@session_start();
require('global.php');

connected_only();

include('templates/meta.php');

class Header
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function generateHeader()
    {
        ?>
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="accueil.php"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">BDE de Sciences U</span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.php" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>
            
            <form action="#" class="float-left header-search" style="margin-left: 100px">
                <div class="form-group mb-0 icon-input">
                    <i class="feather-search font-sm text-grey-400"></i>
                    <input type="text" placeholder="Rechercher par mot clé.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
                </div>
            </form>
<a href="accueil.php" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
            <a href="default-storie.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-zap font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
            <a href="default-video.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-video font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
            <a href="default-group.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-user font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
            <a href="shop-2.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-shopping-bag font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
            <?php $this->generateNotifications(); ?>

            <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
            <!-- Le reste du code ici -->
            <a href="author-page.php" class="p-0 ms-3 menu-icon"><img src="" width="50px" height="50px" alt="user" class="w40 mt--1"></a>
        </div>
        <?php
    }

    private function generateNotifications()
    {
        $requeteEvenements = $this->bdd->prepare("SELECT libelle_evenement AS nom, description, date FROM evenements LIMIT 2");
        $requetePublications = $this->bdd->prepare("SELECT libelle_publication AS nom, description, date_publication AS date FROM publication LIMIT 2");

        $requeteEvenements->execute();
        $requetePublications->execute();

        $notifications = [];

        // Récupérer les événements
        while ($evenement = $requeteEvenements->fetch()) {
            $notifications[] = $evenement;
        }

        // Récupérer les publications
        while ($publication = $requetePublications->fetch()) {
            $notifications[] = $publication;
        }

        // Mélanger les notifications
        shuffle($notifications);
        ?>

        <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="dot-count bg-warning"></span>
            <i class="feather-bell font-xl text-current"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
            <h4 class="fw-700 font-xss mb-4">Notification</h4>
            
            <?php
            // Afficher les notifications
            foreach ($notifications as $notification) {
                $description = $notification['description'];
                $words = explode(' ', $description);
                $count = count($words);
            ?>
            <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                <img src="https://via.placeholder.com/50x50.png" alt="user" class="w40 position-absolute left-0">
                <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block"><?php echo $notification['nom']; ?><span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
                <h6 class="text-grey-500 fw-500 font-xssss lh-4">
                    <?php 
                    for ($i = 0; $i < $count; $i++) {
                        echo $words[$i] . ' ';
                        // Sauter à la ligne après chaque 10 mots
                        if (($i + 1) % 10 === 0) {
                            echo '<br>';
                        }
                    }
                    ?>
                </h6>
            </div>
            <?php
            }

            // Vérifier s'il n'y a pas de notifications
            if (empty($notifications)) {
                echo "Il n'y a pas de notifications";
            }
            ?>
        </div>
        <?php
    }
}

$header = new Header($bdd);
$header->generateHeader();
?>


  