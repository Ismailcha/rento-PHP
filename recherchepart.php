<?php
require("connexion_server/connexion.php");

if (isset($_GET['id']) && isset($_GET['id_cat'])) {
	$id = $_GET['id'];
	$cat = $_GET['id_cat'];

	if ($cat == 1) {
		$req = $pdo->prepare("SELECT * FROM immoubilier WHERE id = :id");
	} elseif ($cat == 2) {
		$req = $pdo->prepare("SELECT * FROM materiaux WHERE id = :id");
	} elseif ($cat == 3) {
		$req = $pdo->prepare("SELECT * FROM evenement WHERE id = :id");
	} else {
		// Invalid category, handle the error or redirect to an error page.
		// For now, we'll just exit.
		echo $cat;
	}

	$req->bindValue(":id", $id, PDO::PARAM_INT);
	$req->execute();
	$tableau = $req->fetch(PDO::FETCH_ASSOC);
} else {
	// Missing or invalid parameters, handle the error or redirect to an error page.
	// For now, we'll just exit.
	exit("Missing or invalid parameters.");
}
$utilisateurEmail = $tableau['email']; // Assuming the email is stored in $tableau['email']
// You'll need to replace "your_db_table" with the actual table name of the "utilisateur" table
$query = "SELECT nom_prenom, tel, email FROM utilisateur WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $utilisateurEmail, PDO::PARAM_STR);
$stmt->execute();
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Rento - Détaille</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Template Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid position-relative p-0">

		<?php
		require_once("entete.php");
		?>
		</br>
		<div id="myTabContent" class="tab-content container-fluid py-5 mb-5">
			<div class="tab-pane fade show active" id="home">
				<div class="row m-4 text-center justify-content-center">
					<div class="col-md-3 d-flex justify-content-center align-items-center">
						<?php if (!empty($tableau['image1'])) : ?>
							<?php $images = array($tableau['image1'], $tableau['image2'], $tableau['image3'], $tableau['image4']); ?>
							<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<?php foreach ($images as $index => $image) : ?>
										<?php if (!empty($image)) : ?>
											<div class="carousel-item <?php if ($index === 0) echo 'active'; ?>">
												<img src="<?php echo './img/' . $image; ?>" class="d-block w-100" alt="">
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<?php if (count($images) > 1) : ?>
									<a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Precedent</span>
									</a>
									<a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Suivant</span>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Rest of your content -->



					<h4 class="m-4"><?php echo $tableau['titre']; ?></h4>
					<div class="row m-4 text-center justify-content-center">
						<table class="col table table-bordered mt-3">
							<tbody>
								<tr>
									<th>Prix :</th>
									<td><?php echo $tableau['prix']; ?></td>
								</tr>
								<tr>
									<th>Type:</th>
									<td><?php echo $tableau['type']; ?></td>
								</tr>
								<tr>
									<th>Ville:</th>
									<td><?php echo $tableau['ville']; ?></td>
								</tr>
								<tr>
									<th>Adresse:</th>
									<td><?php echo $tableau['adresse']; ?></td>
								</tr>
								<tr>
									<th>Publier:</th>
									<td><?php echo $tableau['date_ann']; ?></td>
								</tr>
								<?php if ($tableau['id_cat'] == 1) : ?>
									<tr>
										<th>Surface:</th>
										<td><?php echo $tableau['surface']; ?></td>
									</tr>
									<tr>
										<th>Prix/jour:</th>
										<td><?php echo $tableau['prix']; ?></td>
									</tr>
									<tr>
										<th>Etage:</th>
										<td><?php echo $tableau['etage']; ?></td>
									</tr>
									<!-- Add more rows for category 1 -->
								<?php elseif ($tableau['id_cat'] == 2) : ?>
									<tr>
										<th>État:</th>
										<td><?php echo $tableau['etat']; ?></td>
									</tr>
									<tr>
										<th>Prix/heure:</th>
										<td><?php echo $tableau['prix']; ?></td>
									</tr>
									<tr>
										<th>Prix/jours:</th>
										<td><?php echo $tableau['prix1']; ?></td>
									</tr>
									<!-- Add more rows for category 2 -->
								<?php elseif ($tableau['id_cat'] == 3) : ?>
									<tr>
										<th>État:</th>
										<td><?php echo $tableau['etat']; ?></td>
									</tr>

									<tr>
										<th>Prix/heure:</th>
										<td><?php echo $tableau['prix']; ?></td>
									</tr>
									<tr>
										<th>Prix/jours:</th>
										<td><?php echo $tableau['prix1']; ?></td>
									</tr>
									<!-- Add more rows for category 3 -->
								<?php endif; ?>
							</tbody>
						</table>
						<div class="col-md-3">
							<table class="table table-bordered mt-3">
								<tbody>
									<h6>Contact</h6>
									<tr>
										<th>Nom et Prénom</th>
										<td><?php echo $utilisateur['nom_prenom']; ?></td>
									</tr>
									<tr>
										<th>Téléphone</th>
										<td><a href="tel:<?php echo $utilisateur['tel']; ?>"> <?php echo $utilisateur['tel']; ?></a>
										</td>
									</tr>
									<tr>
										<th>Whatsapp</th>
										<td><a href="tel:<?php echo $utilisateur['tel']; ?>"> <?php echo $utilisateur['tel']; ?></a>
											<a href="https://wa.me/<?php echo str_replace(array(' ', '-', '.'), '', $utilisateur['tel']); ?>" target="_blank">
												<i class="fab fa-whatsapp"></i>
											</a>
										</td>
									</tr>
									<tr>
										<th>Email</th>
										<td><a href="mailto:<?php echo $utilisateur['email']; ?>"> <?php echo $utilisateur['email']; ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Bootstrap JS (optional, add at the end of the body) -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>