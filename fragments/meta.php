<?php

	$k = "";

	$d = "";

	$filename = strtolower(basename($_SERVER["PHP_SELF"]));

	

	switch ($filename) {

		case "sitemap.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 15");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "search.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 14");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "reg_user.php":

		case "reg_distributor.php":

		case "reg_developer.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 13");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "network.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 12");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "login.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 11");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "links.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 10");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "getpwd.php":

		case "resetpwd.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 9");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "appform.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 7");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "index.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 1");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "products.php":

			$model = "v_product";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId, "`id` DESC");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "product.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_products";

			$cond = "`language_id` = " . $langId . " AND `id` = " . $id . " AND `released` = 1";

			$m = new Model($model);

			try {

				$record = $m->readEx($cond);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}



			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "cases.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 2");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "case.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_cases";

			$cond = "`language_id` = " . $langId . " AND `id` = " . $id . " AND `released` = 1";

			$m = new Model($model);

			try {

				$record = $m->readEx($cond);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}



			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "dev.php":

			$model = "v_dev";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId, "`id` DESC");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "applications.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 3");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "application.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_apps";

			$m = new Model($model);

			try {

				$record = $m->readEx("`id` = " . $id);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "downloads.php":

		case "download.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 4");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "faq.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 5");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "news.php":

			$model = "v_metas";

		

			$m = new Model($model);

			try {

				$record = $m->readEx("`language_id` = " . $langId . " AND `page_id` = 6");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["keywords"];

				$webTitle = $record["title"];

				$d = $record["desc"];

			}

			break;

		case "news_detail.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_news";

			$m = new Model($model);

			try {

				$record = $m->readEx("`id` = " . $id);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "partner.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_partners";

			$m = new Model($model);

			try {

				$record = $m->readEx("`id` = " . $id);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "profile.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_profiles";

			$m = new Model($model);

			try {

				$record = $m->readEx("`id` = " . $id);

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

		case "p_new.php":

			

			$id = 0;

			if (Common::pe("id")) $id = $_GET["id"];

			

			$model = "v_p_new";

			$m = new Model($model);

			try {

				$record = $m->readEx("");

			} catch (Exception $e) {

				Js::alert($e->getMessage(), true);

				exit();

			}

			

			if ($record != null) {

				$k = $record["meta_k"];

				$webTitle = $d = $record["meta_d"];

			}

			break;

	}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $webTitle ?></title>

<meta http-equiv="X-UA-Compatible" content="IE=7" />

<meta name="keywords" content="<?php echo $k ?>" />

<meta name="description" content="<?php echo $d ?>" />

<link rel="stylesheet" href="css/style.css" type="text/css" />

<script type="text/javascript" src="js/jquery/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="js/droppy/jquery.droppy.js"></script>



