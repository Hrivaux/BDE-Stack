<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Publier une vidéo";
$pageactive = "VIDEO";

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
											Ajouter un membre de l'équipe
										</h5>
									</div>
									<ul class="breadcrumb">
										<li class="breadcrumb-item">
											<a href=""><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:">PAGE ÉQUIPE</a></li>
										<li class="breadcrumb-item"><a href="javascript:">Ajouter un membre</a></li>
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
										<div class="card-header">
											<h5>Ajouter un membre</h5>
											<p>Remplissez le formulaire ci-dessous afin d'ajouter un membre à l'équipe.</p>
										</div>
										<div class="card-body">
											<hr><br>
											<div class="row">
												<div class="col-md-12">
													<form method="post" action="<?php echo $url; ?>inc/actions/membre_ajouter.php" enctype="multipart/form-data">
														
														<label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Son prénom :</label>
														<input class="form-control" type="text" name="prenom" id="prenom" placeholder="Insérez un prénom"></input><br>

														<label for="fonction" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sa fonction :</label>
														<input class="form-control" type="text" name="fonction" id="fonction" placeholder="Insérez une fonction"></input><br>
														
														<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sa description :</label>
														<input class="form-control" type="text" name="description" id="description" placeholder="Insérez un texte bref"></input><br>
														
														<label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Importez votre image :</label>
														<small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
														<input class="form-control" type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required><br>
														
														<br>
												</div>
											</div>
											<input type="submit" value="AJOUTER UN MEMBRE" class="btn btn-primary" />
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

		<div class="modal fade" id="publicationOk" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:white;">Le membre a bien été ajouté à l'équipe.</h3>
			</div>
		</div>
	</div>

	<div class="modal fade" id="publicationErreur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:red;">Merci de remplir tous les champs.</h3>
			</div>
		</div>
	</div>

	<div class="modal fade" id="formatErreur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:red;">Seuls les fichiers de type JPEG, JPG, PNG et GIF sont acceptés.</h3>
			</div>
		</div>
	</div>

	<div class="modal fade" id="dossierErreur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:red;">Erreur, le dossier de destination des images est introuvable.</h3>
			</div>
		</div>
	</div>

	<div class="modal fade" id="existeErreur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:red;">Erreur, ce nom d'image est déjà utilisé. <br />Vous pouvez la renommer.</h3>
			</div>
		</div>
	</div>

	<script>
		<?php
		if (isset($_GET['action'])) {
			$errlogin = htmlspecialchars($_GET['action']);

			switch ($errlogin) {
				case 'publicationOk':
		?>
					$(document).ready(function() {
						$("#publicationOk").modal('show');
					});
				<?php
					break;

				case 'publicationErreur':
				?>
					$(document).ready(function() {
						$("#publicationErreur").modal('show');
					});
				<?php
					break;

				case 'dossierErreur':
				?>
					$(document).ready(function() {
						$("#dossierErreur").modal('show');
					});
				<?php
					break;

				case 'formatErreur':
				?>
					$(document).ready(function() {
						$("#formatErreur").modal('show');
					});
				<?php
					break;

				case 'existeErreur':
				?>
					$(document).ready(function() {
						$("#existeErreur").modal('show');
					});
		<?php
					break;
			}
		}
		?>
	</script>
</body>

</html>