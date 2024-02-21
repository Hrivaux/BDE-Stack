<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Modifier un compte";
$pageactive = "MC";

if ($grade_encours < 2) {
	Header('location: accueil.php');
}

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
											Modifier un compte
										</h5>
									</div>
									<ul class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html"><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:">RESSOURCES HUMAINES</a></li>
										<li class="breadcrumb-item"><a href="javascript:">Modifier un compte</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="main-body">
						<div class="page-wrapper">
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<?php
										$getID = $_GET['id'];

										$requete = ("SELECT * FROM utilisateurs WHERE id = $getID");

										$requser = $bdd->prepare($requete);
										$requser->execute();


										$resultat = $requser->fetchAll();


										if (!empty($resultat)) {
											foreach ($resultat as $users) {
										?>
												<div class="card-header">
													<h5>
														Modification d'un compte pour le site internet
													</h5>
													<p>Vous pouvez ici mettre à jour les paramètres du compte de <?php echo $users['prenom'] . " " . $user['nom']; ?>.</p>

												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-md-6">
															<form method="post" action="../inc/actions/modifier_compte.php?id=<?php echo $users['id']; ?>" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
																	<input type="text" class="form-control" name="nom" id="nom" aria-describedby="emailHelp" value="<?php echo $users['nom']; ?>">
																</div>
																<div class="form-group">
																	<label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
																	<input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="emailHelp" value="<?php echo $users['prenom']; ?>">
																</div>
																<div class="form-group">
																	<label for="fonction" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fonction</label>
																	<input type="text" class="form-control" name="fonction" id="fonction" aria-describedby="emailHelp" value="<?php echo $users['fonction']; ?>">
																</div>
																<div class="form-group">
																	<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail</label>
																	<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $users['email']; ?>">
																</div>
														</div>
														<div class=" col-md-6">
															<div class="form-group">
																<label for="mdp1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
																<div class="input-group">
																	<input type="password" class="form-control" name="mdp1" id="mdp1" placeholder="Entrez un nouveau mot de passe">
																</div>
															</div>
															<div class="form-group">
																<label for="mdp2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmez le mot de passe</label>
																<div class="input-group">
																	<input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="Retapez le nouveau mot de passe">
																</div>
															</div>
															<div class="form-group">
																<label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
																<select name="genre" class="form-control" id="genre">
																	<option value="1" <?php if ($users['sexe'] === 1) {
																							echo "selected";
																						} ?>>Homme</option>
																	<option value="2" <?php if ($users['sexe'] === 2) {
																							echo "selected";
																						} ?>>Femme</option>
																</select>
															</div>
															<?php if ($users['grade'] != 3) { ?>
																<div class="form-group">
																	<label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
																	<select name="grade" class="form-control" id="grade" placeholder="Grade">
																		<option value="1" <?php if ($users['grade'] === 1) {
																								echo "selected";
																							} ?>>Rédacteur</option>
																		<option value="2" <?php if ($users['grade'] === 2) {
																								echo "selected";
																							} ?>>Administrateur</option>
																	</select>
																</div>
															<?php } ?>
														</div>
														<div class="col-md-6">
														</div>
														<!-- ajouter un select grade -->
														<br><br>
														<div class="col-md-12">
															<input type="submit" value="APPLIQUER LES MODIFICATIONS" class="btn btn-primary" style="width:20%" />
														</div>
													</div>
													</form>
												</div>

										<?php }
										} ?>
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

	<div class="modal fade" id="mdpErreur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:white;">Les mots de passe ne correspondent pas.</h3>
			</div>
		</div>
	</div>

	<?php
	if (isset($_GET['action'])) {
		$errlogin = htmlspecialchars($_GET['action']);

		switch ($errlogin) {
			case 'mdpErreur':
	?>
				<script>
					$(document).ready(function() {
						$("#mdpErreur").modal('show');
					});
				</script>
	<?php break;
		}
	} ?>
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:white;">Le compte a bien été modifié</h3>
			</div>
		</div>
	</div>

	<?php
	if (isset($_GET['action'])) {
		$errlogin = htmlspecialchars($_GET['action']);

		switch ($errlogin) {
			case 'success':
	?>
				<script>
					$(document).ready(function() {
						$("#success").modal('show');
					});
				</script>
	<?php break;
		}
	} ?>
	<div class="modal fade" id="Nonphoto" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:white;">Il faut saisir une photo</h3>
			</div>
		</div>
	</div>

	<?php
	if (isset($_GET['action'])) {
		$errlogin = htmlspecialchars($_GET['action']);

		switch ($errlogin) {
			case 'Nonphoto':
	?>
				<script>
					$(document).ready(function() {
						$("#Nonphoto").modal('show');
					});
				</script>
	<?php break;
		}
	} ?>

</body>

</html>