<?php
	$subnav_filename = strtolower(basename($_SERVER["PHP_SELF"]));
	switch ($subnav_filename) {

		case "index.php":
			break;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "automatismos.php":
		case "automatismos_product.php":
		case "automatismos_detail.php":
		case "puertas_industriales.php":
		case "puertas_industriales_product.php":
		case "puertas_industriales_detail.php":		
		case "puertas_automaticas.php":
		case "puertas_automaticas_product.php":				
		case "puertas_automaticas_detail.php":
		case "control_accesos.php":		
		case "control_accesos_product.php":	
		case "control_accesos_detail.php":
    	case "gigants_doors.php":
		case "product.php":
		case "profile.php":	
		case "send_coment.php":			
		case "information_product.php":
		case "send_information_product.php":		
		case "products.php":
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
//			$subnav_model = "v_p_new";
			$subnav_model = "v_news";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_new = $subnav_m->readEx("");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
			

?>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:89px;
	height:20px;
	z-index:1;
	left: 217px;
	top: 3047px;
	border-color: #FFFFFF;
}
-->
</style>


<div class="h1 product1">
 
	<h1 class="current"><a href="products.php">Productos</a></h1>
    <?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
	?>
	<ul>

<?php foreach ($subnav_records as $rec) { ?>
        <li><a href="<?php echo $rec["name"] ?>"><?php echo $rec["content"] ; ?></a></li>
<?php } ?>
        

	</ul>
<?php
			}
			
?>
	<h1><a href="cases.php">Experiencias</a></h1>
    <?php
			if (is_array($subnav_new)) {
			}
?>
    <?php require_once('libs/menu_vertical.php');?>
    <?php require_once('libs/logos_proveedores.php');?>
</div>
<?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "automatismos.php":
		case "automatismos_product.php":
		case "automatismos_detail.php":
		case "puertas_industriales.php":
		case "puertas_industriales_product.php":
		case "puertas_industriales_detail.php":		
		case "puertas_automaticas.php":
		case "puertas_automaticas_product.php":				
		case "puertas_automaticas_detail.php":
		case "control_accesos.php":		
		case "control_accesos_product.php":	
		case "control_accesos_detail.php":
    	case "gigants_doors.php":		
		case "product.php":
		case "information_product.php":	
		case "send_information_product.php":				
		case "products.php":
		case "send_coment.php":					
		case "profile.php":				
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
//			$subnav_model = "v_p_new";
			$subnav_model = "v_news";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_new = $subnav_m->readEx("");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
?>

<div class="h1 product1">
	<h1><a href="products.php">Productos</a></h1>
    <?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
?>
	<ul>
<?php
				foreach ($subnav_records as $rec) {
?>
		<li><a href="<?php echo $rec["name"] ?>">
        <?php   echo $rec["content"]  ?>
		</a></li>
<?php
				}
?>
	</ul>
<?php
			}
?>

	<h1 class="current"><a href="cases.php">Experiencias</a></h1>
    <?php
			if (is_array($subnav_new)) {
			}
?>
    <?php require_once('libs/menu_vertical.php');?>
    <?php require_once('libs/logos_proveedores.php');?>
	
</div>
<?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "automatismos.php":
		case "automatismos_product.php":
		case "automatismos_detail.php":
		case "puertas_industriales.php":
		case "puertas_industriales_product.php":
		case "puertas_industriales_detail.php":		
		case "puertas_automaticas.php":
		case "puertas_automaticas_product.php":				
		case "puertas_automaticas_detail.php":
    	case "gigants_doors.php":		
		case "control_accesos.php":		
		case "control_accesos_product.php":	
		case "control_accesos_detail.php":
		case "send_coment.php":					
		case "profile.php":				
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
//			$subnav_model = "v_p_new"; msam
			$subnav_model = "v_news";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_new = $subnav_m->readEx("");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
?>

<div class="h1 product1">
	<h1><a href="#">Productos</a><a href="products.php"></a></h1>
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
?>
	<ul>
<?php
				foreach ($subnav_records as $rec) {
?>
		<li><a href="<?php echo $rec["name"] ?>">
        <?php   echo $rec["content"]  ?>
		</a></li>
<?php
				}
?>
  </ul>
<?php
			}
?>
	<h1><a href="cases.php">Experiencias</a></h1>
    <?php
			if (is_array($subnav_new)) {
			}
?>
     <?php require_once('libs/menu_vertical.php');?>
     <?php require_once('libs/logos_proveedores.php');?>
</div>
<p>
  <?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		case "automatismos.php":
		case "automatismos_product.php":
		case "automatismos_detail.php":
		case "puertas_industriales.php":
		case "puertas_industriales_product.php":
		case "puertas_industriales_detail.php":		
		case "puertas_automaticas.php":
		case "puertas_automaticas_product.php":				
		case "puertas_automaticas_detail.php":
		case "control_accesos.php":		
		case "control_accesos_product.php":	
		case "control_accesos_detail.php":	
    	case "gigants_doors.php":		
		case "dev.php":
		case "send_coment.php":					
		case "profile.php":				
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
</p>
<div class="h1 product1">
  <h1 class="current"><a href="products.php">Productos</a></h1>
    <?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
	?>
	<ul>

<?php foreach ($subnav_records as $rec) { ?>
        <li><a href="<?php echo $rec["name"] ?>">  
        <?php   echo $rec["content"] ; ?>
		</a></li>
<?php } ?>
        

	</ul>
<?php
			}
			
?>
	<h1><a href="cases.php">Experiencia </a></h1>
    <?php
			if (is_array($subnav_new)) {
			}
?>
    <?php require_once('libs/menu_vertical.php');?>
    <?php require_once('libs/logos_proveedores.php');?>
</div>
<?php
			break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		case "automatismos.php":
		case "automatismos_product.php":
		case "automatismos_detail.php":
		case "puertas_industriales.php":
		case "puertas_industriales_product.php":
		case "puertas_industriales_detail.php":		
		case "puertas_automaticas.php":
		case "puertas_automaticas_product.php":				
		case "puertas_automaticas_detail.php":
		case "control_accesos.php":		
		case "control_accesos_product.php":	
		case "control_accesos_detail.php":	
    	case "gigants_doors.php":		
		case "product.php":
		case "information_product.php":		
		case "send_information_product.php":				
		case "products.php":
		case "send_coment.php":					
		case "profile.php":				
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
//			$subnav_model = "v_p_new";
			$subnav_model = "v_news";
			$subnav_cond = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_new = $subnav_m->readEx("");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
?>




<div class="h1">
<h1 <?php echo $subnav_filename == "dev.php" ? 'class="current"' : '' ?>><a href="dev.php">Desarrollo de GstarCAD </a></h1>
	<h1 <?php echo $subnav_filename == "applications.php" || $subnav_filename == "application.php" ? 'class="current"' : '' ?>><a href="applications.php">Productos para GstarCAD</a></h1>
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
	<div class="support"> <img src="img/logo_aprimatic.png" alt="" /></div>
</div>

<?php

		case "downloads.php":
			$cid = 3;
			break;


		case "news.php":
		case "news_detail.php":
			$subnav_newsTypeId = 1;
			if (Common::pe("type")) $subnav_newsTypeId = $_GET["type"];
			
?>

<div class="h1">
	<h1 <?php echo $subnav_newsTypeId == 1 ? 'class="current"' : '' ?>><a href="news.php?type=1">Noticias y Eventos </a></h1>
	<h1 <?php echo $subnav_newsTypeId == 2 ? 'class="current"' : '' ?>><a href="news.php?type=2">Marketing y Actividades </a></h1>

	<div class="support">
    <a href="download.php?for=1"><img src="img/logo_aprimatic.png" alt="" border="0" /></a>	</div>
	<div class="outLinks"><a href="http://www.facebook.com/media/set/?set=a.112229082256346.25616.100004077650952&amp;type=3#!/gstarcadperu2012" target="_blank"><a href="http://www.facebook.com/Nersoft" target="_blank"><img src="img/logo_facebook.jpg" alt="facebook" border="0" /></a>
	  <!--a href="" target="_blank"><img src="img/logo_twitter.jpg" alt="twitter" /></a-->
		<a href="http://www.linkedin.com/groups/GstarCAD-2773628?mostPopular=&gid=2773628" target="_blank"><img src="img/logo_linkin.jpg" alt="linkedin" border="0" /></a>
		<a href="http://www.youtube.com/watch?v=qi1i0lRDaog" target="_blank"><img src="img/logo_youtube.jpg" alt="youtube" border="0" /></a>	</div>
        
</div>


<?php
			break;
		case "contactos.php":
			$subnav_model = "v_contacto";
			$subnav_contac = "`language_id` = " . $langId . " AND `released` = 1";
			$subnav_contactoId = 0;
			if (Common::pe("id")) $subnav_contactoId = $_GET["id"];
			$subnav_m = new Model($subnav_model);
			try {
				$subnav_records = $subnav_m->get_paged_rows(1, 100, $subnav_contac, "`order`, `release_date` DESC, `id` DESC");
			} catch (Exception $e) {
				Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
				exit();
			}
?>

<div class="h1">
<?php
			if (is_array($subnav_records) && count($subnav_records) > 0) {
				if ($subnav_contactoId == 0) $subnav_contactoId = $subnav_records[0]["id"];
				foreach ($subnav_records as $rec) {
?>

<h1 <?php echo $subnav_contactoId == $rec["id"] ? 'class="current"' : '' ?>><a href="contactos.php?id=<?php echo $rec["id"] ?>"><?php echo $rec["name"] ?></a></h1>
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
<?php require_once('libs/menu_vertical.php');?>
<?php require_once('libs/logos_proveedores.php');?>

</div>

<?php
			break;
		case "download.php":
		case "reg_user.php":
		case "send_coment.php":					
		case "profile.php":				
//		case "reg_distributor.php":
		case "reg_developer.php":
		case "ver.php":
		case "faq.php":  //msam verificar para el caso faq esta opcion se desactivo
			$for = 1;
			if (Common::pe("for")) $for = $_GET["for"];
?>

<script type="text/javascript">
$(function() {
	$("#login").submit(function() {
		//return post_log();
	});
});
</script>

<div class="h1">
	<h1 <?php echo $for == 1 || $subnav_filename == "reg_user.php" ? 'class="current"' : '' ?>><a href="download.php?for=1">Usuarios</a></h1>
    <?php
	if ($for == 1) {
?>
	<ul>
		<li><a href="#" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=1" <?php echo $subnav_filename == "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>
	<h1 <?php echo $for == 2 || $subnav_filename == "reg_developer.php" ? 'class="current"' : '' ?>><a href="download.php?for=2">Desarrolladores</a></h1>
    <?php
	if ($for == 2) {
?>
	<ul>
		<li><a href="#" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=2" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>
	<h1 <?php echo $for == 3 || $subnav_filename == "reg_faq.php" ? 'class="current"' : '' ?>><a href="faq.php?for=1">FAQ</a></h1>
    <?php
	if ($for == 3) {
?>
	<ul>
		<li><a href="download.php?for=1" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>Download</a></li>
		<li><a href="faq.php?for=3" <?php echo $subnav_filename != "faq.php" ? 'class="current"' : "" ?>>FAQ</a></li>
	</ul>
<?php
	}
?>



<?php
	if ($subnav_filename != "reg_user.php" && 
		$subnav_filename != "reg_developer.php" && 
		$subnav_filename != "reg_faq.php") {

?>
<!--?php require_once('libs/logos_proveedores.php');?-->

	<div class="login">
		<h2>Login</h2>
<?php
		/**************************************************
			sync login to phpBB
		**************************************************/
error_reporting(0);

		if (!defined('IN_PHPBB')) {
			define('IN_PHPBB', true);
			$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'forum/';
			$phpEx = substr(strrchr(__FILE__, '.'), 1);
			include($phpbb_root_path . 'common.' . $phpEx);
			include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
			$user->session_begin();
		}

echo "<!--";
var_dump($user->data);
echo "-->";
error_reporting(E_ALL);

		if (isset($_SESSION[APP_ID]['AdminLoggedIn']) && 
			$_SESSION[APP_ID]['AdminLoggedIn'] == true && 
			$user->data["user_id"] != 1 && $user->data["group_id"] != 1) {
			if ($_SESSION[APP_ID]['LevelId'] == 1) $name = $_SESSION[APP_ID]['AdminUsername'];
			else $name = $_SESSION[APP_ID]['Name'];
?>
		<div class="input" style="padding:10px;">
			Hi, <?php echo $name ?>, welcome back.<br /><br />
			<a href="logout.php?returnUrl=<?php echo $_SERVER['PHP_SELF'] ?>" style="color:#658CB7;">Salir</a>
		</div>
        <?php
		} else {
?>
		<div class="input_box">
			<form method="post" id="login" action="login.php?returnUrl=<?php echo $_SERVER['PHP_SELF'] ?>">
				<input type="hidden" name="sid" id="sid" />
				<div class="title"><label>E-mail:</label></div>
				<div class="input">
				  <input type="text" class="text" name="username" id="username1" />
				</div>
				<div class="title"><label>Password:</label></div>
				<div class="input"><input type="password" class="text" name="password" id="password1" /></div>
				<div class="title">
				  <label>Verificar codigo:</label>
				</div>
				<div class="input">
					<input type="text" name="code" class="text" style="float:left; width:40px;" />
					<img class="captcha" src="captcha.php?temp=<?php echo time() ?>" alt="captcha" style="float:left; margin-left:5px;" />
				</div>
				<div class="title"></div>
				<div class="input">
					<input type="image" src="img/p35.jpg" class="img" />
					<a href="reg_user.php" class="link1">Registrarse</a>
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
	  <p><img src="img/nice_logo.png" alt="" border="0" align="left" /><img src="img/p54.jpg" alt="" border="0" /><a href="profile.php?id=4" class="feedback"><img src="img/p55.jpg" alt="feedback" border="0" /></a></p>
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
	<h1 <?php echo $for == 1 ? 'class="current"' : '' ?>><a href="download.php?for=1">Usuarios</a></h1>
	<h1 <?php echo $for == 2 ? 'class="current"' : '' ?>><a href="download.php?for=2">Desarrolladores</a></h1>
	<h1 <?php echo $for == 3 ? 'class="current"' : '' ?>><a href="faq.php?for=1">FAQ</a></h1>
	<div class="support"><img src="img/nice_logo.png" alt="" border="0" /><img src="img/p54.jpg" alt="" />
		<a href="profile.php?id=3" class="feedback"><img src="img/p55.jpg" alt="feedback" /></a>
	</div>
</div>

<?php
			break;
		case "network.php":
?>

<div class="h1">
	<h1 class="current"><a href="network.php">Marketing</a></h1>
</div>

<?php
			break;
		case "sitemap.php":
?>
<div class="h1">
	<h1 class="current"><a href="sitemap.php">Mapa Web</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
		break;
		case "signup_newsletters.php":
?>

<div class="h1">
	<h1 class="current"><a>Boletin</a></h1>
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
	<h1 class="current"><a>Enlaces</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
		break;
		case "search.php":
?>

<div class="h1">
	<h1 class="current"><a>Result</a>ado de la B&uacute;squeda </h1>
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
	<h1 class="current"><a>Cambiar Password</a></h1>
	<div class="network"><a href="network.php"></a></div>
</div>

<?php
		break;
	}
?>