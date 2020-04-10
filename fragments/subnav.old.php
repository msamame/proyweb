<?php
	$subnav_filename = strtolower(basename($_SERVER["PHP_SELF"]));
	switch ($subnav_filename) {
		case "index.php":
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "products.php":
		case "product.php":

			$subnav_model = "v_products";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_cond, "`order`, `release_date` DESC, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
			
			$subnav_productId = 0;
			if ($subnav_filename == "product.php") $subnav_productId = $_GET["id"];
?>
<div class="h1 product1">
	<h1 class="current"><a href="products.php">GstarCAD Products</a></h1>
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
?>
	<ul>
<?php
				foreach ($subnav_records as $rec) {
?>
		<li><a href="product.php?id=<?php echo $rec["id"] ?>" <?php echo $subnav_productId == $rec["id"] ? 'class="current"' : "" ?>><?php echo $rec["name"] ?></a></li>
<?php
				}
?>
	</ul>
<?php
			}
?>
	<h1><a href="cases.php">Case Studies</a></h1>
	
	
	<div class="support">
		<a href="download.php?for=1"><img src="img/p58.jpg" alt="" /></a>
	</div>
</div>
<?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "cases.php":
		case "case.php":

			$subnav_model = "v_products";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_cond, "`order`, `release_date` DESC, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
			
			$subnav_productId = 0;
			if ($subnav_filename == "product.php") $subnav_productId = $_GET["id"];
?>
<div class="h1 product1">
	<h1><a href="products.php">GstarCAD</a></h1>
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
?>
	<ul>
<?php
				foreach ($subnav_records as $rec) {
?>
		<li><a href="product.php?id=<?php echo $rec["id"] ?>"><?php echo $rec["name"] ?></a></li>
<?php
				}
?>
	</ul>
<?php
			}
?>
	<h1 class="current"><a href="cases.php">Case Studies</a></h1>
	
	<div class="support">
		<a href="download.php?for=1"><img src="img/p58.jpg" alt="" /></a>
	</div>
</div>
<?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "dev.php":
		case "applications.php":
		case "application.php":
			
			$subnav_app_type = 0;
			if (Common::pe("type")) $subnav_app_type = $_GET["type"];
			
			$subnav_model = "v_application_types";
			$subnav_cond = "`language_id` = " . $langId;
			
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_cond, "`order`, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
?>
<div class="h1">
	<h1 <?php echo $subnav_filename == "dev.php" ? 'class="current"' : '' ?>><a href="dev.php">Application Development</a></h1>
	<h1 <?php echo $subnav_filename == "applications.php" || $subnav_filename == "application.php" ? 'class="current"' : '' ?>><a href="applications.php">Application Products</a></h1>
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
?>
	<ul>
<?php
				foreach ($subnav_records as $rec) {
?>
		<li><a href="applications.php?type=<?php echo $rec["id"] ?>" <?php echo $subnav_app_type == $rec["id"] ? 'class="current"' : "" ?>><?php echo $rec["name"] ?></a></li>
<?php
				}
?>
	</ul>
<?php
			}
?>

	<div class="support">
		<a href="partners.php"><img src="img/p57.jpg" alt="" /></a>
	</div>
</div>

<?php
			break;
		case "downloads.php":
			$cid = 3;
			break;
		case "news.php":
		case "news_detail.php":

			$subnav_newsTypeId = 1;
			if (Common::pe("type")) $subnav_newsTypeId = $_GET["type"];
?>
<div class="h1">
	<h1 <?php echo $subnav_newsTypeId == 1 ? 'class="current"' : '' ?>><a href="news.php?type=1">News Release</a></h1>
	<h1 <?php echo $subnav_newsTypeId == 2 ? 'class="current"' : '' ?>><a href="news.php?type=2">Marketing Activities</a></h1>

	<div class="support">
		<a href="products.php"><img src="img/p56.jpg" alt="" /></a>
	</div>
</div>

<?php
			break;
		case "partner.php":
			$subnav_model = "v_partners";
			
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			
			$subnav_partnerId = 0;
			if (Common::pe("id")) $subnav_partnerId = $_GET["id"];
			
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_cond, "`order`, `release_date` DESC, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
			
			
?>
<div class="h1">
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
				if ($subnav_partnerId == 0) $subnav_partnerId = $subnav_records[0]["id"];
				
				foreach ($subnav_records as $rec) {
?>
<h1 <?php echo $subnav_partnerId == $rec["id"] ? 'class="current"' : '' ?>><a href="partner.php?id=<?php echo $rec["id"] ?>"><?php echo $rec["name"] ?></a></h1>
<?php
				}
			}
?>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "profile.php":
			$subnav_model = "v_profiles";
			
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			
			$subnav_profileId = 0;
			if (Common::pe("id")) $subnav_profileId = $_GET["id"];
			
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_cond, "`order`, `release_date` DESC, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
			
			
?>
<div class="h1">
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
				if ($subnav_filename != "network.php" && $subnav_filename != "sitemap.php" && $subnav_profileId == 0) $subnav_profileId = $subnav_records[0]["id"];
				
				foreach ($subnav_records as $subnav_rec) {
?>
	<h1 <?php echo $subnav_profileId == $subnav_rec["id"] ? 'class="current"' : '' ?>><a href="profile.php?id=<?php echo $subnav_rec["id"] ?>"><?php echo $subnav_rec["name"] ?></a></h1>

<?php
				}
			}
?>

	<div class="support">
		<a href="download.php?for=1"><img src="img/p58.jpg" alt="" /></a>
		<a href="partners.php"><img src="img/p57.jpg" alt="" /></a>
	</div>
</div>

<?php
			break;
		case "download.php":
		case "reg_user.php":
		case "reg_distributor.php":
		case "reg_developer.php":
		case "ver.php":
		case "faq.php":

			$for = 0;
			if (Common::pe("for")) $for = $_GET["for"];

?>
<script type="text/javascript">
$(function() {
	$("#login").submit(function() {
	});
});
</script>

<div class="h1">
	<h1 <?php echo $for == 1 || $subnav_filename == "reg_user.php" ? 'class="current"' : '' ?>><a href="download.php?for=1">For Users</a></h1>
<?php
	if ($for == 1) {
?>
	<ul>
		<li><a href="download.php?for=1" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=1" <?php echo $subnav_filename == "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>
	<h1 <?php echo $for == 2 || $subnav_filename == "reg_distributor.php" ? 'class="current"' : '' ?>><a href="download.php?for=2">For Distributors</a></h1>
<?php
	if ($for == 2) {
?>
	<ul>
		<li><a href="download.php?for=2" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=2" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>
	<h1 <?php echo $for == 3 || $subnav_filename == "reg_developer.php" ? 'class="current"' : '' ?>><a href="download.php?for=3">For Developers</a></h1>
<?php
	if ($for == 3) {
?>
	<ul>
		<li><a href="download.php?for=3" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=3" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>
	
	

<?php
	if ($subnav_filename != "reg_user.php" && 
		$subnav_filename != "reg_distributor.php" && 
		$subnav_filename != "reg_developer.php") {
?>
	<div class="login">
		<h2>Login</h2>
<?php
		if (isset($_SESSION[APP_ID]['AdminLoggedIn']) && $_SESSION[APP_ID]['AdminLoggedIn'] == true) {

		if ($_SESSION[APP_ID]['LevelId'] == 1) $name = $_SESSION[APP_ID]['AdminUsername'];
		else $name = $_SESSION[APP_ID]['Name'];
?>
		<div class="input" style="padding:10px;">
			Hi, <?php echo $name ?>, welcome back.<br /><br />
			<a href="logout.php?returnUrl=<?php echo $_SERVER['PHP_SELF'] ?>" style="color:#658CB7;" onclick="javascript:post_logout()">Logout</a>
		</div>
<?php
		} else {
?>
		<div class="input_box">
			<form method="post" id="login" action="login.php?returnUrl=<?php echo $_SERVER['PHP_SELF'] ?>">
				<input type="hidden" name="sid" id="sid" />
				<div class="title"><label>E-mail:</label></div>
				<div class="input"><input type="text" class="text" name="username" id="username1" /></div>
				<div class="title"><label>Password:</label></div>
				<div class="input"><input type="password" class="text" name="password" id="password1" /></div>
				<div class="title"><label>Verify code:</label></div>


				<div class="input">
					<input type="text" name="code" class="text" style="float:left; width:40px;" />
					<img class="captcha" src="../captcha.php?temp=<?php echo time() ?>" alt="captcha" style="float:left; margin-left:5px;" />
				</div>
				<div class="title"></div>
				<div class="input">
					<input type="image" src="img/p35.jpg" class="img" />
					<a href="reg_user.php" class="link1">Register</a>
				</div>
			</form>
		</div>
<?php
		}
?>
	</div>
<?php
	}
?>

	<div class="support">
		<img src="img/p53.jpg" alt="" />
		<img src="img/p54.jpg" alt="" />

		<a href="profile.php?id=3" class="feedback"><img src="img/p55.jpg" alt="feedback" /></a>
	</div>

</div>
<?php
			break;
///////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "login.php":
		case "appform.php":
			$for = 1;
			if (Common::pe("for")) $for = $_GET["for"];

?>
<div class="h1">
	<h1 <?php echo $for == 1 ? 'class="current"' : '' ?>><a href="download.php?for=1">For Users</a></h1>
	<h1 <?php echo $for == 2 ? 'class="current"' : '' ?>><a href="download.php?for=2">For Distributors</a></h1>
	<h1 <?php echo $for == 3 ? 'class="current"' : '' ?>><a href="download.php?for=3">For Developers</a></h1>

	
	<div class="support">
		<img src="img/p53.jpg" alt="" />
		<img src="img/p54.jpg" alt="" />

		<a href="profile.php?id=4" class="feedback"><img src="img/p55.jpg" alt="feedback" /></a>
	</div>

</div>
<?php
			break;
		case "network.php":
?>
<div class="h1">
	<h1 class="current"><a href="network.php">Marketing Network</a></h1>
</div>

<?php
			break;
		case "sitemap.php":
?>
<div class="h1">
	<h1 class="current"><a href="sitemap.php">Sitemap</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "signup_newsletters.php":
?>
<div class="h1">
	<h1 class="current"><a>E-mail Signup</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "feedback.php":
?>
<div class="h1">
	<h1 class="current"><a>Feedback</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "links.php":
?>
<div class="h1">
	<h1 class="current"><a>Links</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "search.php":
?>
<div class="h1">
	<h1 class="current"><a>Search Result</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "getpwd.php":
?>
<div class="h1">
	<h1 class="current"><a>Get Password</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
		case "resetpwd.php":
?>
<div class="h1">
	<h1 class="current"><a>Reset Password</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
			break;
			
	}
?>

