<?php

	$bc_pos = "";

	$bc_filename = strtolower(basename($_SERVER["PHP_SELF"]));

	switch ($bc_filename) {

		case "index.php":

			$bc_pos = "";

			break;

		case "products.php":

		case "product.php":

			$bc_pos = "GstarCAD";

			break;

		case "cases.php":

			$bc_pos = "Case Studies";

			break;

		case "dev.php":

			$bc_pos = "For The Developers";

			break;

		case "applications.php":

		case "application.php":
		case "applicationid1.php":

			$bc_pos = "Application Products";

			break;

		case "downloads.php":

		case "download.php":

		case "ver.php":

		case "file.php":

			$bc_pos = "Downloads";

			break;

		case "news.php":

		case "news_detail.php":

			$bc_pos = "News";

			break;

		case "partner.php":

			$bc_pos = "Partners";

			break;

		case "profile.php":

			$bc_pos = "About us";

			break;

		case "network.php":

			$bc_pos = "Marketing";

			break;

		case "sitemap.php":

			$bc_pos = "Sitemap";

			break;

		case "reg_user.php":

		case "reg_distributor.php":

		case "reg_developer.php":

			$bc_pos = "Register";

			break;

		case "search.php":

			$bc_pos = "Search Result";

			break;

		case "appform.php":

			$bc_pos = "Partnership apply";

			break;

		case "signup_newsletters.php":

			$bc_pos = "E-mail Signup";

			break;

		case "feedback.php":

			$bc_pos = "Feedback";

			break;

		case "links.php":

			$bc_pos = "Links";

			break;

		case "getpwd.php":

			$bc_pos = "Get Password";

			break;

		case "resetpwd.php":

			$bc_pos = "Reset Password";

			break;

		case "legal.php":

			$bc_pos = "Legal";

			break;

		case "login.php":

			$bc_pos = "Login";

			break;

	}

?>



<div class="breadcrumb">

	<span>Location:</span>

	<a href="index.php">Inicio</a>

	<span>&gt;</span>

	<span><?php echo $bc_pos ?></span>

</div>

