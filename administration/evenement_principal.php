<?php
@session_start();
require ('../global.php');

connected_only();

if ($grade_encours < 3) {
	Header('location: accueil.php');
}

$pageinfo = "Paramétrer le message d'événement";
$pageactive = "EVPRINCIPAL";

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
												Message d'événement
											</h5>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="index.html"><i class="feather icon-home"></i></a>
											</li>
											<li class="breadcrumb-item"><a href="javascript:">Administration</a></li>
											<li class="breadcrumb-item"><a href="javascript:">Paramétrer le message d'accueil de l'événement</a></li>
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
											<div class="card-body">
												<hr>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-left: 380px;">
                                                        <form method="post" action="../inc/actions/edit_evenement_principal.php">
														    <div class="form-group">
														        <label for="titre">Titre de l'événement</label>
														        <input type="text" class="form-control" name="titre" id="titre" value="<?php echo htmlentities($titreEvenement); ?>">
														    </div>

														    <div class="form-group">
														        <label for="message">Message de l'événement</label>
														        <textarea type="text" class="form-control" name="message" id="message"><?php echo htmlentities($messageEvenement); ?></textarea>
														    </div>

														    <?php if ($evenementActif) { ?>
														        <button type="submit" class="btn btn-danger" name="submit2">Masquer l'événement</button>
														    <?php } else { ?>
														        <button type="submit" class="btn btn-success" name="submit2">Afficher l'événement</button>
														    <?php } ?>
															
														    <input type="submit" value="Modifier le nouveau message" name="submit" class="btn btn-primary"/>
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

<div class="modal fade" id="success_update_site" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
	<div class="tbmodal">
		<h3 style="color:white;">Le message d'événement du site a bien été mis à jour.</h3>
	</div>
</div>
</div>
<div class="modal fade" id="error_update_site" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
	<div class="tbmodal">
		<h3 style="color:white;">Une erreur est survenue. Les paramètres n'ont pas été mis à jour.</h3>
	</div>
</div>
</div>
 <div class="modal fade" id="affichermsg" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
         <div class="tbmodal">
             <h3 style="color:white;">Le message est désormais affiché.</h3>
         </div>
     </div>
 </div>
 <div class="modal fade" id="masquermsg" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
         <div class="tbmodal">
             <h3 style="color:white;">Le message est désormais masqué.</h3>
         </div>
     </div>
 </div>
<?php
	if(isset($_GET['action'])) {
		$errlogin = htmlspecialchars($_GET['action']);
		
		switch($errlogin)
		{
			case 'success_update_site':
?>
<script>
$(document).ready(function(){
    $("#success_update_site").modal('show');
});
</script>
<?php
			break;
			
			case 'error_update_site';
			?>
<script>
$(document).ready(function(){
    $("#error_update_site").modal('show');
});
</script>
<?php
    break;

    case 'masquermsg';
        ?>
 <script>
     $(document).ready(function(){
         $("#masquermsg").modal('show');
     });
 </script>
<?php
    break;

    case 'affichermsg';
        ?>
 <script>
     $(document).ready(function(){
         $("#affichermsg").modal('show');
     });
 </script>
<?php break; } } ?>

</body>
</html>
