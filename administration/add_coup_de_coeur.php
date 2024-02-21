<?php
@session_start();
require('../global.php');

connected_only();

$pageinfo = "Ajouter un coup de coeur";
$pageactive = "RDV1";

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
											Publier un coup de coeur
										</h5>
									</div>
									<ul class="breadcrumb">
										<li class="breadcrumb-item">
											<a href=""><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:">PAGE COUPS DE COEUR</a></li>
										<li class="breadcrumb-item"><a href="javascript:">Publier</a></li>
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
											<h5>Publication</h5>
											<p>Remplissez le formulaire ci-dessous afin de publier un nouveau coup de coeur sur le site web.</p>
										</div>
										<div class="card-body">
											<hr><br>
											<div class="row">
												<div class="col-md-12">
													<form method="post" action="../inc/actions/site_publier.php" enctype="multipart/form-data">
														<label for="publi_titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre :</label>
														<input class="form-control" type="text" name="publi_titre" id="publi_titre" placeholder="Insérez un titre" required><br>

														<label for="auteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Auteur :</label>
														<input class="form-control" type="text" name="auteur" id="auteur" placeholder="Insérez l'auteur du livre"><br>

														<label for="editeur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editeur :</label>
														<input class="form-control" type="text" name="editeur" id="editeur" placeholder="Insérez l'éditeur du livre"><br>
												
														<label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix (€) :</label>
														<input class="form-control" type="number" step="any" name="prix" id="prix" placeholder="Insérez le prix du livre"><br>

														<label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Importez votre image :</label>
														<small style="color:red">Veillez à ce que le nom de l'image ne contienne pas d'accent ou de caractère spécial.</small>
														<input class="form-control" type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required><br>
																
														<label for="publi_texte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texte :</label>
														<textarea class="form-control" cols="40" rows="5" name="publi_texte" id="publi_texte" placeholder="Insérez votre texte"></textarea><br>

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
	</div>
	<script src="assets/plugins/ckeditor/ckeditor.js?1"></script>

	<script>
	CKEDITOR.replace('publi_texte', {
		// Barre d'outils de CKEditor
		toolbar: [
			{ name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
			{ name: 'links', items: ['Link', 'Unlink'] },
			{ name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
			{ name: 'styles', items: ['Format'] },
			{ name: 'tools', items: ['Maximize'] },
			{ name: 'colors', items: ['TextColor', 'BGColor'] },  // Ajout des boutons de couleur
			{ name: 'others', items: ['-'] },
			{ name: 'about', items: ['About'] }
		],
		// Configurations supplémentaires
		extraPlugins: 'colorbutton',  // Ajout du plugin ColorButton

		// Fonction appelée à chaque changement dans l'éditeur
		onChange: function() {
			var content = CKEDITOR.instances['publi_texte'].getData();

			// Utilisation de RegExp pour vérifier si le contenu commence par <h1>
			var startsWithH1 = /^<h1.*?>/.test(content);

			if (startsWithH1) {
				// Remplacement des balises <h1> par <h4>
				var newContent = content.replace(/<h1(.*?)>/, '<h4 class="fw-semibold border-5 border-warning text-800 border rounded-0 ps-3 border-top-0 border-end-0 border-bottom-0">');
				document.getElementById('texte_large').innerHTML = newContent;

				// Réinitialisation du contenu de CKEditor si nécessaire
				CKEDITOR.instances['publi_texte'].setData('');
			} else {
				// Si le contenu ne commence pas par <h1>, efface le contenu de texte_large
				document.getElementById('texte_large').innerHTML = '';
			}
		}
	});
</script>

	
	<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/pcoded.min.js"></script>
	<div class="modal fade" id="publicationOk" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="tbmodal">
				<h3 style="color:white;">Le coup de coeur vient d'être publié.</h3>
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