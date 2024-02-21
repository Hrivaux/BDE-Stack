<?php
@session_start();
require('../global.php');

// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
	$currentPage = (int) strip_tags($_GET['page']);
} else {
	$currentPage = 1;
}

// On détermine le nombre d'emails total
$emailsCompte = 'SELECT COUNT(*) AS nb FROM `newsletter_email`;';

// On prépare la requête
$query = $bdd->prepare($emailsCompte);

// On exécute
$query->execute();

// On récupère le nombre d'emails
$result = $query->fetch();
$nbEmails = (int) $result['nb'];

// On détermine le nombre d'emails par page
$parPage = 10;

// On calcule le nombre de pages total
$pages = ceil($nbEmails / $parPage);

// Calcul du 1er email de la page
$premier = ($currentPage * $parPage) - $parPage;

connected_only();

$pageinfo = "Liste des adresses e-mail inscrites à la newsletter";
$pageactive = "NEWSLETTER";

include('templates/meta.php');

if ($grade_encours < 2) {
	Header('location: accueil.php');
}
?>

<body>
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<?php include('templates/menu.php'); ?>
	<?php include('templates/header.php'); ?>
	<section class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="page-header">
						<div class="page-block">
							<div class="row align-items-center">
								<div class="col-md-12">
									<div class="page-header-title">
										<h5 class="m-b-10">
											Liste des adresses e-mail inscrites à la newsletter
										</h5>
									</div>
									<ul class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html"><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">Administration</a></li>
										<li class="breadcrumb-item"><a href="javascript:">Newsletter</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="main-body">
						<div class="page-wrapper">
							<div class="row">
								<div class="col-xl-12">
									<div class="card">
										<div class="card-header">
											<h5>
												Liste des adresses e-mail inscrites
											</h5>
											<p>Consultez la liste complète des adresses e-mail inscrites à la newsletter.</p>
										</div>
										<div class="card-block table-border-style">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>
																ID
															</th>
															<th>
																Adresse e-mail
															</th>
															<th>
																Date d'inscription
															</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$requete = ("SELECT 
                                                            id,
                                                            email,
                                                            date
                                                        FROM 
                                                            newsletter_email
                                                        ORDER BY id DESC LIMIT :premier, :parpage;");

														$reqEmails = $bdd->prepare($requete);
														$reqEmails->bindValue(':premier', $premier, PDO::PARAM_INT);
														$reqEmails->bindValue(':parpage', $parPage, PDO::PARAM_INT);

														$reqEmails->execute();

														$resultat = $reqEmails->fetchAll(PDO::FETCH_ASSOC);
														if (!empty($resultat)) {
															foreach ($resultat as $email) { ?>
																<tr>
																	<td>
																		<?php echo $email['id']; ?>
																	</td>
																	<td>
																		<a href="mailto:<?php echo $email['email']; ?>"><?php echo $email['email']; ?></a>
																	</td>
																	<td>
																		<?php setlocale(LC_ALL, 'fr_FR.UTF-8');
																		echo strftime('%d %B %Y', strtotime($email['date']));
																		?>
																	</td>
																</tr>
														<?php
															}
														} else {
															echo "Aucune adresse e-mail inscrite actuellement.";
														}
														?>
													</tbody>
												</table>
												<nav aria-label="Page navigation example">
													<ul class="pagination">
														<li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
															<a class="page-link" href="<?php echo $url; ?>Administration/newsletter.php?page=<?= $currentPage - 1 ?>" aria-label="Précédent"><span aria-hidden="true">&laquo;</span><span class="sr-only">Précédent</span></a>
														</li>
														<?php for ($page = 1; $page <= $pages; $page++) : ?>
															<li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
																<a class="page-link" href="<?php echo $url; ?>Administration/newsletter.php?page=<?= $page ?>"><?= $page ?></a>
															</li>
														<?php endfor ?>
														<li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
															<a class="page-link" href="<?php echo $url; ?>Administration/newsletter.php?page=<?= $currentPage + 1 ?>" aria-label="Suivant"><span aria-hidden="true">&raquo;</span><span class="sr-only">Suivant</span></a>
														</li>
													</ul>
												</nav>
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
	</section>

	<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/pcoded.min.js"></script>

</body>

</html>