<?php
@session_start();

@include ('./inc/DataBaseConnection.php.php');
@include ('../inc/DataBaseConnection.php.php');
@include ('./inc/functions.php');
@include ('../inc/functions.php');
@include ('../../inc/DataBaseConnection.php.php');
@include ('../../inc/functions.php');
require_once 'inc/DatabaseConnection.php';

if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    
    // Connexion à la base de données
    $database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
    $bdd = $database->connect();

    $sql = $bdd->prepare("SELECT * FROM users WHERE email= :email LIMIT 1");
    $sql->execute(array(':email' => $email));
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    $prenomnom = $user['prenom'] . " " . $user['nom'];
    $nomprenom = $user['nom'] . " " . $user['prenom'];
    $id_encours = $user['id'];
    $photo_profil = $user['photo_profil'];
    $grade_encours = $user['id_grade'];
    $photo_couverture = $user['photo_couverture'];

   // $region_encours = $user['region'];
}

// Date du jour en PHP
$today = date('Y-m-d');

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

include('templates/meta.php');

class Header
{
    private $bdd;
    public $photo_profil; 

    public function __construct($bdd, $photo_profil)
    {
        $this->bdd = $bdd;
        $this->photo_profil = $photo_profil; 
    }

    public function generateHeader()
    {
        ?>
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="index.php"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">BDE de Sciences U</span> </a>
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
<a href="index.php" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
            <a href="default-member.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-users font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
            <a href="publications.php" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i class="feather-send font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
             <?php $this->generateNotifications(); ?>

            <!--
                <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
    -->
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>
                    
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php 
            if (isset($_SESSION['user'])) {
            ?>
            <a href="author-page.php" class="p-0 ms-3 menu-icon"><img src="images/uploads/photo_profil/<?php echo $this->photo_profil; ?>" width="50px" height="50px" alt="user" class="w40 mt--1"></a>
            <?php 
            }
            ?>
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

    if (isset($_SESSION['user'])) {
        $header = new Header($bdd, $photo_profil);
    }
    else {
        $photo_profil = "";
        $header = new Header($bdd, $photo_profil);
    }
$header->generateHeader();

 

  