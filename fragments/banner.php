<?php
	$banner_class = "";
	$banner_filename = strtolower(basename($_SERVER["PHP_SELF"]));

	switch ($banner_filename) {
		case "index.php":
			$banner_class = "";
			break;

		case "products.php":
		case "product.php":
		case "cases.php":

			$banner_class = "product";
			break;

		case "automatismos.php":
		case "automatismos_detail.php":
		case "automatismos_product.php":
			$banner_class = "automatismos";
			break;

		case "control_accesos.php":
		case "control_accesos_detail.php":
		case "control_accesos_product.php":
			$banner_class = "control_accesos";
			break;

		case "puertas_automaticas.php":
		case "puertas_automaticas_detail.php":
		case "puertas_automaticas_product.php":
			$banner_class = "puertas_automaticas";
			break;
			
		case "puertas_industriales.php":
		case "puertas_industriales_detail.php":
		case "puertas_industriales_product.php":
			$banner_class = "puertas_industriales";
			break;			
			
		case "gigants_doors.php":
			$banner_class = "puertas_gigantes";
			break;				

		case "dev.php":
		case "applications.php":
		case "application.php":
		case "applicationid1.php":
			$banner_class = "application";
			break;
			
		case "downloads.php":
		case "download.php":
		case "ver.php":
		case "file.php":
			$banner_class = "downloads";
			break;

		case "news.php":
		case "news_detail.php":
			$banner_class = "news";
			break;

		case "partner.php":
			$banner_class = "partners";
			break;

		case "profile.php":
		case "network.php":
		case "sitemap.php":
			$banner_class = "profile";
			break;

		case "login.php":
			$banner_class = "downloads";
			break;

		default:
			$banner_class = "product";
			break;
	}
?>
<div class="banner <?php echo $banner_class ?>"></div>