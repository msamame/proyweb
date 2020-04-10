<?php
	$nav_filename = strtolower(basename($_SERVER["PHP_SELF"]));
	// profiles
	$nav_model = "v_profiles";
	$nav_cond = "`language_id` = " . $langId . " AND `released` = 1";
	$nav_m = new Model($nav_model);

	try {
		$nav_profiles = $nav_m->get_paged_rows(1, 100, $nav_cond, "`order`, `release_date` DESC, `id` DESC");
	} catch (Exception $e) {
		Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
		exit();
	}

	// partners
	$nav_model = "v_partners";
	$nav_cond = "`language_id` = " . $langId . " AND `released` = 1";
	$nav_m = new Model($nav_model);
	try {
		$nav_partners = $nav_m->get_paged_rows(1, 100, $nav_cond, "`order`, `release_date` DESC, `id` DESC");
	} catch (Exception $e) {
		Js::alert("File:" . $e->getFile() . '\nLine:' . $e->getLine() . '\n' . $e->getMessage(), true);
		exit();
	}
?>




<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" /><table width="995" border="0" align="center" bgcolor="#003399">
  <tr>
    <td><ul id="MenuBar1" class="MenuBarHorizontal">
      
      <li class="MenuBarHorizontal_inicio"><span class="MenuBarHorizontal_inicio"><span class="MenuBarHorizontal_inicio"><a href="index.php" class=" MenuBarHorizontal_inicio" >Inicio </a></span></span></li>
      
      <li><a class="MenuBarItemSubmenu" href="#">Nernet</a>


<?php
	if (is_array($nav_profiles) && count($nav_profiles) > 0) {
?>
			<ul>
<?php
		foreach ($nav_profiles as $nav_profile) {
?>
				<li><a href="profile.php?id=<?php echo $nav_profile["id"] ?>"><?php echo $nav_profile["name"] ?></a></li>
<?php
		}
?>
	      </ul>
<?php
	}
?>


      </li>
      
      
      <li class="MenuBarItemIE"><a class="MenuBarItemSubmenu" href="#">Productos</a>
        <ul>
          <li><a href="automatismos.php">Automatismos</a></li>
          <li><a href="control_accesos.php">Control de Accesos</a></li>
          <li><a href="puertas_industriales.php">Puertas Industriales</a></li>
          <li><a href="puertas_automaticas.php">Puertas automaticas</a></li>
          <li><a href="gigants_doors.php">Puertas Gigantes</a></li>          
         </ul>
      </li>


      <li class="MenuBarItemIE"><a class="MenuBarItemSubmenu" href="#">Soporte</a>
        <ul>
          <li><a href="#">Automatismos</a></li>
          <li><a href="#">Puertas</a></li>
          <li><a href="#">Control de Accesos</a></li>
         </ul>
      </li>

      
   
      <li><a class="MenuBarItemSubmenu" href="#">Noticias y Eventos</a>
        <ul>
          <li><a href="#">Noticias y Eventos</a></li>
          <li><a href="#">Marketing y Actividades</a></li>
         </ul>
      </li>
   
      <li><a href="profile.php?id=3">Contacto</a></li>
    </ul></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
